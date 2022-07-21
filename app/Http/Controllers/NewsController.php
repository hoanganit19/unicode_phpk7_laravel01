<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\NewsRequest;
use Illuminate\Support\Facades\Validator;
use App\Rules\Uppercase;

class NewsController extends Controller
{
    public function index(){
        $title = 'Danh sách tin tức';

        return view('admin.news.lists', compact(
            'title'
        ));
    }

    public function add(Request $request){
        $title = 'Thêm tin tức';

        //echo trans('validation.url');
        return view('admin.news.add', compact(
            'title'
        ));
    }

    public function postAdd(Request $request){

//        $messages = [
//            'required' => ':attribute bắt buộc phải nhập',
//            'min' => ':attribute phải từ :min ký tự trở lên',
//            'max' => ':attribute không được lớn hơn :max ký tự'
//        ];

//        $messages = [
//            'title.required' => 'Tiêu đề bắt buộc phải nhập',
//            'title.min' => 'Tiêu đề phải từ :min ký tự trở lên',
//            'title.max' => 'Tiêu đề không vượt quá :max ký tự',
//            'content.required' => 'Nội dung bắt buộc phải nhập',
//            'email.required' => 'Email không được để trống',
//            'email.email' => 'Email không đúng định dạng',
//            'email.unique' => 'Email đã tồn tại trên hệ thống',
//            'age.required' => 'Tuổi bắt buộc phải nhập',
//            'age.integer' => 'Tuổi phải là số nguyên',
//            'phone.required' => 'Số điện thoại bắt buộc phải nhập',
//            'phone.regex' => 'Số điện thoại không hợp lệ',
//            'password.required' => 'Mật khẩu không được để trống',
//            'confirm_password.required' => 'Xác nhận mật không được để trống',
//            'confirm_password.same' => 'Xác nhận mật khẩu không khớp'
//            //field.rule => 'message'
//        ];

        $rules = [
            //'title' => 'required|min:5|max:255',
            'title' => ['required', 'min:5', 'max:255', function($attribute, $value, $fail){
                if ($value!==mb_strtoupper($value, 'UTF-8')){
                    $fail('Tiêu đề bắt buộc phải là chữ HOA');
                }
            }],
            'content' => 'required',
            //'email' => 'required|email|unique:news,email',
            'email' => ['required', 'email', 'unique:news,email', new Uppercase()],
            'age' => 'required|integer',
            'phone' => 'required|regex:/^0\d{9}$/',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'times.start_date' => 'required',
            'times.end_date' => 'required'
        ];

        $messages = [
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải từ :min ký tự trở lên',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'unique' => ':attribute đã tồn tại',
            'regex' => ':attribute không hợp lệ',
            'email' => ':attribute không hợp lệ',
            'same' => ':attribute không khớp',
            'integer' => ':attribute phải là số nguyên'
        ];

        $attributes = [
            'title' => 'Tiêu đề',
            'content' => 'Nội dung',
            'email' => 'Email',
            'age' => 'Tuổi',
            'phone' => 'Số điện thoại',
            'password' => 'Nật khẩu',
            'confirm_password' => 'Xác nhận mật khẩu',
            'times.start_date' => 'Thời gian bắt đầu',
            'times.end_date' => 'Thời gian kết thúc'
        ];

        /*
         * Cú pháp unique
         * unique:table,field => Áp dụng khi thêm mới
         * unique:tabe,field,id => Áp dụng khi sửa
         *
         * */

        //$request->validate($rules, $messages);

        //dd($request->all());

        $validator = Validator::make(
            $request->except('_token'),
            $rules,
            $messages,
            $attributes
        );

        //$validator->validate(); //Tự động xử lý giống như $request->validate()

        if ($validator->fails()){
            //return 'Không thành công';
            return back()->withErrors($validator)->withInput();
        }

        //Nếu validate thành công => chạy đoạn code bên dưới
    }
}
