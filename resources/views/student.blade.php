@extends('common.base')
@section('title','学生列表')
@section('content')
<table border="1">
    <thead>
        <th>ID</th>
        <th>学号</th>
        <th>姓名</th>
        <th>课程</th>
        <th>时间</th>
    </thead>
    <tbody>
        @foreach($list as $key=>$v)
        <tr>
            <td>{{$v->id}}</td>
            <td>{{$v->user_id}}</td>
            <td>{{$v->c_days}}</td>
            <td>{{$v->total_days}}</td>
            <td>{{$v->last_date}}</td>
        </tr>
         @endforeach
    </tbody>
</table>
    {{$list->links()}}
@endsection