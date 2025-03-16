<section class="mt-10">
  <div class="container px-6 mx-auto">
    <div class="p-10 mb-20 shadow-lg bg-blue-50 rounded-2xl">
      <div class="flex flex-col items-center justify-between gap-8 md:flex-row">
        
        <!-- Bagian Teks -->
        <div class="text-center md:text-left md:w-1/2">
          <h1 class="mb-4 text-xl font-bold text-blue-600 lg:text-3xl">
            Butuh informasi lebih lanjut?
          </h1>
          <p class="text-xs text-blue-600 lg:text-lg">
            Masukkan email Anda, dan spesialis kami akan segera menghubungi Anda.
          </p>
        </div>

        <!-- Bagian Input dan Tombol -->
        <form action="{{ route('send_email') }}" method="POST" class="w-full md:w-1/2">
          @csrf <!-- Laravel CSRF Token -->
          <div class="relative w-full bg-white rounded-full shadow-md h-14">
              <input 
                  class="w-full h-full px-6 pr-20 text-xs border-2 border-gray-100 rounded-full outline-none lg:text-xl focus:ring-2 focus:ring-blue-300 focus:border-blue-400" 
                  placeholder="Masukkan alamat email" 
                  type="email" 
                  name="email" 
                  id="email" 
                  autocomplete="email" 
                  required
              />
              <button 
                  type="submit" 
                  class="absolute flex items-center h-12 px-5 pr-3 text-white transition duration-300 bg-blue-600 rounded-full right-1 top-1 hover:bg-blue-700 focus:ring-2 focus:ring-offset-2 focus:ring-blue-500"
              >
                  <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                      <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                      <line x1="10" y1="14" x2="21" y2="3" />
                      <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
                  </svg>
              </button>
          </div>
      </form>

      </div>
    </div>
  </div>
</section>