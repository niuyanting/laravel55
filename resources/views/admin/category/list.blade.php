@extends('common.admin_base')
@section('title','管理后台分类列表')
{{--页面顶部信息--}}
@section('pageHeader')
    <div class="pageheader">
        <h2><i class="fa fa-home"></i> 分类列表 <span>Subtitle goes here...</span></h2>
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
                        <th>分类名字</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        @if(!empty($categorys))
                            @foreach($categorys as $category)
                                <td>{{$category['id']}}</td>
                                <td>{{$category['c_name']}}</td>
                                <td>
                                    <a class="btn btn-sm btn-danger" href="{{route('admin.category.del',['id'=>$category['id']])}}">删除</a>
                                </td>
                    </tr>
                    @endforeach
                    @endif
                    </tbody>
                </table>
                {{$categorys->links()}}
            </div><!-- table-responsive -->
        </div>
    </div>

@endsection