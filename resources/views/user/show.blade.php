@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body">
        @empty($user)
            <div class="alert alert-danger alert-dismissible">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                Data yang Anda cari tidak ditemukan.
            </div>
        @else
            <table class="table table-bordered table-striped table-hover table-sm">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->user_id }}</td>
                </tr>
                <tr>
                    <th>Level</th>
                    <td>{{ $user->level->level_nama }}</td>
                </tr>
                <tr>
                    <th>Username</th>
                    <td>{{ $user->username }}</td>
                </tr>
                <tr>
                    <th>Nama</th>
                    <td>{{ $user->nama }}</td>
                </tr>
                <tr>
                    <th>Password</th>
                    <td>********</td>
                </tr>
                <tr>
                    <th>Foto Profil</th>
                    <td>
                        @if($user->profile_picture)
                            <img src="{{ asset('storage/profile_pictures/'.$user->profile_picture) }}" 
                                 class="img-thumbnail rounded-circle" 
                                 width="150" 
                                 height="150">
                        @else
                            <img src="{{ asset('images/default-profile.png') }}" 
                                 class="img-thumbnail rounded-circle" 
                                 width="150" 
                                 height="150">
                        @endif
                    </td>
                </tr>
            </table>
        @endempty
        <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
    </div>
</div>
@endsection

@push('css')
<style>
    .table th {
        width: 30%;
    }
    .img-thumbnail {
        object-fit: cover;
    }
</style>
@endpush

@push('js')
@endpush