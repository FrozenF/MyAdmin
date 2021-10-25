@extends('template.app')

@section('judul','Tambah Sample')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('sample.store') }}" method="post">
            @csrf
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="input-text-{nama_kolom}">
                            Data
                            @error('data')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <input id="input-text-data" type="text" name="data" class="form-control @error('data') is_invalid @enderror" value="{{old('data')}}" placeholder="Masukkan data">
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

