@props(['title' => null, 'jobs' => []])

<section class="py-12 bg-gray-100">
    <div class="px-4 mx-auto max-w-7xl sm:px-6 lg:px-8">

        {{-- Judul --}}
        @if ($title)
            <h2 class="mb-2 text-2xl font-bold text-center text-gray-800">{{ $title }}</h2>
            <p class="mb-8 text-center text-gray-500">
                Temukan layanan dan produk hannachemindo terbaik untuk Anda
            </p>
        @endif

        {{-- Search & Filter --}}
        <form action="">
            <div class="flex flex-col gap-4 mb-8 md:flex-row md:items-center">
                <div class="relative w-full md:w-2/3">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none">
                        {{-- SVG Search Icon --}}
                        <svg width="20" height="20" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path d="M15.5 14H14.71L14.43 13.73C15.444 12.5541 16.0012 11.0527 16 9.5C16 8.21442 15.6188 6.95772 14.9046 5.8888C14.1903 4.81988 13.1752 3.98676 11.9874 3.49479C10.7997 3.00282 9.49279 2.87409 8.23192 3.1249C6.97104 3.3757 5.81285 3.99477 4.90381 4.90381C3.99477 5.81285 3.3757 6.97104 3.1249 8.23192C2.87409 9.49279 3.00282 10.7997 3.49479 11.9874C3.98676 13.1752 4.81988 14.1903 5.8888 14.9046C6.95772 15.6188 8.21442 16 9.5 16C11.11 16 12.59 15.41 13.73 14.43L14 14.71V15.5L19 20.49L20.49 19L15.5 14ZM9.5 14C7.01 14 5 11.99 5 9.5C5 7.01 7.01 5 9.5 5C11.99 5 14 7.01 14 9.5C14 11.99 11.99 14 9.5 14Z"
                                fill="#5D5D7C" />
                        </svg>
                    </div>
                    <input
                        type="text"
                        class="w-full py-2 pl-10 pr-4 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Cari Lowongan" />
                </div>
                
                <div class="w-full md:w-1/4">
                    <select
                        class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500"
                    >
                        <option value="terbaru">Terbaru</option>
                        <option value="terlama">Terlama</option>
                    </select>
                </div>
            </div>
        </form>

        {{-- Daftar Lowongan --}}
        <div class="grid grid-cols-1 gap-6 md:grid-cols-2">
            @forelse ($jobs as $job)
                <div class="flex flex-col gap-6 p-6 overflow-hidden bg-white shadow-md rounded-xl">
                    <img src="{{ $job->image ? '/images/' . $job->image : '/images/default.jpg' }}"
                        alt="{{ $job->title }}"
                        class="object-cover w-full rounded-md h-60" />
        
                    <div class="flex-1 text-gray-800">
                        <h3 class="mb-1 text-lg font-bold">{{ $job->title }}</h3>
                        <p class="mb-1 text-sm">Gaji: {{ $job->salary ?? '-' }}</p>
                        <p class="mb-1 text-sm">{{ ucfirst($job->location_type ?? 'Onsite') }}</p>
        
                        <p class="mt-3 mb-1 text-sm font-semibold">Jobdesk :</p>
                        <ul class="space-y-1 text-sm text-gray-700 list-disc list-inside">
                            @foreach ($job->jobdesk_item as $item)
                                <li>{{ $item->body ?? '' }}</li>
                            @endforeach
                        </ul>

                        <div class="mt-4">
                            <a href="{{ url('/lowongan/detail', $job->id) }}"
                                class="inline-block px-4 py-2 text-sm font-semibold text-white bg-blue-600 rounded hover:bg-blue-700">
                                Detail Lowongan
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-2 text-center text-gray-500">
                    Belum ada lowongan tersedia.
                </div>
            @endforelse
        </div>
        

    </div>
</section>