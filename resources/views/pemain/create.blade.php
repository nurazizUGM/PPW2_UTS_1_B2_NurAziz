@extends('layout')

@section('content')
    <h1>Tambah Pemain</h1>
    <div class="form">
        <form action="{{ route('pemain.store') }}" method="post">
            @csrf
            @method('POST')
            <div class="mb-3 form-group">
                <label for="nama_pemain" class="form-label">Nama Pemain: </label>
                <input class="form-control" type="text" name="nama_pemain" id="nama_pemain">
            </div>
            <div class="mb-3 form-group">
                <label for="no_punggung">No. Punggung: </label>
                <input class="form-control" type="number" name="no_punggung" id="no_punggung">
            </div>
            <div class="mb-3 form-group">
                <label for="posisi" class="form-label">Posisi: </label>
                <select class="form form-select" name="posisi" id="posisi">
                    @foreach ($posisi as $p)
                        <option value="{{ $p }}">{{ $p }}</option>
                    @endforeach
                </select>
            </div>
            <div>
                <a class="btn btn-danger" href="{{ \URL::previous() }}">Batal</a>
                <input class="btn btn-primary" type="submit" value="Simpan">
            </div>
        </form>
    </div>
    <script>
        @if (session('error'))
            alert("{{ session('error') }}")
        @endif
    </script>
@endsection
