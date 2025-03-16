<section class="mt-10 text-gray-600 body-font">
    <div class="container flex justify-center mx-auto">
        <h1 class="title-font sm:text-[50px] text-3xl mb-4 font-medium text-gray-500">
            @foreach (explode(' ', $mission->title) as $index => $word)
                <span class="{{ $index === 0 ? 'text-black' : 'text-blue-500' }}">
                    {{ $word }}
                </span>
            @endforeach
        </h1>          

    </div>
    <div class="flex flex-col justify-center w-full px-4 mt-5 space-y-4 lg:flex-row lg:space-y-0 lg:space-x-6 lg:px-12">
        <!-- Kolom Teks -->
        <div class="w-full lg:w-1/2">
            <p class="text-xl text-gray-900 lg:text-2xl">
                {!! nl2br(e($mission->description ?? '')) !!}
            </p>  
        </div>
    
        <!-- Kolom Gambar -->
        <div class="flex justify-center w-full lg:w-1/2 lg:justify-end">
            <img src="images/default_product.png" alt="Deskripsi Gambar" class="object-cover w-full h-72 rounded-2xl">
        </div>
    </div>
    
    
    
</section>