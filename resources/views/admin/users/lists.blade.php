@extends('layouts.admin')

@section('title', $title??'Trang quản trị')

@section('content')

<h1>{{$title ?? ''}}</h1>

<button type="button" class="btn btn-primary">
    Thay đổi màu
</button>

    @file('local')
        <h4>Bạn đang sử dụng nội bộ</h4>
    @elsefile ('public')
        <h4>Bạn đang sử dụng public</h4>
    @else
        <h4>Bạn đang sử dụng S3</h4>
    @endfile

    @welcome('Welcome to Unicode')

    <hr>

    @now

@endsection

@section('sidebar')

    @parent

    <h3>Sidebar Lists</h3>

    <h3>Sidebar Navigation</h3>


    @push('js')
        <script>
            console.log('JS 03');
        </script>
    @endpush

@endsection

@section('js')

    <script>
        let btn = document.querySelector('.btn');
        btn.addEventListener('click', function(){
            this.classList.remove('btn-primary');
            this.classList.add('btn-danger');
        })
    </script>

@endsection

@push('js')
    <script>
        console.log('JS 01');
    </script>
@endpush

@push('js')
    <script>
        console.log('JS 02');
    </script>
@endpush

@prepend('js')
    <script>
        console.log('JS 04');
    </script>
@endprepend

@prepend('js')
    <script>
        console.log('JS 05');
    </script>
@endprepend
