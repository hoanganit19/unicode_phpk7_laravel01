@extends('layouts.admin')

@section('content')
    <h3 class="text-center">{{$exception->getMessage()}}</h3>
    <h3 class="text-center">Bạn không có quyền truy cập</h3>
@endsection
