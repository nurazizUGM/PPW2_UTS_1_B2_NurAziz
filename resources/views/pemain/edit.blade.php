@extends('layout')

@section('content')
    <h1>Edit Pemain</h1>
    <div class="form">
        <form action="{{ route('pemain.update', $pemain->id) }}" method="post">
            @csrf
            @method('PATCH')
            <div class="mb-3 form-group">
                <label for="nama_pemain" class="form-label">Nama Pemain: </label>
                <input class="form-control" type="text" name="nama_pemain" id="nama_pemain"
                    value="{{ $pemain->nama_pemain }}">
            </div>
            <div class="mb-3 form-group">
                <label for="no_punggung">No. Punggung: </label>
                <input class="form-control" type="number" name="no_punggung" id="no_punggung"
                    value="{{ $pemain->no_punggung }}">
            </div>
            <div class="mb-3 form-group">
                <label for="posisi" class="form-label">Posisi: </label>
                <select class="form form-select" name="posisi" id="posisi">
                    @foreach ($posisi as $p)
                        <option value="{{ $p }}" @if ($p == $pemain->posisi) selected @endif>
                            {{ $p }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div>
                <a class="btn btn-danger" href="{{ \URL::previous() }}">Batal</a>
                <input class="btn btn-primary" type="submit" value="Simpan">
            </div>
        </form>
    </div>

    @if (session('error') != null)
        <script>
            alert('{{ session('error') }}')
        </script>
    @endif
@endsection
