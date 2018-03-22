@extends('admin.base')
@section('title','用户列表')
@section('menu','用户管理')
@section('menu_list','用户列表')
@section('content_title','用户列表')
@section('content_desc','在这里查看用户列表！')

@section('content')

<div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th>ID</th>
                <th>用户名</th>
                <th>手机号</th>
                <th>Email</th>
                <th>状态</th>
                <th>头像</th>
                <th>操作</th>
            </tr>
        </thead>
        <tbody>
        @foreach($users as $k=>$v)
            <tr>
                <th scope="row">{{$v->id}}</th>
                <td>{{$v->username}}</td>
                <td>{{$v->mobilephone}}</td>
                <td>{{$v->email}}</td>
                <td>@if($v->status==-1) 删除 @elseif($v->status==0) 正常 @elseif($v->status==1) 禁用 @elseif($v->status==2) 未激活 @else 未知 @endif</td>
                <td>{{$v->face_img}}</td>
                <td>
                    <a href="/admin/user/update/{{$v->id}}"><button class="btn btn-success btn-xs"><i class="fa fa-edit"></i></button></a>
                    <form action="/admin/user/delete/{{$v->id}}" method="post" style="display: inline-block;">
                    <input type="hidden" name="_method" value="DELETE">
                    {{csrf_field()}}
                    <button class="btn btn-danger btn-xs"><i class="fa fa-trash"></i></button></form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>{!! $users->render() !!}</div>
</div>
@endsection