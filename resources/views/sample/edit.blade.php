@extends('template.app')

@section('judul','Edit Sample')

@section('content')
    <div class="container-fluid">
        <form action="{{ route('sample.update',$item->id) }}" method="post">
            @csrf
            @method('PUT')
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
                        <input id="input-text-data" type="text" name="data" class="form-control @error('data') is_invalid @enderror" value="{{old('data',$item->data)}}" placeholder="Masukkan data">
                    </div>

                    <!-- Type Text -->
                    <div class="form-group">
                        <label for="input-text-{nama_kolom}">
                            {nama_label}
                            @error('{nama_kolom}')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <input id="input-text-{nama_kolom}" type="text" name="{nama_kolom}" class="form-control @error('{nama_kolom}') is_invalid @enderror" value="{{old('{nama_kolom}')}}" placeholder="Masukkan {nama_label}">
                    </div>

                    <!-- Type Number -->
                    <div class="form-group">
                        <label for="input-number-{nama_kolom}">
                            {nama_label}
                            @error('{nama_kolom}')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <input id="input-number-{nama_kolom}" type="number" name="{nama_kolom}" class="form-control @error('{nama_kolom}') is_invalid @enderror" value="{{old('{nama_kolom}')}}" placeholder="Masukkan {nama_label}">
                    </div>

                    <!-- Type Date -->
                    <div class="form-group">
                        <label for="input-date-{nama_kolom}">
                            {nama_label}
                            @error('{nama_kolom}')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <input id="input-date-{nama_kolom}" type="date" name="{nama_kolom}" class="form-control @error('{nama_kolom}') is_invalid @enderror" value="{{old('{nama_kolom}')}}" placeholder="Masukkan {nama_label}">
                    </div>

                    <!-- Type Password -->
                    <div class="form-group">
                        <label for="input-password-{nama_kolom}">
                            {nama_label}
                            @error('{nama_kolom}')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <input id="input-password-{nama_kolom}" type="password" name="{nama_kolom}" class="form-control @error('{nama_kolom}') is_invalid @enderror" value="{{old('{nama_kolom}')}}" placeholder="Masukkan {nama_label}">
                    </div>

                    <!-- Type Radio -->
                    <div class="form-group">
                        <label>{nama_kolom}</label>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="{value_opsi}" name="{nama_label}"> {nama_opsi}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" value="{value_opsi}" name="{nama_label}"> {nama_opsi}
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Type Checkbox -->
                    <div class="form-group">
                        <label>{nama_kolom}</label>
                        <div class="form-group">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="{value_opsi}" name="{nama_label}"> {nama_opsi}
                                </label>
                            </div>
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="checkbox" class="form-check-input" value="{value_opsi}" name="{nama_label}"> {nama_opsi}
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Type Textarea -->
                    <div class="form-group">
                        <label for="textarea-{nama_kolom}">
                            {nama_label}
                            @error('{nama_kolom}')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <textarea id="textarea-{nama_kolom}" name="{nama_kolom}" class="form-control @error('{nama_kolom}') is_invalid @enderror" placeholder="Masukkan {nama_label}">{{old('{nama_kolom}')}}</textarea>
                    </div>

                    <!-- Type Select -->
                    <div class="form-group">
                        <label for="select-{nama_kolom}">
                            {nama_label}
                            @error('{nama_kolom}')
                            <span class="text-warning">
                            * {{ $message }}
                        </span>
                            @enderror
                        </label>
                        <select id="select-{nama_kolom}" name="{nama_kolom}" class="form-control @error('{nama_kolom}') is_invalid @enderror">
                            <option value="{nama_value}">{nama_opsi}</option>
                            <option value="{nama_value}">{nama_opsi}</option>
                        </select>
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

