<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class LandingPagesController extends Controller
{
    public function index ()
    {
        $product = Product::all();
        return view(
            'pages.Home',      
            get_defined_vars()
        );
    }

    public function product_detail($id)
    {
        // Cari pesan berdasarkan ID
        $product = Product::find($id);

        // Jika pesan tidak ditemukan, kembalikan response 404
        if (!$product) {
            abort(404, 'Products not found!');
        }
        return view(
            'pages.Product.detail',
            get_defined_vars()
            );
    }

    public function payment(Request $request)
    {
        // dd($request->all());

        $serverKey = config('midtrans.server_key');
        $url = config('midtrans.url');

        $validated = $request->validate([
            'product_id' => 'required|string|max:255',
            'name' => 'required|string|max:255',
            'phone_number' => 'required|string|max:255',
            'qty' => 'required|numeric',
            'amount' => 'required|numeric|min:1',
            'payment_method' => 'required|string',
        ]);

        // ID Order yang Unik
        $tanggal = now()->format('d-m-Y');
        $randomString = strtoupper(str_shuffle(
            substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 4) .
            substr(str_shuffle('0123456789'), 0, 4)
        ));
        $orderId = sprintf('TRX-ON-%s-%s', $tanggal, $randomString);

        $productId = $request->input('product_id');
        $paymentType = $request->input('payment_method');
        $grossAmount = $request->input('amount');

        // API params seperti sebelumnya
        $params = [
            'transaction_details' => [
                'order_id' => $orderId,
                'gross_amount' => $grossAmount,
            ],
        ];

        switch ($paymentType) {
            case 'bca':
            case 'bri':
            case 'bni':
            case 'permata':
                $params['payment_type'] = 'bank_transfer';
                $params['bank_transfer'] = [
                    'bank' => $paymentType,
                ];
                break;
        
            case 'gopay':
                $params['payment_type'] = 'gopay';
                break;
        
            case 'qris':
                $params['payment_type'] = 'qris';
                break;
        
            case 'echannel':
                $params['payment_type'] = 'echannel';
                $params['echannel'] = [
                    'bill_info1' => 'Payment For:',
                    'bill_info2' => 'Online Transaction',
                ];
                break;
        
            case 'shopeepay':
                $params['payment_type'] = 'shopeepay';
                break;
        
            case 'cstore':
                $params['payment_type'] = 'cstore';
                $params['cstore'] = [
                    'store' => 'indomaret',
                    'message' => 'Payment at Indomaret/Alfamart',
                ];
                break;
        
            default:
                return response()->json(['error' => 'Invalid payment type'], 400);
        }

        // Kirim request ke Midtrans API
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Authorization: ' . $serverKey,
        ]);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));

        $response = curl_exec($ch);
        curl_close($ch);

        $decodedResponse = json_decode($response, true);

        if (isset($decodedResponse['transaction_status'])) {
            // Simpan data transaksi ke database
            $transaction = Transaction::create([
                'order_id' => $orderId,
                'product_id' => $productId,
                'name' => $request->input('name'),
                'amount' => $grossAmount,
                'status' => $decodedResponse['transaction_status'],
                'payment_status' => $decodedResponse['transaction_status'],
                'payment_method' => $decodedResponse['va_numbers'][0]['bank'] ?? null,
                'va_number' => $decodedResponse['va_numbers'][0]['va_number'] ?? null,
                'transaction_time' => $decodedResponse['transaction_time'] ?? null,
                'expire_time' => $decodedResponse['expiry_time'] ?? null,
            ]);
            
            // Redirect ke halaman pembayaran dengan ID unik
            return redirect()->to('/produk/detail/payment?id=' . $orderId);
        }

        return response()->json(['error' => 'Failed to create transaction'], 500);
    }

    public function show_payment(Request $request)
    {
        // Ambil ID unik (order_id) dari query string
        $uniqueId = $request->query('id');
    
        // Ambil transaksi berdasarkan order_id yang sesuai
        $transaction = Transaction::where('order_id', $uniqueId)->first();
    
        // Pastikan transaksi ditemukan
        if (!$transaction) {
            // Jika transaksi tidak ditemukan, bisa return error atau redirect
            return redirect()->route('home')->with('error', 'Transaksi tidak ditemukan');
        }
    
        // Kirim data transaksi ke tampilan
        return view(
            'pages.Product.waiting', 
            get_defined_vars()
        );
    }

    public function check_payment(Request $request)
    {
        // dd($request->all());
        // Validasi input
        $validated = $request->validate([
            'order_id' => 'required|string',
        ]);

        $orderId = $validated['order_id'];

        // Ambil transaksi dari database
        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return redirect()->back()->with('error', 'Transaksi tidak ditemukan.');
        }

        // Lakukan pengecekan status pembayaran ke Midtrans API
        $serverKey = config('midtrans.server_key');
        $url = "https://api.sandbox.midtrans.com/v2/$orderId/status";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Authorization: Basic ' . $serverKey,
        ]);

        $response = curl_exec($ch);
        curl_close($ch);

        $decodedResponse = json_decode($response, true);

        if (isset($decodedResponse['transaction_status'])) {
            $status = $decodedResponse['transaction_status'];
            $settlement_time = $decodedResponse['settlement_time'];


            // Update status transaksi di database
            $transaction->status = $status;
            $transaction->payment_status = $status;

            if ($status === 'settlement' || $status === 'capture') {
                $transaction->status = 'completed';
                $transaction->payment_status = 'paid';
                $transaction->settlement_time = $settlement_time;
            }

            $transaction->save();

            return redirect()->back()->with('success', 'Status pembayaran berhasil diperbarui.');
        }

        return redirect()->back()->with('error', 'Gagal memeriksa status pembayaran.');
    }

    public function paid(Request $request)
    {
        dd($request->all());
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'amount' => 'required|numeric|min:1',
        ]);

        $programId = $request->query('id');
        $program = Transaction::find($programId);
    
        if (!$program) {
            return redirect('/')->with('error', 'Program tidak ditemukan!');
        }
    
        return view(
            'pages.tenant.program.donasi',
            get_defined_vars()
        );
    }

    public function success_payment()
    {
        return view(
            'pages.tenant.program.success_payment',
            get_defined_vars()
        );
    }

    private function updateTransactionStatus($orderId)
{
    $serverKey = config('midtrans.server_key');
    $auth = base64_encode($serverKey . ':');
    $url = "https://api.sandbox.midtrans.com/v2/$orderId/status";

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Basic ' . $auth,
        'Content-Type: application/json',
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    $decoded = json_decode($response, true);

    if (!isset($decoded['transaction_status'])) {
        return false;
    }

    $transaction = Transaction::where('order_id', $orderId)->first();

    if (!$transaction) {
        return false;
    }

    $status = $decoded['transaction_status'];
    $transaction->status = $status;
    $transaction->payment_status = $status;

    if (in_array($status, ['settlement', 'capture'])) {
        $transaction->status = 'completed';
        $transaction->payment_status = 'paid';
        $transaction->settlement_time = $decoded['settlement_time'] ?? now();
    }

    $transaction->save();

    return $transaction;
}


    // public function callback(Request $request)
    // {
    //     $serverKey = config('midtrans.server_key');
    //     $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

    //     if ($hashedKey !== $request->signature_key) {
    //         return response()->json(['message' => 'Invalid signature key'], 403);
    //     }

    //     $transactionStatus = $request->transaction_status;
    //     $orderId = $request->order_id;
    //     $order = Transaction::where('order_id', $orderId)->first();

    //     if (!$order) {
    //         return response()->json(['message' => 'Order not found'], 404);
    //     }

    //     switch ($transactionStatus) {
    //         case 'capture':
    //             if ($request->payment_type == 'credit_card') {
    //                 if ($request->fraud_status == 'challenge') {
    //                     $order->update(['status' => 'pending']);
    //                 } else {
    //                     $order->update(['status' => 'success']);
    //                 }
    //             }
    //             break;
    //         case 'settlement':
    //             $order->update(['status' => 'completed']);
    //             $order->update(['payment_status' => 'paid']);
    //             // $order->update(['status' => 'success']);
    //             break;
    //         case 'pending':
    //             $order->update(['status' => 'pending']);
    //             break;
    //         case 'deny':
    //             $order->update(['status' => 'failed']);
    //             break;
    //         case 'expire':
    //             $order->update(['status' => 'expired']);
    //             break;
    //         case 'cancel':
    //             $order->update(['status' => 'canceled']);
    //             break;
    //         default:
    //             $order->update(['status' => 'unknown']);
    //             break;
    //     }

    //     return response()->json(['message' => 'Callback received successfully']);
    // }





    public function callback(Request $request)
    {
        Log::info('Midtrans Callback Received', $request->all());
    
        $serverKey = config('midtrans.server_key');
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
    
        if ($hashedKey !== $request->signature_key) {
            Log::error('Invalid signature key', [
                'expected' => $hashedKey,
                'provided' => $request->signature_key,
            ]);
    
            return response()->json(['message' => 'Invalid signature key'], 403);
        }
    
        $updated = $this->updateTransactionStatus($request->order_id);
    
        if (!$updated) {
            Log::error('Order not found', [
                'order_id' => $request->order_id
            ]);
            return response()->json(['message' => 'Order not found'], 404);
        }
    
        Log::info('Transaction status updated', [
            'order_id' => $request->order_id,
            'status' => $updated->status,
            'payment_status' => $updated->payment_status
        ]);
    
        return response()->json(['message' => 'Callback processed successfully']);
    }
    

}
