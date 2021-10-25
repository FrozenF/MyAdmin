<?php

namespace App\Http\Controllers\Builder;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;

class ControllerCrud extends Controller
{
    public function index()
    {
        return view('builder.crud.index');
    }

    public function store(Request $request)
    {
        $name = $request->title;
        $prefix_url = $request->prefix_url;
        $model = $request->model;
        $primary_key = $request->primary_key;
        $form = json_encode($request->form);

        Artisan::call('my-build:route',[
            "name" => $name,
            "--prefix" => $prefix_url
        ]);

        $output1 = Artisan::output();

        Artisan::call('my-build:controller',[
           "name" => $name,
           "--model" => $model
        ]);

        $output2 = Artisan::output();

        Artisan::call('my-build:view-index',[
            "name" => $name,
            "--column" => $form,
            "--pk" => $primary_key
        ]);

        $output3 = Artisan::output();

        Artisan::call('my-build:view-add',[
            "name" => $name,
            "--column" => $form
        ]);

        $output4 = Artisan::output();

        Artisan::call('my-build:view-edit',[
            "name" => $name,
            "--column" => $form,
            "--pk" => $primary_key
        ]);

        $output5 = Artisan::output();

        echo $output1.'<br>';
        echo $output2.'<br>';
        echo $output3.'<br>';
        echo $output4.'<br>';
        echo $output5.'<br>';


    }
}
