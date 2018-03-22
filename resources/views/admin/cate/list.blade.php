@extends('admin.base')
@section('title','分类列表')
@section('menu','分类管理')
@section('menu_list','分类列表')

@section('content')

<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>分类名称</th>
                <th>上级分类</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($cates as $k=>$v)
            <tr>
                <th scope="row">{{$v->id}}</th>
                <td>{{$v->name}}</td>
                <td>{{getCateNameByID($v->pid)}}</td>
                <td>
                    <a href="/admin/cate/{{$v->id}}/edit"><button class="btn btn-success btn-xs"><i class="fa fa-edit"></i></button></a>
                    <form action="/admin/cate/{{$v->id}}" method="post" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection