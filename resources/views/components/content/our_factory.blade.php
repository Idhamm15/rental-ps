<section>
    <div class="container px-4 md:px-16">
        <div class="mt-10 flex flex-col md:flex-row bg-[#E5F8FF] min-h-screen p-8 rounded-3xl shadow-md">

            <div class="flex flex-col justify-start w-full p-4 rounded-lg md:w-1/2 md:pt-20">
                <h2 class="mb-4 text-2xl font-bold">
                    @foreach (explode(' ', $factory_title->title) as $index => $word)
                        <span class="{{ $index === 0 ? 'text-black' : 'text-blue-500' }}">
                            {{ $word }}
                        </span>
                    @endforeach
                </h2>
                <p class="mb-6 text-sm text-gray-500">
                    {{ $factory_title->sub_title ?? '' }}
                </p>
                
                <ul class="space-y-4">
                    @forelse ($factory_list as $item)
                        <li class="flex items-center p-3 bg-white rounded-md group hover:bg-blue-500"
                            data-title="{{ $item->content ?? '' }}"
                            data-sub-title="{{ $item->sub_title ?? '' }}"
                            data-image="/images/{{ $item->image ?? '/default-image.png' }}"
                            onclick="updateContent(this)"
                        >
                            <!-- Ikon pertama di kiri (normal) -->
                            <svg class="w-6 h-6 mr-2 transition-all duration-200 group-hover:hidden" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.5 13C0.5 6.09644 6.09644 0.5 13 0.5C19.9036 0.5 25.5 6.09644 25.5 13C25.5 19.9036 19.9036 25.5 13 25.5C6.09644 25.5 0.5 19.9036 0.5 13Z" fill="#161616"/>
                            <path d="M9.25 13L11.75 15.5L16.75 10.5" stroke="#F2F2F2" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            <!-- Ikon pertama di kiri (saat hover) -->
                            <svg class="w-6 h-6 mr-2 group-hover:block stroke-[#00ABEF] transition-all duration-200 hidden" width="26" height="26" viewBox="0 0 26 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M0.5 13C0.5 6.09644 6.09644 0.5 13 0.5C19.9036 0.5 25.5 6.09644 25.5 13C25.5 19.9036 19.9036 25.5 13 25.5C6.09644 25.5 0.5 19.9036 0.5 13Z" fill="#F2F2F2"/>
                            <path d="M9.25 13L11.75 15.5L16.75 10.5" stroke="#00ABEF" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                        
                            <!-- Teks -->
                            <a href="#" class="text-black group-hover:text-white">
                                {{ $item->content ?? '' }}
                            </a>
                        
                            <!-- Ikon kedua di kanan (default) -->
                            <svg class="w-6 h-6 ml-auto transition-all duration-200 group-hover:hidden stroke-gray-600 group-hover:stroke-white" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M12 8V16M12 16L14.5 13.5M12 16L9.5 13.5M3 12C3 10.22 3.52784 8.47991 4.51677 6.99987C5.5057 5.51983 6.91131 4.36628 8.55585 3.68509C10.2004 3.0039 12.01 2.82567 13.7558 3.17294C15.5016 3.5202 17.1053 4.37737 18.364 5.63604C19.6226 6.89472 20.4798 8.49836 20.8271 10.2442C21.1743 11.99 20.9961 13.7996 20.3149 15.4442C19.6337 17.0887 18.4802 18.4943 17.0001 19.4832C15.5201 20.4722 13.78 21 12 21C9.61305 21 7.32386 20.0518 5.63604 18.364C3.94821 16.6761 3 14.387 3 12Z" stroke="#999999" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                            
                            <!-- Ikon kedua kanan (hover) -->
                            <svg class="ml-auto w-6 h-6 group-hover:block stroke-[#00ABEF] transition-all duration-200 hidden" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                <path d="M8 12H16M16 12L13.5 9.5M16 12L13.5 14.5M12 21C10.22 21 8.47991 20.4722 6.99987 19.4832C5.51983 18.4943 4.36628 17.0887 3.68509 15.4442C3.0039 13.7996 2.82567 11.99 3.17294 10.2442C3.5202 8.49836 4.37737 6.89472 5.63604 5.63604C6.89472 4.37737 8.49836 3.5202 10.2442 3.17294C11.99 2.82567 13.7996 3.0039 15.4442 3.68509C17.0887 4.36628 18.4943 5.51983 19.4832 6.99987C20.4722 8.47991 21 10.22 21 12C21 14.387 20.0518 16.6761 18.364 18.364C16.6761 20.0518 14.387 21 12 21Z" stroke="#F2F2F2" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                            </svg>
                                
                        </li>
                    @empty
                        <p>Tidak ada content</p>
                    @endforelse
                    
                      
                </ul>
            </div>

            <div class="flex items-center justify-center w-full md:w-1/2">
                <div id="detail-container" class="w-full p-6 bg-white rounded-lg shadow-lg md:max-w-md">
                    <img id="detail-image" src="/images/{{ $factory_list_first->image }}" alt="Auto Cartoning" class="object-cover w-full mb-4 rounded-lg">
                    <h3 id="detail-title" class="text-xl font-semibold text-center">{{ $factory_list_first->title }}</h3>
                    <p id="detail-description" class="text-center text-gray-600">{{ $factory_list_first->sub_title }}</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    function updateContent(element) {
        // Ambil data dari elemen yang diklik
        const title = element.getAttribute('data-title');
        const subTitle = element.getAttribute('data-sub-title');
        const image = element.getAttribute('data-image');

        // Perbarui konten pada bagian detail
        document.getElementById('detail-title').textContent = title;
        document.getElementById('detail-description').textContent = subTitle;
        document.getElementById('detail-image').src = image;
        document.getElementById('detail-image').alt = title;
    }
</script>
