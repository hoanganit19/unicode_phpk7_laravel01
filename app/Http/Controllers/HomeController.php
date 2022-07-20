<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return '<h1 style="text-align: center; color: red;">TRANG CHỦ UNICODE</h1>';
    }
}
