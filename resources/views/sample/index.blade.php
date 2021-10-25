@extends('template.app')

@section('judul','Sample')

@push('css')
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('adminlte3/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
@endpush

@section('content')
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-md-12 text-right">
                <a href="{{route('sample.create')}}" class="btn btn-primary">
                    <i class="fas fa-plus"></i> Tambah
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table id="main-table" class="table table-bordered table-striped">
                    <thead>
                    <tr class="text-center">
                        <th style="width: 1%;">No</th>
                        <th>Text</th>
                        <th style="width: 120px;">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key=>$item)
                    <tr>
                        <td>{{ $key+1 }}</td>
                        <td>{{ $item->data }}</td>
                        <td class="text-center">
                            <a href="{{ route('sample.edit',$item->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <button onclick="confirm_delete(`{{ route('sample.delete',$item->id) }}`)" type="button" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                    <tfoot>
                    <tr class="text-center">
                        <th>No</th>
                        <th>Text</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
@endsection

@push('javascript')
    <script src="{{ asset('adminlte3/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('adminlte3/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script>
        $(function () {
            $('#main-table').DataTable({
                "responsive": true,
                "lengthChange": false,
                "autoWidth": false
            });
        });
    </script>
@endpush

@if(Session::has('success'))
    @push('javascript')
        <script>
            $(function () {
                success_alert(`{{Session::get('success')}}`);
            });
        </script>
    @endpush
@endif

@if(Session::has('error'))
    @push('javascript')
        <script>
            $(function () {
                error_alert(`{{Session::get('error')}}`);
            });
        </script>
    @endpush
@endif

