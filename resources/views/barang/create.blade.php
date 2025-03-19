@extends('layouts.template')
 
 @section('title', 'Tambah Supplier')
 
 @section('content')
     <div class="card card-outline card-primary">
         <div class="card-header">
             <h3 class="card-title">Tambah Supplier Baru</h3>
         </div>
         <div class="card-body">
             <form method="POST" action="{{ route('suppliers.store') }}" class="form-horizontal">
                 @csrf
 
                 <!-- Nama Supplier -->
                 <div class="form-group row">
                     <label class="col-md-2 control-label col-form-label">Nama Supplier</label>
                     <div class="col-md-10">
                         <input type="text" class="form-control" id="nama" name="nama"
                                value="{{ old('nama') }}" required>
                         @error('nama')
                             <small class="form-text text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
 
                 <!-- Alamat Supplier -->
                 <div class="form-group row">
                     <label class="col-md-2 control-label col-form-label">Alamat</label>
                     <div class="col-md-10">
                         <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ old('alamat') }}</textarea>
                         @error('alamat')
                             <small class="form-text text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
 
                 <!-- Telepon Supplier -->
                 <div class="form-group row">
                     <label class="col-md-2 control-label col-form-label">Telepon</label>
                     <div class="col-md-10">
                         <input type="text" class="form-control" id="telepon" name="telepon"
                                value="{{ old('telepon') }}" required>
                         @error('telepon')
                             <small class="form-text text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
 
                 <!-- Email Supplier -->
                 <div class="form-group row">
                     <label class="col-md-2 control-label col-form-label">Email</label>
                     <div class="col-md-10">
                         <input type="email" class="form-control" id="email" name="email"
                                value="{{ old('email') }}">
                         @error('email')
                             <small class="form-text text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
 
                 <!-- Status Supplier -->
                 <div class="form-group row">
                     <label class="col-md-2 control-label col-form-label">Status</label>
                     <div class="col-md-10">
                         <select class="form-control" id="status" name="status" required>
                             <option value="1" {{ old('status') == '1' ? 'selected' : '' }}>Aktif</option>
                             <option value="0" {{ old('status') == '0' ? 'selected' : '' }}>Tidak Aktif</option>
                         </select>
                         @error('status')
                             <small class="form-text text-danger">{{ $message }}</small>
                         @enderror
                     </div>
                 </div>
 
                 <!-- Tombol Submit -->
                 <div class="form-group row">
                     <div class="col-md-10 offset-md-2">
                         <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                         <a class="btn btn-sm btn-default ml-1" href="{{ route('suppliers.index') }}">Kembali</a>
                     </div>
                 </div>
             </form>
         </div>
     </div>
 @endsection