@extends('layout.main')
@section('content')
    <div class ="text-container">
        <table>
            <tr>
                <td>No</td>
                <td>Photo</td>
                <td>Nama</td>
                <td>Email</td>
                <td>Action</td>
            </tr>

            @foreach ($data as $d)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td><img src="{{ asset('storage/photo-user/'.$d->image) }}" alt="" width="50"></td>
                <td>{{ $d->name }}</td>
                <td>{{ $d->email }}</td>
                <td class="flex flex-col">
                    <a href="{{ route('admin.user.edit', ['id' => $d->id]) }}" class="rounded-full bg-teal-500 m-2 outline outline-2 outline-offset-2">Edit</a>
                    <!-- Button trigger modal -->
         <!-- Button to open modal -->
         <button type="button" class="rounded-full bg-red-500 m-2 outline outline-2 outline-offset-2" onclick="openModal('deleteModal{{ $d->id }}')">
            Delete
        </button>

        <!-- Modal -->
        <div id="deleteModal{{ $d->id }}" class="modal hidden fixed w-full h-full top-0 left-0 flex items-center justify-center">
            <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50 "></div>
            <div class="max-h-[calc(100vh - 5e)] h-fit max-w-lg scale-90 overflow-y-auto overscroll-y-contain rounded-md bg-white p-6 text-black shadow-2xk transition z-50">
                <div class="modal-content py-4 text-left px-6">
                    <!-- Title -->
                    <div class="flex justify-between items-center pb-3">
                        <button class="modal-close" onclick="closeModal('deleteModal{{ $d->id }}')">&times;</button>
                    </div>
                    <!-- Body -->
                    <p class="text-black">Apakah kamu yakin ingin menghapus user {{ $d->name }}</p>
                    <!-- Footer -->
                    <div class="flex justify-between pl-3 pr-3 p-5">
                        <form action="{{ route('admin.user.delete', $d->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="rounded-full bg-green-500 p-2 pl-5 pr-5 outline outline-2 outline-offset-2">Delete</button>
                        </form>
                        <button class="rounded-full bg-slate-500 p-2 pl-5 pr-5 outline outline-2 outline-offset-2" onclick="closeModal('deleteModal{{ $d->id }}')">Close</button>
                    </div>
                    
                </div>
            </div>
        </div>

                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <div class="flex justify-center">
        <a href="{{ route('admin.user.create') }}" class="rounded-full place-self-center mt-5 mb-10 z-20 text-white bg-gradient-to-r from-indigo-500 via-purple-500  p-2 pr-3 pl-3 outline outline-2 outline-offset-2" >Tambah Data</a> 
    </div>
    <script>
        function openModal(modalId) {
    document.getElementById(modalId).classList.remove('hidden');
}

function closeModal(modalId) {
    document.getElementById(modalId).classList.add('hidden');
}
    </script>
@endsection