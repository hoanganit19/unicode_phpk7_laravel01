<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index(){
        return '<h1>Danh sách sản phẩm</h1>';
    }

    public function add(Request $request){

        if ($request->name){
            echo $request->name;
        }

        return view('products.add');
    }

    public function postAdd(Request $request){
        //dd() => Hàm debug trong laravel
        return $request->name;
    }

    public function putAdd(Request $request){
        dd($request->name);
    }

    public function delete(Request $request){
        dd($request->name);
    }

    public function addPatch(Request $request){
        dd($request);
    }

    public function addOptions(Request $request){
        dd($request);
    }
}
