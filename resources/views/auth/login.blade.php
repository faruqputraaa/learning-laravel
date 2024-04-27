@extends('layout.main')
@section('content')
<form class="text-container" action="{{ route('login-proses')}}" method="POST">
    @csrf
    
    <div class="flex flex-col items-center ">
        <h1 class="text-5xl font-bold text-gray-100 mb-6 font-serif ">Login</h1>
        <label class="text-white mt-5 ">Email</label>
        <input type="email" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="email">
        @error('email')
        <small>{{ $message }}</small>
        @enderror   
        <label class="text-white mt-5 ">Password</label>
        <input type="password" class="text-gray-800 text-center rounded-full bg-gray-200 p-2 mt-2  z-30" name="password">
        @error('password')
        <small>{{ $message }}</small>
        @enderror
        
        <button type="submit"  class="bg-blue-400 m-5 p-2 pl-5 pr-5 text-center rounded-full z-30">Submit</button>
        <a href="{{ route('register') }}" class=" z-50 font-bold flex"><small>belum punya akun</small></a>
    </div>

</form>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
@if($message = Session::get('failed'))
    <script>
        let timerInterval;
        Swal.fire({
        title: "{{ $message }}",
        html: "I will close in <b></b> milliseconds.",
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
        });
    </script>
@endif

@if($message = Session::get('success'))
    <script>
        let timerInterval;
        Swal.fire({
        title: "{{ $message }}",
        html: "I will close in <b></b> milliseconds.",
        timer: 2000,
        timerProgressBar: true,
        didOpen: () => {
            Swal.showLoading();
            const timer = Swal.getPopup().querySelector("b");
            timerInterval = setInterval(() => {
            timer.textContent = `${Swal.getTimerLeft()}`;
            }, 100);
        },
        willClose: () => {
            clearInterval(timerInterval);
        }
        }).then((result) => {
        /* Read more about handling dismissals below */
        if (result.dismiss === Swal.DismissReason.timer) {
            console.log("I was closed by the timer");
        }
        });
    </script>
@endif



@endsection

