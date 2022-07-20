@extends('layouts.admin')
@section('title', $title??'Trang quản trị')

@section('content')
<h1>Sửa người dùng: {{ $id }}</h1>
<h2>Keyword: {{ request()->keyword }}</h2>
<h2>Title: {{ $title ?? false }}</h2>
<h2>{{'Đây là chuỗi hiển thị'}}</h2>
<div>
    {!! $content !!}
</div>

{{--@for ($i = 1; $i<=5; $i++)--}}
{{--<p>Item: {{$i}}</p>--}}
{{--@endfor--}}

{{--@foreach ($users as $user)--}}
{{--<p>--}}
{{--    User: {{$user}}--}}
{{--</p>--}}
{{--@endforeach--}}

@if (!empty($users))

    @forelse($users as $user)
        <p>
            User: {{$user}}
        </p>
    @empty
        <p>Không có user nào</p>
    @endforelse

@elseif (isset($users) && is_string($users))
    <p>Biến không được là chuỗi</p>
@else
    <p>Biến không tồn tại</p>
@endif

<hr>

@php
$count = 0;
@endphp
@foreach($posts as $post)
    @php
        $count++;
    @endphp
    <p id="post-{{$count}}">
        {{$post['title']}}
    </p>
@endforeach

@php
    $data = 'Unicode Academy';
@endphp

@include('admin.users.parts.form', ['dataNew' => $data])

<script type="text/javascript">
    const customers = @{{name: 'Hoàng An'}}

    @verbatim
        @foreach($users as $user)
            <p>Item {{$user}}}</p>
        @endforeach
    @endverbatim
</script>

@endsection



