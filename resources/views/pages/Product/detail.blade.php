@extends('layout.app')

@section('title', 'Produk')

@section('content')

<div class="bg-white">
  <div class="pt-6">
    <nav aria-label="Breadcrumb">
      <ol role="list" class="flex items-center max-w-2xl px-4 mx-auto space-x-2 sm:px-6 lg:max-w-7xl lg:px-8">
        <li>
          <div class="flex items-center">
            <a href="#" class="mr-2 text-sm font-medium text-gray-900">Produk</a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="w-4 h-5 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>
        <li>
          <div class="flex items-center">
            <a href="#" class="mr-2 text-sm font-medium text-gray-900">Kategori Produk</a>
            <svg width="16" height="20" viewBox="0 0 16 20" fill="currentColor" aria-hidden="true" class="w-4 h-5 text-gray-300">
              <path d="M5.697 4.34L8.98 16.532h1.327L7.025 4.341H5.697z" />
            </svg>
          </div>
        </li>

        <li class="text-sm">
          <a href="#" aria-current="page" class="font-medium text-gray-500 hover:text-gray-600">{{ $product->sub_product ?? '' }}</a>
        </li>
      </ol>
    </nav>

    <!-- Image gallery -->
    <div class="max-w-6xl px-4 mx-auto mt-8">
        <div class="overflow-hidden rounded-lg h-[450px] bg-gray-100 flex items-center justify-center">
            <img 
            src="/images/{{ $product->image ?? '' }}" 
            alt="Featured Product"
            class="object-contain w-full h-full rounded-lg shadow-md"
            />
        </div>
    </div>
    

    <!-- Product info -->
    <div class="mx-auto max-w-2xl px-4 pt-10 pb-16 sm:px-6 lg:grid lg:max-w-7xl lg:grid-cols-3 lg:grid-rows-[auto_auto_1fr] lg:gap-x-8 lg:px-8 lg:pt-16 lg:pb-24">
      <div class="lg:col-span-2 lg:border-r lg:border-gray-200 lg:pr-8">
        <h1 class="text-2xl font-bold tracking-tight text-gray-900 sm:text-3xl">{{ $product->name ?? '-' }}</h1>
      </div>

      <!-- Options -->
      <div class="mt-4 lg:row-span-3 lg:mt-0">
        <h2 class="text-xl">Informasi Produk</h2>
        <p class="text-3xl tracking-tight text-gray-900">Rp. {{ $product->price ?? '' }}</p>

        <!-- Kategori -->
        <div class="mt-6">
          <h3 class="text-xl">Kategori Produk</h3>
          <div class="flex items-center">
            <div class="flex items-center">
              <p class="text-sm text-indigo-600">{{ $product->category_product->name ?? '-' }}</p>
            </div>
          </div>
        </div>
        
        <!-- Reviews -->
        <div class="mt-6">
          <h3 class="text-xl">Ulasan</h3>
          <div class="flex items-center">
            <div class="flex items-center">
              <!-- Active: "text-gray-900", Default: "text-gray-200" -->
              <svg class="text-gray-900 size-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
              </svg>
              <svg class="text-gray-900 size-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
              </svg>
              <svg class="text-gray-900 size-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
              </svg>
              <svg class="text-gray-900 size-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
              </svg>
              <svg class="text-gray-200 size-5 shrink-0" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true" data-slot="icon">
                <path fill-rule="evenodd" d="M10.868 2.884c-.321-.772-1.415-.772-1.736 0l-1.83 4.401-4.753.381c-.833.067-1.171 1.107-.536 1.651l3.62 3.102-1.106 4.637c-.194.813.691 1.456 1.405 1.02L10 15.591l4.069 2.485c.713.436 1.598-.207 1.404-1.02l-1.106-4.637 3.62-3.102c.635-.544.297-1.584-.536-1.65l-4.752-.382-1.831-4.401Z" clip-rule="evenodd" />
              </svg>
            </div>
            <p class="text-xl">4 out of 5 stars</p>
            <a href="#" class="ml-3 text-sm font-medium text-indigo-600 hover:text-indigo-500">117 reviews</a>
          </div>
        </div>
    
      </div>

      

      <div class="py-10 lg:col-span-2 lg:col-start-1 lg:border-r lg:border-gray-200 lg:pt-6 lg:pr-8 lg:pb-16">
        <!-- Description and details -->
        <div>
          <h3 class="text-xl">Description</h3>

          <div class="space-y-6">
            <p class="text-base text-gray-900">{{ $product->description ?? 'Belum ada deskripsi' }}</p>
          </div>
        </div>


        <div class="mt-10">
          <h2 class="text-sm font-medium text-red-500">Perhatian !!</h2>

          <div class="mt-4 space-y-6">
            <p class="text-sm text-gray-400">
              Waspadai penipuan yang mengatasnamakan <strong>Rental PS</strong>. Kami hanya menggunakan nomor resmi <strong>08973847384</strong> untuk komunikasi. Segala informasi di luar itu bukan tanggung jawab kami.
            </p>     
          </div>
          
        </div>
      </div>

      
    </div>

    @if ($errors->any())
        <div class="p-3 mb-4 text-red-700 bg-red-100 rounded">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>- {{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    
    <div class="max-w-6xl px-4 mx-auto">
        <h2 class="text-xl">Form Pemesanan</h2>
        <form class="mt-10" action="{{ url('/produk/detail/payment') }}" method="POST">
            @csrf
            <!-- Atas Nama -->
            <div class="mb-4">
              <label for="name" class="block text-sm font-medium text-gray-900">Atas Nama</label>
              <input type="text" id="name" name="name" required class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-green-500 focus:border-green-500">
            </div>
          
            <!-- Nomor HP -->
            <div class="mb-4">
              <label for="phone_number" class="block text-sm font-medium text-gray-900">No HP</label>
              <input type="tel" id="phone_number" name="phone_number" required class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-green-500 focus:border-green-500">
            </div>

            <input type="hidden" name="product_id" id="product_id">
          
            <!-- Qty Berapa Jam -->
            <div class="mb-4">
              <label for="qty" class="block text-sm font-medium text-gray-900">Qty (Berapa Jam)</label>
              <input type="number" id="qty" name="qty" min="1" value="1" required class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-green-500 focus:border-green-500" oninput="calculatePrice()">
            </div>

            <!-- Tanggal Booking -->
            <div class="mb-4">
                <label for="booking_date" class="block text-sm font-medium text-gray-900">Tanggal Booking</label>
                <input type="date" id="booking_date" name="booking_date" required class="w-full px-4 py-2 mt-1 border rounded-md focus:ring-green-500 focus:border-green-500">
            </div>

            <!-- Harga (Tampilan) -->
            <div class="mb-4">
                <label for="amount_display" class="block text-sm font-medium text-gray-900">Total Harga</label>
                <input type="text" id="amount_display" readonly class="w-full px-4 py-2 mt-1 bg-gray-100 border rounded-md">
            </div>
            
            <!-- Harga (Nominal untuk dikirim) -->
            <input type="hidden" name="amount" id="amount" />

            <div class="p-5 text-sm text-gray-500 border-t">
                <h3 class="mb-4 text-lg font-bold text-gray-700">Payment Options</h3>
                <div class="grid grid-cols-2 gap-4 sm:grid-cols-3 md:grid-cols-5">
                    <!-- Bank BRI -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 peer-checked:border-green-500 peer-checked:border-2">
                        <input type="radio" name="payment_method" value="bri" class="hidden peer">
                        <img src="/payment_method/bri.png"
                             alt="Bank BRI"
                             class="w-full h-16 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- Bank BNI -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="bni" class="hidden peer">
                        <img src="/payment_method/bni.png" 
                            alt="Bank BNI" 
                            class="w-full h-16 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- Bank BCA -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="bca" class="hidden">
                        <img src="/payment_method/bca.png" 
                             alt="Bank BCA" 
                             class="w-full h-16 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- Bank Permata -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="permata" class="hidden">
                        <img src="/payment_method/permata-bank.png" 
                             alt="Bank Permata" 
                             class="w-full h-12 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- QRIS -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="qris" class="hidden">
                        <img src="/payment_method/qris.png" 
                             alt="QRIS" 
                             class="w-full h-12 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- ShopeePay -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="shopeepay" class="hidden">
                        <img src="/payment_method/shopeepay.png" 
                             alt="ShopeePay" 
                             class="w-full h-12 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- Bank Mandiri -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="mandiri" class="hidden">
                        <img src="/payment_method/mandiri.png" 
                             alt="Bank Mandiri" 
                             class="w-full h-12 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                    
                    <!-- Gopay -->
                    <label class="p-2 transition duration-300 ease-in-out border border-transparent group hover:border-green-500 hover:p-3">
                        <input type="radio" name="payment_method" value="gopay" class="hidden">
                        <img src="/payment_method/gopay.png" 
                             alt="Gopay" 
                             class="w-full h-12 transition duration-300 ease-in-out cursor-pointer">
                    </label>
                </div>
                <p class="mt-10 mb-4 text-lg font-bold text-gray-700">Pembayaran Terpilih :</p>
            </div>
          
            <!-- Tombol WhatsApp -->
            <button type="submit" class="flex items-center justify-center w-full px-8 py-3 mt-5 text-base font-medium text-white bg-green-600 border border-transparent rounded-md hover:bg-green-700 focus:ring-2 focus:ring-green-500 focus:ring-offset-2 focus:outline-none">
              Pesan sekarang
            </button>
          </form>

    </div>
  </div>
</div>

         
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const url = window.location.pathname;
        const segments = url.split('/');
        const productId = segments[segments.length - 1]; // Ambil ID dari segment terakhir
        document.getElementById('product_id').value = productId;
    });
</script>

<script>
    const price = {{ $product->price ?? 0 }}; // Harga dasar dari produk
  
    function calculatePrice() {
        const qty = parseInt(document.getElementById('qty').value) || 0;
        const bookingDateInput = document.getElementById('booking_date').value;
        
        let totalPrice = price * qty;

        // Cek apakah tanggal booking dipilih dan jatuh pada hari Sabtu (6)
        if (bookingDateInput) {
            const bookingDate = new Date(bookingDateInput);
            const day = bookingDate.getDay(); // 0 = Minggu, 6 = Sabtu

            if (day === 6 || day === 0) {
                totalPrice += 50000;
            }
        }

        // Tampilkan harga dalam format rupiah
        document.getElementById('amount_display').value = totalPrice.toLocaleString('id-ID', {
            style: 'currency',
            currency: 'IDR'
        });

        // Simpan nilai angka murni ke hidden input
        document.getElementById('amount').value = totalPrice;
    }

    // Hitung saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function () {
        calculatePrice();

        // Tambahkan event listener jika tanggal berubah
        document.getElementById('booking_date').addEventListener('change', calculatePrice);
    });
</script>

  

<script>
    document.addEventListener("DOMContentLoaded", function () {
    // Ambil semua input radio dengan name "payment_method"
    const paymentOptions = document.querySelectorAll('input[name="payment_method"]');
    const selectedPaymentText = document.querySelector('.mt-10.mb-4.text-lg.font-bold.text-gray-700');

    // Tambahkan event listener ke setiap radio button
    paymentOptions.forEach(option => {
        option.addEventListener('change', function () {
            // Ambil nilai dari input yang dipilih
            const selectedPayment = document.querySelector('input[name="payment_method"]:checked').value;
            // Ubah teks pembayaran terpilih
            selectedPaymentText.textContent = `Pembayaran Terpilih : ${selectedPayment.toUpperCase()}`;
        });
    });
});

</script>

<script>
    document.addEventListener("DOMContentLoaded", () => {
        const paymentOptions = document.getElementById("payment-options");
        const labels = paymentOptions.querySelectorAll("label");

        labels.forEach(label => {
            const input = label.querySelector("input");

            label.addEventListener("click", () => {
                // Remove active border from all labels
                labels.forEach(l => l.classList.remove("border-green-500", "border-2"));

                // Add active border to the clicked label
                label.classList.add("border-green-500", "border-2");
            });
        });
    });
</script>

@endsection