@extends('layouts.admin')

@section('title', $title??'Trang quản trị')

@section('content')

    <h1>{{$title ?? ''}}</h1>

{{--    {{getMessage('Đăng ký tài khoản thất bại', 'danger')}}--}}
    <x-alert type-alert="{{$msgType}}" :message="$msg" align="right"/>

{{--    <x-client-alert />--}}

    <x-admin.alert />

    <x-admin-form.button-large />

    @include('admin.users.parts.form')

@endsection

@section('sidebar')

    <h3>Add Sidebar</h3>

    @parent

@endsection

@section('css')
    <style type="text/css">
        .logo-text{
            color: red;
        }
    </style>
@endsection
