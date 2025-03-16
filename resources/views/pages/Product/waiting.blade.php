@extends('layout.app')

@section('title', 'Produk')

@section('content')

<div class="max-w-6xl p-5 mx-auto sm:p-10 md:p-16">
    <div class="flex flex-col mb-10 overflow-hidden bg-white rounded shadow-lg lg:mx-56">
        <!-- Header Section -->
        <div class="flex flex-col justify-center p-5 text-left text-gray-800 rounded-t">
            @switch($transaction->payment_method)
                @case('bni')
                    <img src="/payment_method/bni.png" 
                        alt="Bank BNI" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">BNI Virtual Account</p>
                    @break
        
                @case('bca')
                    <img src="/payment_method/bca.png" 
                        alt="Bank BCA" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">BCA Virtual Account</p>
                    @break
        
                @case('bri')
                    <img src="/payment_method/bri.png" 
                        alt="Bank BRI" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">BRI Virtual Account</p>
                    @break
        
                @case('mandiri')
                    <img src="/payment_method/mandiri.png" 
                        alt="Bank Mandiri" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">Mandiri Virtual Account</p>
                    @break
        
                @case('permata')
                    <img src="/payment_method/permata-bank.png" 
                        alt="Bank Permata" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">Permata Virtual Account</p>
                    @break
        
                @case('bsi')
                    <img src="/payment_method/bsi.png" 
                        alt="Bank BSI" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">BSI Virtual Account</p>
                    @break
        
                @case('qris')
                    <img src="/payment_method/qris.png" 
                        alt="QRIS" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">QRIS Payment</p>
                    @break
        
                @case('seabank')
                    <img src="/payment_method/sea-bank.png" 
                        alt="SeaBank" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">SeaBank Payment</p>
                    @break
        
                @case('shopeepay')
                    <img src="/payment_method/shopeepay.png" 
                        alt="ShopeePay" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">ShopeePay Payment</p>
                    @break
        
                @case('gopay')
                    <img src="/payment_method/gopay.png" 
                        alt="Gopay" 
                        class="h-12 transition duration-300 ease-in-out cursor-pointer w-28"
                    >
                    <p class="mt-2 text-2xl text-gray-500">Gopay Payment</p>
                    @break
        
                @default
                    <p class="mt-2 text-xl text-gray-500">Metode pembayaran tidak dikenali.</p>
            @endswitch
        </div>        
        
        <hr>
        <div class="flex flex-col justify-center p-5 text-left text-gray-800 rounded-t">
            <h2 class="text-sm font-bold text-gray-500">Status</h2>
            <p class="mt-2 text-xl text-gray-500">
                @if ($transaction->status === 'pending')
                    Menunggu Pembayaran
                @elseif ($transaction->status === 'completed')
                    Pembayaran Selesai
                @else
                    Status Tidak Dikenali
                @endif
            </p>
            <p class="mt-2 text-xs text-gray-500">
                @if ($transaction->status === 'completed')
                    Pembayaran Telah Selesai Pada: {{ $transaction->settlement_time ?? 'Belum ada waktu settlement' }}
                @elseif ($transaction->status === 'pending')
                    Batas Waktu Pembayaran: {{ $transaction->expire_time ?? 'Tidak ada batas waktu' }}
                @else
                    Status Transaksi: {{ ucfirst($transaction->status) }}
                @endif
            </p>
        </div>
        <hr>
        <div class="flex flex-row justify-between p-5 text-left text-gray-800 rounded-t">
            <h2 class="text-xl font-bold text-gray-500">
                Nomor Virtual Account <br>  {{ $transaction->va_number ?? '' }}
            </h2>
            <p class="mt-2 text-sm text-gray-500">Salin</p>
        </div>
        <hr>
        <div class="flex flex-row justify-between p-5 text-left text-gray-800 rounded-t">
            <h2 class="text-xl font-bold text-gray-500">
                Atas Nama <br> {{ $transaction->name ?? '' }}
            </h2>
            <p class="mt-2 text-sm text-gray-500">Salin</p>
        </div>
        <hr>
        <div class="flex flex-col justify-center p-5 text-left text-gray-800 rounded-t">
            <h2 class="text-2xl font-bold text-gray-500">Ringkasan Pembayaran</h2>
            <div class="flex flex-row justify-between py-3">
                <p class="mt-2 text-sm text-gray-500">
                    Total Bayar <br> Automation Fee
                </p>
                <p class="mt-2 text-xs text-gray-500">
                    Rp. {{ $transaction->amount ?? '' }} <br> 0
                </p> 
            </div>
        </div>
        <hr>
        <div class="flex flex-row justify-between p-5 text-left text-gray-800 rounded-t">
            <h2 class="text-xl font-bold text-gray-500">
                Total Bayar
            </h2>
            <p class="mt-2 text-sm text-gray-500">Rp. {{ $transaction->amount ?? '' }}</p>
        </div>

        <!-- Donation Form -->
        <div class="p-5">
            <form action="{{ url('/produk/detail/payment') }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Ambil order_id dari variabel transaksi -->
                <input type="hidden" name="order_id" value="{{ $transaction->order_id }}">
        
                <button type="submit" 
                    class="inline-flex items-center justify-center w-full px-6 py-2 mt-6 font-bold text-white bg-green-500 rounded-full hover:bg-green-600">
                    Check Status Pembayaran
                </button>
                <button type="button" 
                    class="inline-flex items-center justify-center w-full px-6 py-2 mt-2 font-bold text-green-500 rounded-full hover:text-green-300">
                    Cara Pembayaran
                </button>
                <br>
            </form>
        </div>        


     
    </div>
</div>



@endsection