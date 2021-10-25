@extends('template.app')

@section('judul','Tambah User')

@section('content')
<div class="container-fluid">
    <form action="{{ route('user.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">

                <!-- Type Text -->
<div class="form-group">
    <label for="input-text-nama_lengkap">
        Nama lengkap
        @error('nama_lengkap')
        <span class="text-warning">* {{ $message }} </span>
        @enderror
    </label>
    <input id="input-text-nama_lengkap" type="text" name="nama_lengkap" class="form-control @error('nama_lengkap') is_invalid @enderror" value="{{old('nama_lengkap')}}" placeholder="Masukkan Nama lengkap">
</div>
<!-- Type Text -->
<div class="form-group">
    <label for="input-text-username">
        Username
        @error('username')
        <span class="text-warning">* {{ $message }} </span>
        @enderror
    </label>
    <input id="input-text-username" type="text" name="username" class="form-control @error('username') is_invalid @enderror" value="{{old('username')}}" placeholder="Masukkan Username">
</div>


                <div class="form-group text-right">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save"></i> Simpan
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection

