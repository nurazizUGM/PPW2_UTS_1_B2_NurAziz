@extends('layout')
@section('content')
    <div class="d-flex justify-content-between align-items-center">
        <h1>Detail Pemain</h1>
        <a class="btn btn-danger" href="{{ \URL::previous() }}">Kembali</a>
    </div>
    <table class="table table-bordered">
        <tr>
            <th>Nama</th>
            <td>{{ $pemain->nama_pemain }}</td>
        </tr>
        <tr>
            <th>No. Punggung</th>
            <td>{{ $pemain->no_punggung }}</td>
        </tr>
        <tr>
            <th>Posisi</th>
            <td>{{ $pemain->posisi }}</td>
        </tr>
    </table>
@endsection
