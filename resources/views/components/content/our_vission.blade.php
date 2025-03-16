<section class="justify-center text-gray-600 body-font">
    <div class="container flex justify-center mx-auto">
        <h1 class="title-font sm:text-[50px] text-3xl mb-4 font-medium text-gray-500">
            @foreach (explode(' ', $vision->title) as $index => $word)
                <span class="{{ $index === 0 ? 'text-black' : 'text-blue-500' }}">
                    {{ $word }}
                </span>
            @endforeach
        </h1>          

    </div>
    <div class="flex justify-center mt-5 text-center">
        <p class="text-xl text-gray-900 lg:text-2xl">
            {{ $vision->description ?? ''}}
        </p>
    </div>
</section>