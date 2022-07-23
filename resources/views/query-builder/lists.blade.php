@extends('layouts.admin')

@section('content')
<table class="table table-bordered">
    <thead>
        <tr>
            <th width="5%">STT</th>
            <th>Tên</th>
            <th>Email</th>
            <th>SDT</th>
        </tr>
    </thead>
    <tbody>
        @if ($users->count())
            @foreach($users as $key => $user)
            <tr>
                <td>{{$key+1}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone}}</td>
            </tr>
            @endforeach
        @else
            <tr>
               <td colspan="4">Không tìm thấy bản ghi nào</td>
            </tr>
        @endif
    </tbody>
</table>
@endsection
