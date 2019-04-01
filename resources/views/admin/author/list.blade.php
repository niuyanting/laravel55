@extends('common.admin_base')
@section('title','管理后台作者列表')
{{--页面顶部信息--}}
@section('pageHeader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 作者列表 <span>Subtitle goes here...</span></h2>
        <div class="breadcrumb-wrapper">
        </div>
    </div>
@endsection
@section('content')
    <div class ="row" id="list">
        <div class="col-md-12">
            <div class="table-responsive">
                <table class="table table-primary mb30">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>作者名字</th>
                        <th>作者描述</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @if(!empty($authors))
                            @foreach($authors as $author)
                                <td>{{$author['id']}}</td>
                                <td>{{$author['author_name']}}</td>
                                <td>{{$author['author_desc']}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{{route('admin.author.del',['id'=>$author['id']])}}">删除</a>
                                </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                {{$authors->links()}}
            </div><!-- table-responsive -->
        </div>
    </div>

@endsection