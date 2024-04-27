<!DOCTYPE html>
<html>
<head>
    <title>Learning laravel</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/icons/amikom.ico')}}">
</head>
<body>

<nav class=" p-4 rounded-b-xl fixed top-0 w-full z-50 mb-1">
  <div class="mx-auto">
    <div class="flex justify-between items-center">
      <!-- Logo -->
      <div class="flex items-center">
        <img src= "{{asset('assets/images/logo_amikom.png') }}" alt="" class="size-12"/>
        <h6 class="ml-4 text-white">amikom university </h6>      
    </div>
      
      <!-- Links -->
      <div class="hidden md:block">
        <ul class="flex space-x-4"> 
          <li><button class="rounded-full text-white bg-gradient-to-r from-indigo-500 via-purple-500  p-2 pr-3 pl-3 outline outline-2 outline-offset-2">Login</button></li>
          <li><button href="{{ route('register') }}" class="rounded-full text-white bg-gradient-to-r from-indigo-500 via-purple-500  p-2 pr-3 pl-3 outline outline-2 outline-offset-2">Register</button></li>
        </ul>
        </div>
    </div>
  </div>
</nav>
<div class="flex flex-col justify-center  mt-12">
    @yield('content')
</div>
<canvas id="rainfall"></canvas> 
   
@vite('resources/js/app.js')
</body>
</html>
