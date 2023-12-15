@extends('layouts.app')
@section('title', 'Admin | Detail Pelanggan')

@section('content')
<div class="row mt-3 mb-3">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-header">
                <h4>Detail Pelanggan</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                    <tr>
                        <th>ID</th>
                        <td>{{ $p->id }}</td>
                    </tr>
                    <tr>
                        <th>GOLONGAN</th>
                        <td>{{ $p->golongan->nama }}</td>
                    </tr>
                    <tr>
                        <th>NO</th>
                        <td>{{ $p->no }}</td>
                    </tr>
                    <tr>
                        <th>NAMA</th>
                        <td>{{ $p->nama }}</td>
                    </tr>
                    <tr>
                        <th>HP</th>
                        <td>{{ $p->hp }}</td>
                    </tr>
                    <tr>
                        <th>KTP</th>
                        <td><a href="{{ url('storage/ktp/', $p->ktp) }}" target="_blank">{{ $p->ktp }}</a></td>
                    </tr>
                    <tr>
                        <th>SERI</th>
                        <td>{{ $p->seri }}</td>
                    </tr>
                    <tr>
                        <th>METERAN</th>
                        <td>{{ $p->meteran }}</td>
                    </tr>
                    <tr>
                        <th>AKTIF</th>
                        <td>{{ $p->aktif }}</td>
                    </tr>
                    <tr>
                        <th>USER</th>
                        <td>{{ $p->user->name }}</td>
                    </tr>
                    <tr>
                        <th>ALAMAT</th>
                        <td>{{ $p->alamat }}</td>
                    </tr>
                </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
