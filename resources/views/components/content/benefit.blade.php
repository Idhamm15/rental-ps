<section class="text-gray-600 body-font">
    <div class="container flex flex-col items-center px-5 py-24 mx-auto md:flex-row">
        <!-- Teks berada di kiri, gambar di kanan pada layar besar -->
        <div class="flex flex-col items-center text-center lg:flex-grow lg:pl-32 md:w-1/2 lg:pr-24 md:pr-16 md:items-start md:text-left lg:mb-52">
            
            <h1 class="title-font sm:text-[46.44px] text-2xl lg:text-3xl font-medium text-gray-900">
                @php
                    $words = explode(' ', $benefit_title->title);
                    $blackWords = array_slice($words, 0, count($words) - 2);
                    $blueWords = array_slice($words, -2);
                @endphp
                <span class="text-black">
                    {{ implode(' ', $blackWords) }}
                </span>
                <span class="font-bold text-blue-500">
                    {{ implode(' ', $blueWords) }}
                </span>
            </h1>    
            <p class="mb-10">
                {{ $benefit_title->sub_title }}
            </p>        

            <div class="flex justify-start">
                <ul class="space-y-7">
                    @foreach ($benefit_list as $item)
                        <li class="flex justify-between text-xl font-bold text-gray-900 lg:text-2xl">
                            <div class="flex justify-start">
                                <span class="mr-2">
                                    <img src="/images/check_circle.png" alt="">
                                </span>
                                {{ $item->content}}
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>

        <!-- Gambar akan berada di atas pada tampilan mobile dan di sebelah kanan pada desktop -->
        <div class="w-full mt-10 lg:w-1/2 md:w-full lg:ml-auto sm:mt-10 lg:mt-0"> <!-- Menambahkan margin top di mobile untuk memastikan gambar berada di atas -->
            <div class="relative">
                <div class="flex px-12">
                    <img 
                    id="mainImage"
                    class="object-cover object-center lg:w-full w-[1100px] shadow-2xl rounded-xl h-[200px] lg:h-[400px]" 
                    alt="Main Image" 
                    src="/images/{{ $benefit_image_first->image }}"
                    >
                </div>
            </div>
            
            <div class="flex justify-center mt-4 space-x-4 sm:space-x-6 md:space-x-9">
                @foreach ($benefit_image as $item)
                    <img 
                        class="object-cover object-center w-16 transition duration-300 rounded-lg shadow-md cursor-pointer h-14 sm:w-20 sm:h-16 md:w-23 md:h-20 hover:opacity-80" 
                        {{-- alt="Thumbnail {{ $key + 1 }}"  --}}
                        src="/images/{{ $item->image ?? '' }}"
                        data-src="/images/{{ $item->image ?? '' }}"
                        onclick="changeMainImage(this)"
                    >                 
                @endforeach
            </div>
        </div>
    </div>
</section>

<script>
    const mainImage = document.getElementById('mainImage');
    const thumbnails = document.querySelectorAll('.thumbnail');

    function changeMainImage(thumbnail) {
        mainImage.src = thumbnail.dataset.src;
        thumbnails.forEach(thumb => thumb.classList.remove('active-thumbnail'));
        thumbnail.classList.add('active-thumbnail');
        console.log("Gambar utama sekarang:", mainImage.src);
    }

    document.addEventListener('DOMContentLoaded', () => {
        const mainImage = document.getElementById('mainImage');
        const thumbnails = document.querySelectorAll('.thumbnail');

        // Pastikan gambar utama tetap seperti yang sudah di-set di HTML
        console.log("Gambar utama saat load:", mainImage.src);

        // Tambahkan event listener ke setiap thumbnail
        thumbnails.forEach(thumbnail => {
            thumbnail.addEventListener('click', () => {
                mainImage.src = thumbnail.dataset.src;
                
                // Hapus kelas aktif dari semua thumbnail
                thumbnails.forEach(thumb => thumb.classList.remove('active-thumbnail'));
                
                // Tambahkan kelas aktif ke thumbnail yang diklik
                thumbnail.classList.add('active-thumbnail');

                console.log("Gambar utama sekarang:", mainImage.src);
            });
        });
    });
</script>
