<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    public function index(){

        echo route('home').'<br/>';
        echo route('products').'<br/>';
        echo route('admin.index').'<br/>';
        echo route('admin.posts.index').'<br/>';
        echo route('admin.posts.add').'<br/>';
        echo route('admin.posts.edit', 1).'<br/>'; //có 1 tham số
        echo route('admin.posts.detail', ['slug'=>'bai-viet-a', 1]).'<br/>'; //Có nhiều tham số

        return '<h1>Danh sách bài viết</h1>';

    }

    public function add(){

        return '<h1>Thêm bài viết</h1>';

    }

    public function postAdd(){

    }

    public function edit($id){
        return '<h1>Sửa bài viết '.$id.'</h1>';
    }

    public function putEdit(){

    }

    public function delete(){

    }

    public function report($id = 0){
        return '<h1>Report '.$id.'</h1>';
    }

    public function detail($slug, $id){
        echo 'Slug = '.$slug.'<br/>';
        echo 'id = '.$id.'<br/>';
    }
}
