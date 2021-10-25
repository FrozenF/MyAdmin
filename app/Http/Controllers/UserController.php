<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User as MainModel;

class UserController extends Controller
{
    public function index()
    {
        // Get data From Database
        $data = MainModel::get();

        return view('user.index',compact('data'));
    }

    public function create()
    {
        return view('user.add');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        $model = new MainModel();

        $model->fill($data);
        $model->password = bcrypt('123456');
        $result = $model->save();

        if ($result) {
            return redirect(route('user.index'))->with('success','Berhasil Menambahkan Data');
        } else {
            return redirect(route('user.index'))->with('error','Gagal Menambahkan Data');
        }
    }

    public function edit($id, Request $request)
    {
        // Get Data by Id From database
        $item = MainModel::findOrFail($id);

        return view('user.edit',compact('item'));
    }

    public function update($id, Request $request)
    {
        $data = $request->all();

        $model = MainModel::findOrFail($id);

        $model->fill($data);
        $result = $model->save();

        if ($result) {
            return redirect(route('user.index'))->with('success','Berhasil Merubah Data');
        } else {
            return redirect(route('user.index'))->with('error','Gagal Merubah Data');
        }
    }

    public function delete($id)
    {
        $model = MainModel::findOrFail($id);
        $result = $model->delete();

        return response()->json($result);
    }
}
