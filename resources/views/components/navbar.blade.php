<nav class="relative z-10 px-4 py-9">
  <div class="container mx-auto">
    <div class="flex items-center justify-between">
      <!-- Logo -->
      <a href="/">
        <img src="{{ asset('images/logo-no-bg.png') }}" alt="Logo" class="order-1 sm:order-2 w-[142px] h-[120px]" />   
      </a>

      <!-- Toggle Button (Mobile) -->
      <button id="nav-toggle" class="flex items-center order-2 lg:hidden sm:order-1">
        <!-- Ikon Menu (default) -->
        <svg id="icon-menu" class="w-8 h-8 text-blue-500 fill-current" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16"/>
        </svg>
        <!-- Ikon Close (hidden secara default) -->
        <svg id="icon-close" class="hidden w-8 h-8 text-blue-500 fill-current" viewBox="0 0 24 24">
          <path stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
        </svg>
      </button>

      <!-- Navigation Links (Desktop) -->
      <div id="nav-menu" class="order-2 hidden lg:block">
        <ul class="flex flex-col gap-8 lg:flex-row lg:gap-16">
          <li>
            <a href="/" class="text-white nav-link font-abeezee relative after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
              Beranda
            </a>
          </li>
          <li>
            <a href="/#" class="text-white nav-link font-abeezee relative after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
              Profil Perusahaan
            </a>
          </li>
          <li>
            <a href="/#" class="text-white nav-link font-abeezee relative after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
              Produk
            </a>
          </li>
          <li>
            <a href="/#" class="text-white nav-link font-abeezee relative after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
              Lowongan
            </a>
          </li>
          <li>
            <a href="/#" class="text-white nav-link font-abeezee relative after:content-[''] after:absolute after:left-0 after:bottom-[-4px] after:w-0 after:h-[2px] after:bg-white after:transition-all after:duration-300 hover:after:w-full">
              Hubungi Kami
            </a>
          </li>
        </ul>        
        
      </div>
    </div>

    <!-- Mobile Menu -->
    <div class="absolute left-0 hidden w-full p-4 bg-white rounded-lg shadow-lg top-full lg:hidden" id="mobile-nav">
      <ul class="flex flex-col space-y-4 text-center">
        <li><a href="/" class="text-gray-600 nav-link hover:text-blue-500 font-abeezee">Home</a></li>
        <li><a href="/#" class="text-gray-600 nav-link hover:text-blue-500 font-abeezee">Company Profile</a></li>
        <li><a href="/#" class="text-gray-600 nav-link hover:text-blue-500 font-abeezee">Products & Services</a></li>
        <li><a href="/#" class="text-gray-600 nav-link hover:text-blue-500 font-abeezee">Factory</a></li>
        <li><a href="/#" class="text-gray-600 nav-link hover:text-blue-500 font-abeezee">Our Clients</a></li>
        <li><a href="/#" class="text-gray-600 nav-link hover:text-blue-500 font-abeezee">Contact Us</a></li>
      </ul>
    </div>
  </div>
</nav>

<script>
  const navLinks = document.querySelectorAll('.nav-link');
  
  // Mendapatkan pathname halaman saat ini
  const currentPath = window.location.pathname;
  
  // Loop melalui semua link dan tambahkan kelas aktif
  navLinks.forEach(link => {
    if (link.getAttribute('href') === currentPath) {
      link.classList.add('text-blue-500');
      link.classList.remove('text-gray-600');
    } else {
      link.classList.remove('text-blue-500');
    }
  });
  
  // Toggle mobile menu
  const navToggle = document.getElementById('nav-toggle');
  const mobileNav = document.getElementById('mobile-nav');
  const iconMenu = document.getElementById('icon-menu');
  const iconClose = document.getElementById('icon-close');
  
  navToggle.addEventListener('click', () => {
    mobileNav.classList.toggle('hidden');
    iconMenu.classList.toggle('hidden');
    iconClose.classList.toggle('hidden');
  });
  </script>

<script>
const navToggle = document.getElementById('nav-toggle');
const mobileNav = document.getElementById('mobile-nav');
const iconMenu = document.getElementById('icon-menu');
const iconClose = document.getElementById('icon-close');

navToggle.addEventListener('click', () => {
  // Toggle visibility untuk mobile navigation
  mobileNav.classList.toggle('hidden');
  
  // Toggle ikon menu dan close
  iconMenu.classList.toggle('hidden');
  iconClose.classList.toggle('hidden');
});
</script>


