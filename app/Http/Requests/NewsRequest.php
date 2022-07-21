<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class NewsRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title' => 'required|min:5|max:255',
            //'title' => ['required', 'min:5', 'max:255'],
            'content' => 'required',
            'email' => 'required|email|unique:news,email',
            'age' => 'required|integer',
            'phone' => 'required|regex:/^0\d{9}$/',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ];
    }

    public function messages()
    {

       $messages = [
            'required' => ':attribute bắt buộc phải nhập',
            'min' => ':attribute phải từ :min ký tự trở lên',
            'max' => ':attribute không được lớn hơn :max ký tự',
            'unique' => ':attribute không đúng định dạng',
            'regex' => ':attribute không hợp lệ',
            'email' => ':attribute không hợp lệ',
            'same' => ':attribute không khớp',
            'integer' => ':attribute phải là số nguyên'
        ];

       return $messages;

//        return [
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
    }

    public function attributes()
    {
        return [
            'title' => 'Tiêu đề',
            'content' => 'Nội dung',
            'email' => 'Email',
            'age' => 'Tuổi',
            'phone' => 'Số điện thoại',
            'password' => 'Nật khẩu',
            'confirm_password' => 'Xác nhận mật khẩu'
        ];
    }
}
