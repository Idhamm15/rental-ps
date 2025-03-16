@extends('layout.auth')

@section('title', 'Login Page')

@section('content')
<section class="login-page">
    <div class="flex justify-center min-h-screen text-gray-900 bg-gray-100">
        <div class="flex justify-center flex-1 max-w-screen-xl m-0 bg-white shadow sm:m-10 sm:rounded-lg">
            <div class="p-6 lg:w-1/2 xl:w-5/12 sm:p-12">
                <div>
                    <img src="/images/images/logo-no-bg.png"
                        class="mx-auto w-36" />
                </div>
                <div class="flex flex-col items-center mt-12">
                    <h1 class="text-2xl font-extrabold xl:text-3xl">
                        Sign In
                    </h1>
                    <div class="flex-1 w-full mt-8"> 
                        <form method="POST" action="{{ route('login') }}">
                            @csrf
                            <div class="max-w-xs mx-auto mt-10">
                                <div>
                                    <input
                                        class="w-full px-8 py-4 text-sm font-medium placeholder-gray-500 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-300 focus:bg-white"
                                        type="email" 
                                        placeholder="Email" 
                                        id="email" 
                                        name="email" 
                                        value="{{ old('email') }}"
                                        autocomplete="email" 
                                        autofocus
                                        required
                                    />
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <div>
                                    <input
                                        class="w-full px-8 py-4 mt-5 text-sm font-medium placeholder-gray-500 bg-gray-100 border border-gray-200 rounded-lg focus:outline-none focus:border-blue-300 focus:bg-white"
                                        type="password" 
                                        placeholder="Password" 
                                        id="password" 
                                        name="password" 
                                        autocomplete="current-password" 
                                        required
                                    />
                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <button
                                    class="flex items-center justify-center w-full py-4 mt-5 font-semibold tracking-wide text-gray-100 transition-all duration-300 ease-in-out bg-indigo-500 rounded-lg hover:bg-indigo-700 focus:shadow-outline focus:outline-none">
                                        Sign In
                                </button>
                                <p class="mt-6 text-xs text-center text-gray-600">
                                    I agree to abide by templatana's
                                    <a href="#" class="border-b border-gray-500 border-dotted">
                                        Terms of Service
                                    </a>
                                    and its
                                    <a href="#" class="border-b border-gray-500 border-dotted">
                                        Privacy Policy
                                    </a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="flex-1 hidden text-center bg-indigo-100 lg:flex">
                <div class="w-full m-12 bg-center bg-no-repeat bg-contain xl:m-16"
                    style="background-image: url('/images/banner-login.png');">
                </div>
            </div>
        </div>
    </div>
</section>
@endsection

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
function copyToClipboard(text) {
  navigator.clipboard.writeText(text).then(function() {
    Swal.fire({
      toast: true,
      icon: 'success',
      title: 'Berhasil disalin!',
      position: 'top-end',
      showConfirmButton: false,
      timer: 1500,
      timerProgressBar: true,
    });
  }, function(err) {
    console.error('Gagal menyalin: ', err);
  });
}

</script>
