@extends('layouts.admin')

@section('title', $title??'Trang quản trị')

@section('content')

    <h2>{{$title ?? ''}}</h2>

    @if ($errors->any())
        {{--        <x-alert type-alert="danger" align="center" message="Vui lòng kiểm tra các lỗi bên dưới" />--}}
        @foreach ($errors->all() as $error)

            <x-alert type-alert="danger" :message="$error" />

        @endforeach
    @endif

    <form action="" method="post">
        <div class="mb-3">
            <label for="">Tiêu đề</label>
            <input type="text" name="title" class="form-control" placeholder="Tiêu đề..." value="{{old('title')}}"/>
            @error('title')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." value="{{old('email')}}"/>
            @error('email')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Tuổi</label>
            <input type="text" name="age" class="form-control" placeholder="Tuổi..." value="{{old('age')}}"/>
            @error('age')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Điện thoại..." value="{{old('phone')}}"/>
            @error('phone')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." value=""/>
            @error('password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..." value=""/>
            @error('confirm_password')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Nội dung</label>
            <textarea class="form-control" name="content" placeholder="Nội dung">{{old('content')}}</textarea>
            @error('content')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="">Thời gian</label>
            <input type="text" name="times[start_date]" class="form-control" placeholder="Bắt đầu..." value="{{old('times.start_date')}}"/>
            @error('times.start_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
            <input type="text" name="times[end_date]" class="form-control" placeholder="Kết thúc..." value="{{old('times.end_date')}}"/>
            @error('times.end_date')
            <span class="text-danger">{{$message}}</span>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Thêm mới</button>

        @csrf
    </form>

@endsection
