@extends('layout.main')
@section('content')
    <div class ="text-container">
        <table>
            <tr>
                <td>No</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Action</td>
            </tr>

            @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td class="flex flex-col">
                    <a href="{{ route('user.edit', ['id' => $d->id]) }}" class="rounded-full bg-teal-500 m-2 outline outline-2 outline-offset-2">Edit</a>
                    <a href="" class="rounded-full bg-red-500 m-2 outline outline-2 outline-offset-2">Hapus</a>
                    </td>
            </tr>        
            @endforeach
        </table>
    </div>
    <div class="flex justify-center">
        <a href="{{ route('user.create') }}" class="rounded-full place-self-center mt-5 mb-10 z-20 text-white bg-gradient-to-r from-indigo-500 via-purple-500  p-2 pr-3 pl-3 outline outline-2 outline-offset-2" >Tambah Data</a> 
    </div>
@endsection
