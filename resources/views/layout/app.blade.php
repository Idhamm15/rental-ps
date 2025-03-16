<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Volkhov:wght@400;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="shortcut icon" href="{{url('images/logo_hanna.png')}}" type="image/x-icon">

  <title>@yield('title')</title>

  @vite('resources/css/app.css')
</head>
<body class="mx-auto font-abeezee">
  <div class="px-10 mx-auto bg-[#4CC9FE]">
    @include('components.navbar')
    @if(Request::is('/')) 
        @include('components.hero')
    @endif
  </div>
  @if(Request::is('/')) 
    <section>
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#4CC9FE" fill-opacity="1" d="M0,0L60,37.3C120,75,240,149,360,149.3C480,149,600,75,720,90.7C840,107,960,213,1080,224C1200,235,1320,149,1380,106.7L1440,64L1440,0L1380,0C1320,0,1200,0,1080,0C960,0,840,0,720,0C600,0,480,0,360,0C240,0,120,0,60,0L0,0Z"></path>
        </svg>
    </section>
  @endif

  <div class="container px-10 mx-auto bg-white">
    <div class="content">
      @yield('content')
    </div>
  </div>
  @include('components.footer')

  <script>
    @if(session('success'))
        Swal.fire({
            toast: true,
            icon: 'success',
            title: "{{ session('success') }}",
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        });
    @elseif(session('error'))
        Swal.fire({
            toast: true,
            icon: 'error',
            title: "{{ session('error') }}",
            position: 'top-end',
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        });
    @endif
</script>

</body>
</html>