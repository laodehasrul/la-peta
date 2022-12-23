<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>{{ setting('site.title') }} | Kementerian PUPR</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="{{ asset('/glidejs/glide.core.min.css') }}">
  <link rel="stylesheet" href="{{ asset('/glidejs/glide.theme.min.css') }}">
  <script src="{{ asset('/glidejs/glide.min.js') }}"></script>
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
  <header class="relative">
    @include('frontend.components.header')
  </header>

  <main class="relative">
    <div class="mt-10 relative">
      @yield('content')
    </div>
    
  </main>
  @include('sweetalert::alert')
  @include('frontend.components.footer')
  

</body>

</html>