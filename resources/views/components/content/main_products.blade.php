@props(['title' => null])


<div class="py-6 text-center">
    <h1 class="text-2xl font-bold">Produk</h1>
    <p class="text-gray-500">Temukan layanan dan produk rentalps terbaik untuk Anda</p>
</div>

<!-- Navbar -->
<div class="flex justify-center py-3 space-x-8 bg-[#4CC9FE] rounded-3xl">
    <a href="#" class="font-semibold text-white hover:text-gray-100">Hansanitizer</a>
    <span class="h-5 border-l border-white"></span>
    <a href="#" class="font-semibold text-white hover:text-gray-100">Chemical</a>
    <span class="h-5 border-l border-white"></span>
    <a href="#" class="font-semibold text-white hover:text-gray-100">Lubricant</a>
    <span class="h-5 border-l border-white"></span>
    <a href="#" class="font-semibold text-white hover:text-gray-100">Water Treatment</a>
</div>

<section class="py-12">
  <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">
      <!-- Judul -->
      @if ($title)
          <h2 class="mb-8 text-2xl font-bold text-center text-gray-800">
              {{ $title }}
          </h2>
      @endif
  
      <!-- Grid Produk -->
      <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4">
      <!-- Card Produk -->
      @foreach ($product_item as $item)
          
        <div class="p-4 overflow-hidden text-center bg-white shadow-md rounded-xl">
            <img src="/images/{{ $item->image_product->first()->image ?? ''}}" alt="Produk A" class="object-contain w-full mx-auto mb-4 h-36" />
            <h3 class="text-base font-bold text-gray-800">{{ $item->sub_product ?? '' }}</h3>
            <p class="mb-1 text-sm text-gray-500">{{ $item->category_product->name ?? '' }}</p>
            <p class="mb-2 text-sm text-gray-700">Rp. {{ $item->price ?? '20.000' }}</p>
            <a href="/produk/detail/{{ $item->id }}" class="text-sm font-medium text-blue-600 hover:underline">Lihat Detail</a>
        </div>
      @endforeach
      
      </div>
  </div>

    
  <!-- Pagination -->
  <div class="flex justify-center mt-10">
    <nav class="relative z-0 inline-flex -space-x-px rounded-md shadow-sm" aria-label="Pagination">
        <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md hover:bg-gray-50">
            <span class="sr-only">Previous</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
            1
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100">
            2
        </a>
        <a href="#" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 hover:bg-gray-50">
            3
        </a>
        <a href="#" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md hover:bg-gray-50">
            <span class="sr-only">Next</span>
            <svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
            </svg>
        </a>
    </nav>
  </div>
</section>