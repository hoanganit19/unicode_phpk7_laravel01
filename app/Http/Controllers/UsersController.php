<?php

namespace App\Http\Controllers;

use Illuminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = $request->all('keyword');
//        echo '<pre>';
//        print_r($data);
//        echo '</pre>';
        //echo 'Keyword: '.$data['keyword'].'<br/>';

        //
        //return '<h1>Danh sách người dùng</h1>';

        //dd(request());
        //dd($request);

        $title = 'Danh sách người dùng';

        echo env('PATH_UPLOAD').'<br/>';

        echo config('uploads.path_upload.base').'<br/>';

        echo config('uploads.path_upload.images').'<br/>';

        echo config('uploads.max_size').'<br/>';

        return view(
            'admin.users.lists',
            compact(
                'title'
            )
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //dd($request->path());
//        if ($request->is('admin/users/create')){
//            echo 'Đây là trang thêm users';
//        }

        //dd($request->url());

        //dd($request->fullUrl());

        //dd($request->method());

        //dd($request->ip());

        //dd($request->server()['HTTP_HOST']);

        //dd($_SERVER);

        //dd($request->header('user-agent'));

        //dd($request->query());

        //dd($request->old());

        //echo $request->old('email');

        //echo asset('storage/documents/c2cebec899f58101499886f5aaebcc5c.png');

        //return 'Response string';

        $dataArr = [
            'id' => 1,
            'name' => 'Hoàng An',
            'age' => 30
        ];

//        $dataObj = new \stdClass();
//        $dataObj->id = 1;
//        $dataObj->name = 'Hoàng An';
//        $dataObj->age = 30;

        $dataObj = (object)$dataArr;


        //return $dataObj;

        $response = new Response('Học lập trình tại Unicode');
        //dd($response);
        //return $response;
//        return response('Học lập trình tại Unicode', 201, [
//            'api-key' => 'unicode'
//        ]);

        //return response('')->cookie('username', 'hoangan.web', 10);

        //return response()->view('admin.users.add', [], 201);

        //return response()->json($dataArr, 202, ['api-key' => '123']);

        //return redirect()->route('admin.users.edit', 3);

        //echo $request->old('email');

        //echo session('msg_type');

        //$pathImage = storage_path('app/documents/baa8dcf95473413374420b52002afbc1.png');

        //$pathImage = storage_path('app/public/documents/c2cebec899f58101499886f5aaebcc5c.png');

//        $favicon = public_path('favicon.ico');
//
//        return response()->download($favicon);

        $image = 'https://icdn.dantri.com.vn/zoom/1032_688/2022/07/16/screen-shot-2022-07-16-at-15-crop-1657961115824.jpeg';

//        return response()->streamDownload(function() use ($image){
//            echo file_get_contents($image);
//        }, basename($image));

        $data = session('data');
        $dataArr = json_decode($data, true);

        //dd($dataArr);

        $msgType = 'success';
        $msg = 'Đăng ký tài khoản thành công';

        return view('admin.users.add',
            compact('msgType', 'msg')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request->method());

        //dd($request->all('email')['email']);

        //dd($request->input('email'));

        //dd($request->email);

        //dd($request->like);

        //dd($request->all('like'));

        //dd($request->input('like'));

        //dd($request->has('email'));

        //dd($request->query());

//        if ($request->email){
//            echo 'Tồn tại';
//        }else{
//            echo 'Không tồn tại';
//        }

        //$request->flash();

        //dd($request->file('photo'));
        //dd($request->file('photo')->getClientOriginalName());
        //dd($request->photo);
        //dd($request->photo->extension());

//        $fileName = md5(uniqid()).'.'.$request->photo->extension();
//
//        $request->photo->storeAs('documents', $fileName, 'local');

       //dd($request->except(['_token', 'id'])); //lấy dữ liệu các field, trừ đi các field không muốn lấy

        //return redirect()->route('admin.users.create')->withInput();

        //return back()->withInput();

//        return back()->with([
//            'msg' => 'Xác thực thành công',
//            'msg_type' => 'success'
//        ]);

        $data = [
            'id' => 1,
            'name' => 'Hoàng an'
        ];

        if (!empty($data)){
            session([
                'data' => json_encode($data)
            ]);
        }

//        return redirect()->route('admin.users.create')->withCookie(
//            cookie('email', 'hoangan.web@gmail.com')
//        );

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, Request $request)
    {
        //
        //echo $request->cookie('username');
        //echo Cookie::get('username');
        $content = '<p>Xin chào Laravel, <b>khoá học</b> lập trình PHP</p>';

        $title = 'Khoá học Laravel';

        $users = [
            'Item 1',
            'Item 2',
            'Item 3'
        ];

        //$users = '';

        $posts = [
            [
                'id' => 1,
                'title' => 'Title 1'
            ],

            [
                'id' => 2,
                'title' => 'Title 2'
            ],

            [
                'id' => 3,
                'title' => 'Title 3'
            ]
        ];

        return view('admin.users.edit', compact(
            'id',
            'content',
            'title',
            'users',
            'posts'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
