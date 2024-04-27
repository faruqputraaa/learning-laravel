<!DOCTYPE html>
<html>
<head>
    <title>Learning laravel</title>
    @vite('resources/css/app.css')
    <link rel="shortcut icon" href="{{ asset('assets/icons/amikom.ico')}}">
</head>
<body>
<div class="flex flex-col justify-center  mt-12">
<form class="text-container ml-96" action="{{ route('register-proses')}}" method="POST">
    @csrf
<div class="flex flex-col items-center">
        <h1 class="text-5xl font-bold text-gray-100 mb-6 ">Register</h1>
        <label class="text-white mt-5 ">Email</label>
        <input type="email" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="email">
        @error('email')
        <small>{{ $message }}</small>
        @enderror
        <label class="text-white mt-5 ">Nama</label>
        <input type="text" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="name">
        @error('name')
        <small>{{ $message }}</small>
        @enderror
        <label class="text-white mt-5 ">Password</label>
        <input type="password" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="password">
        @error('password')
        <small>{{ $message }}</small>
        @enderror
        <button type="submit"  class="bg-blue-400 m-5 p-2 pl-5 pr-5 text-center rounded-full z-30">Sign Up</button>
</div>
</form>
</div>

<canvas id="rainfall"></canvas> 
   
@vite('resources/js/app.js')
</body>
</html>
