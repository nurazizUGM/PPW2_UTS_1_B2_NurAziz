@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Daftar Pemain</h1>
        <a class="btn btn-primary" href="{{ route('pemain.create') }}">Tambah Pemain</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>No.</th>
            <th>Nama Pemain</th>
            <th>No. Punggung</th>
            <th>Posisi</th>
            <th>Aksi</th>
        </tr>
        @foreach ($daftar_pemain as $pemain)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $pemain->nama_pemain }}</td>
                <td>{{ $pemain->no_punggung }}</td>
                <td>{{ $pemain->posisi }}</td>
                <td>
                    <div class="d-flex">
                        <a class="btn btn-primary me-2" href="{{ route('pemain.show', $pemain->id) }}">Detail</a>
                        <a class="btn btn-secondary me-2" href="{{ route('pemain.edit', $pemain->id) }}">Edit</a>
                        <form action="{{ route('pemain.destroy', $pemain->id) }}" method="POST"
                            onsubmit="return confirm('Yakin ingin menghapus?')">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    <script>
        @if (session('error'))
            alert("{{ session('error') }}")
        @elseif (session('success'))
            alert("{{ session('success') }}")
        @endif
    </script>
@endsection
