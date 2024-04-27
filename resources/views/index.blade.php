@extends('layout.main')

@section('content')
<div class="text-container gap-5">
    <a href="{{ route('admin.dashboard') }}" class="flex justify-center rounded-full text-white bg-gradient-to-r from-indigo-500 via-purple-500 p-2 pr-3 pl-3 outline outline-2 outline-offset-2 h-10 w-40">User</a>
    <a href="{{ route('admin.index') }}" class="flex justify-center rounded-full text-white bg-gradient-to-r from-indigo-500 via-purple-500 p-2 pr-3 pl-3 outline outline-2 outline-offset-2 h-10 w-40">Dashboard</a>
    <a href="{{ route('logout') }}" class="flex justify-center rounded-full text-white bg-gradient-to-r from-indigo-500 via-purple-500 p-2 pr-3 pl-3 outline outline-2 outline-offset-2 h-10 w-40">Log Out</a>
</div>
@endsection
