@props(['title' => null])

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
      @foreach ($product as $item)
        <div class="p-4 overflow-hidden text-center bg-white shadow-md rounded-xl">
            <img src="/images/{{ $item->image ?? '' }}" alt="Produk A" class="object-contain w-full mx-auto mb-4 h-36" />
            <h3 class="text-base font-bold text-gray-800">{{ $item->name ?? '' }}</h3>
            <p class="mb-1 text-sm text-gray-500">{{ $item->category_product->name ?? '' }}</p>
            <p class="mb-2 text-sm text-gray-700">Rp. {{ $item->price ?? '20.000' }}</p>
            <a href="/produk/detail/{{ $item->id }}" class="text-sm font-medium text-blue-600 hover:underline">Lihat Detail</a>
        </div>
      @endforeach
      
      </div>
  </div>
</section>