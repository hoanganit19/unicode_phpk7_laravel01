@extends('layouts.admin')

@section('title', $title??'Trang quản trị')

@section('content')

    <h2>{{$title ?? ''}}</h2>

    <form action="" method="post" class="news-add">
        <div class="msg"></div>
        <div class="mb-3">
            <label for="">Tiêu đề</label>
            <input type="text" name="title" class="form-control" placeholder="Tiêu đề..." value="{{old('title')}}"/>
            <span class="text-danger error error-title"></span>
        </div>

        <div class="mb-3">
            <label for="">Email</label>
            <input type="text" name="email" class="form-control" placeholder="Email..." value="{{old('email')}}"/>
            <span class="text-danger error error-email"></span>
        </div>

        <div class="mb-3">
            <label for="">Tuổi</label>
            <input type="text" name="age" class="form-control" placeholder="Tuổi..." value="{{old('age')}}"/>
            <span class="text-danger error error-age"></span>
        </div>

        <div class="mb-3">
            <label for="">Số điện thoại</label>
            <input type="text" name="phone" class="form-control" placeholder="Điện thoại..." value="{{old('phone')}}"/>
            <span class="text-danger error error-phone"></span>
        </div>

        <div class="mb-3">
            <label for="">Mật khẩu</label>
            <input type="password" name="password" class="form-control" placeholder="Mật khẩu..." value=""/>
            <span class="text-danger error error-password"></span>
        </div>

        <div class="mb-3">
            <label for="">Nhập lại mật khẩu</label>
            <input type="password" name="confirm_password" class="form-control" placeholder="Nhập lại mật khẩu..." value=""/>
            <span class="text-danger error error-confirm_password"></span>
        </div>

        <div class="mb-3">
            <label for="">Nội dung</label>
            <textarea class="form-control" name="content" placeholder="Nội dung">{{old('content')}}</textarea>
            <span class="text-danger error error-content"></span>
        </div>

{{--        <div class="mb-3">--}}
{{--            <label for="">Thời gian</label>--}}
{{--            <input type="text" name="times[start_date]" class="form-control" placeholder="Bắt đầu..." value="{{old('times.start_date')}}"/>--}}

{{--            <input type="text" name="times[end_date]" class="form-control" placeholder="Kết thúc..." value="{{old('times.end_date')}}"/>--}}

{{--        </div>--}}

        <button type="submit" class="btn btn-primary">Thêm mới</button>

        @csrf
    </form>

@endsection

@section('js')
    <script type="text/javascript">
        const formAdd = document.querySelector('.news-add');
        formAdd.addEventListener('submit', (e) => {
            e.preventDefault();

            let title = e.target.querySelector('[name="title"]').value;
            let email = e.target.querySelector('[name="email"]').value;
            let age = e.target.querySelector('[name="age"]').value;
            let phone = e.target.querySelector('[name="phone"]').value;
            let password = e.target.querySelector('[name="password"]').value;
            let confirm_password = e.target.querySelector('[name="confirm_password"]').value;
            let content = e.target.querySelector('[name="content"]').value;

            const data = {
                title: title,
                email: email,
                age: age,
                phone: phone,
                password: password,
                confirm_password: confirm_password,
                content: content,
                _token: `{{csrf_token()}}`
            }

            let url = `{{route('admin.news.post-add')}}`;

            fetch(url, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify(data)
            })
                .then(response => response.json())
                .then(response => {

                    //Reset lỗi khi submit
                    let errorMsg = document.querySelectorAll('.error');
                    errorMsg.forEach(errorItem => {
                        errorItem.innerText = '';
                    })

                    const msg = document.querySelector('.msg');

                    msg.innerText = '';

                    if (response.status==='errors'){

                        const errors = response.errors;

                        const fields = Object.keys(errors);

                        msg.innerHTML = `<div class="alert alert-danger text-center">Vui lòng kiểm tra các lỗi bên dưới</div>`;

                        fields.forEach(field => {
                            let errorArr = errors[field];

                            let errorObj = document.querySelector(`.error-${field}`);

                            errorObj.innerText = errorArr[0];
                        })

                    }else{
                        alert('Thêm dữ liệu vào DB');
                    }

                });


        })
    </script>
@endsection
