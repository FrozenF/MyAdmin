@extends('template.app')

@section('judul','Builder CRUD')

@section('content')
    <div id="vue-app">
        <div  class="container-fluid">
            <form method="post" action="{{route('crud.store')}}">
                @csrf
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="input-title">Judul</label>
                            <input id="input-title" name="title" type="text" class="form-control" placeholder="Contoh : Master User">
                        </div>
                        <div class="form-group">
                            <label for="input-url">Prefix URL</label>
                            <input id="input-url" name="prefix_url" type="text" class="form-control" placeholder="Contoh : /utility">
                        </div>
                        <div class="form-group">
                            <label for="input-model">Model</label>
                            <input id="input-model" name="model" type="text" class="form-control" placeholder="Contoh : App\Models\User">
                        </div>
                        <div class="form-group">
                            <label for="primary-key">Primary Key</label>
                            <input id="primary-key" name="primary_key" type="text" class="form-control" placeholder="Contoh : id">
                        </div>
                        <div class="form-group">
                            <label for="table-column">Kolom Input</label>
                            <table id="table-column" class="table table-bordered table-striped">
                                <thead>
                                <tr>
                                    <th class="col-1">No</th>
                                    <th class="col-2">Kolom Database</th>
                                    <th class="col-3">Label</th>
                                    <th class="col-3">Tipe</th>
                                    <th class="col-2">Opsi</th>
                                    <th class="col-1">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr v-for="(item,index) in detail" id="sample" >
                                    <td>@{{ index+1 }}</td>
                                    <td>
                                        <input :name="'form['+index+'][nama_kolom]'"  class="form-control" type="text" placeholder=" ">
                                    </td>
                                    <td>
                                        <input :name="'form['+index+'][nama_label]'" class="form-control" type="text" placeholder="">
                                    </td>
                                    <td>
                                        <select :name="'form['+index+'][tipe]'" class="form-control">
                                            <option v-for="type in types" :value="type">@{{ type }}</option>
                                        </select>
                                    </td>
                                    <td>

                                    </td>
                                    <td>
                                        <button type="button" v-on:click="removeItem(item);" class="btn btn-danger">
                                            <i class="fas fa-trash-alt"></i>
                                        </button>
                                    </td>
                                </tr>
                                </tbody>
                                <tfoot>
                                <tr>
                                    <th colspan="5">
                                        <button type="button" v-on:click="addItem();" class="btn btn-success">
                                            <i class="fa fa-plus"></i> Tambah Field
                                        </button>
                                    </th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>
                        <div class="form-group text-right">
                            <button class="btn btn-primary">
                                <i class="fas fa-save"></i> Simpan
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@push('javascript')
    <!-- Vue -->
    <script src="{{ asset('vue/vue.js') }}"></script>
    <script>
        let app = new Vue({
            el: '#vue-app',
            data : {
                counter : 0,
                types : ['text','number','password','date','radio','select','textarea'],
                detail: []
            },
            methods : {
                addItem(){
                    this.detail.push(this.counter++)
                },
                removeItem(num){
                    this.detail.splice(this.detail.indexOf(num),1);
                },
            }
        });
    </script>
@endpush
