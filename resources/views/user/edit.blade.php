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
            <a href="{{ url('user') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
        @else
            <form method="POST" action="{{ url('/user/'.$user->user_id) }}" class="form-horizontal" enctype="multipart/form-data">
                @csrf
                {!! method_field('PUT') !!}

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Level</label>
                    <div class="col-11">
                        <select class="form-control" id="level_id" name="level_id" required>
                            <option value="">- Pilih Level -</option>
                            @foreach($level as $item)
                                <option value="{{ $item->level_id }}" @if($item->level_id == $user->level_id) selected @endif>
                                    {{ $item->level_nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('level_id')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Username</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="username" name="username"
                               value="{{ old('username', $user->username) }}" required>
                        @error('username')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Nama</label>
                    <div class="col-11">
                        <input type="text" class="form-control" id="nama" name="nama"
                               value="{{ old('nama', $user->nama) }}" required>
                        @error('nama')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Password</label>
                    <div class="col-11">
                        <input type="password" class="form-control" id="password" name="password">
                        @error('password')
                            <small class="form-text text-danger">{{ $message }}</small>
                        @else
                            <small class="form-text text-muted">Abaikan (jangan diisi) jika tidak ingin mengganti password user.</small>
                        @enderror
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-1 control-label col-form-label">Foto Profil</label>
                    <div class="col-11">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('profile_picture') is-invalid @enderror" 
                                   id="profile_picture" name="profile_picture" accept="image/jpeg,image/png,image/jpg,image/gif">
                            <label class="custom-file-label" for="profile_picture">Pilih file...</label>
                            @error('profile_picture')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                        <small class="form-text text-muted">Maksimal 2MB (JPEG, PNG, JPG, GIF)</small>
                        
                        <div class="mt-3 text-center">
                            @if($user->profile_picture)
                                <img src="{{ asset('storage/profile_pictures/'.$user->profile_picture) }}" 
                                     class="img-thumbnail rounded-circle" 
                                     width="150" 
                                     height="150"
                                     id="profile-picture-preview">
                            @else
                                <img src="{{ asset('images/default-profile.png') }}" 
                                     class="img-thumbnail rounded-circle" 
                                     width="150" 
                                     height="150"
                                     id="profile-picture-preview">
                            @endif
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <div class="col-11 offset-1">
                        <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                        <a class="btn btn-sm btn-default ml-1" href="{{ url('user') }}">Kembali</a>
                    </div>
                </div>
            </form>
        @endempty
    </div>
</div>
@endsection

@push('css')
<style>
    .custom-file-label::after {
        content: "Browse";
    }
    #profile-picture-preview {
        object-fit: cover;
    }
</style>
@endpush

@push('js')
<script>
    // Show file name when selected
    $(document).ready(function() {
        $('.custom-file-input').on('change', function() {
            let fileName = $(this).val().split('\\').pop();
            $(this).next('.custom-file-label').addClass("selected").html(fileName);
            
            // Preview image
            if (this.files && this.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#profile-picture-preview').attr('src', e.target.result);
                }
                reader.readAsDataURL(this.files[0]);
            }
        });
    });
</script>
@endpush