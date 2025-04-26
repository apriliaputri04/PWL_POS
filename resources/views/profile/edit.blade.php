@extends('layouts.template')

@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">Edit Profil</h3>
    </div>
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')


            <div class="form-group row">
                <label class="col-sm-2 col-form-label">Foto Profil</label>
                <div class="col-sm-10">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="profile_picture" name="profile_picture">
                        <label class="custom-file-label" for="profile_picture">Pilih file...</label>
                    </div>
                    <small class="form-text text-muted">Format: JPEG, PNG, JPG, GIF (Maks. 2MB)</small>
                    
                    <div class="mt-3 text-center">
                        <img src="{{ $user->profile_picture ? asset('storage/profile_pictures/'.$user->profile_picture) : asset('images/default-profile.png') }}" 
                             class="img-thumbnail rounded-circle" 
                             width="150" 
                             height="150"
                             id="profile-picture-preview">
                    </div>
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-10 offset-sm-2">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('css')
<style>
    .custom-file-label::after {
        content: "Pilih";
    }
    #profile-picture-preview {
        object-fit: cover;
    }
</style>
@endpush

@push('js')
<script>
    // Menampilkan nama file yang dipilih
    document.querySelector('.custom-file-input').addEventListener('change', function(e) {
        var fileName = document.getElementById("profile_picture").files[0].name;
        var nextSibling = e.target.nextElementSibling;
        nextSibling.innerText = fileName;
        
        // Preview gambar
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('profile-picture-preview').setAttribute('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
</script>
@endpush
