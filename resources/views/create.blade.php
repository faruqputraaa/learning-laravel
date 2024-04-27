@extends('layout.main')
@section('content')
<form action="{{ route('admin.user.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="m-20  flex flex-col items-center">
        <h1 class="text-5xl font-bold text-gray-100 mb-6 ">Tambah User</h1>
        <label class="text-white mt-5 ">Photo Profile</label>
        <input type="file" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30  " name="photo">
        @error('photo')
        <small>{{ $message }}</small>
        @enderror
        <label class="text-white mt-5 ">Email</label>
        <input type="email" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="email" value="{{ old('email') }}">
        @error('email')
        <small>{{ $message }}</small>
        @enderror
        <label class="text-white mt-5 ">Nama</label>
        <input type="text" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="name" value="{{ old('name') }}">
        @error('name')
        <small>{{ $message }}</small>
        @enderror
        <label class="text-white mt-5 ">Password</label>
        <input type="password" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="password">
        @error('password')
        <small>{{ $message }}</small>
        @enderror
        <button type="submit"  class="bg-blue-400 m-5 p-2 pl-5 pr-5 text-center rounded-full z-30">Submit</button>
    </div>
</form>
@endsection
