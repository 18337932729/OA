@extends('admin.base')
@section('title','文章列表')
@section('menu','文章管理')
@section('menu_list','文章列表')


@section('content')
<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>文章标题</th>
                <th>作者</th>
                <th>分类</th>
                <th>更新日期</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($articles as $k=>$v)
            <tr>
                <th scope="row">{{$v->id}}</th>
                <td>{{$v->title}}</td>
                <td>{{$v->user->username}}</td>
                <td>{{$v->cate->name}}</td>
                <td>{{$v->updated_at}}</td>
                <td>
                	<a href="/admin/article/{{$v->id}}/edit"><button class="btn btn-success btn-xs"><i class="fa fa-edit"></i></button></a>
                    <form action="/admin/article/{{$v->id}}" method="post" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{!! $articles->render() !!}</div>
</div>

@endsection