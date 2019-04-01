@extends('common.base')

@section('title','第一个laravel视图')

@section('sidebar')
    <font style="font-size:50px;">这是主布局的侧边栏</font>
@endsection
{{--@section('content')
    <span style="font-size:30px;color: #ff0000;">{{$message}}</span>
@endsection--}}
@section('content')
    @if(!$message == 1)
        {{$message}}
    @else
        <div>找不到</div>
    @endif
    @for($i=1;$i<10;$i++)
        {{$i}}
    @endfor
    @foreach($sign_info as $key => $v)
        <li>{{$v->id}}</li>
    @endforeach
    <form action="" method="post">
        {{csrf_field()}}
        <input type="text">
        <input type="submit">
    </form>
@endsection