@extends('admin.base')
@section('title','用户修改')
@section('menu','用户管理')
@section('menu_list','用户修改')

@section('content')
<div class="card">
    <div class="card-body">
    <form method="post" action="/admin/user/update/submit" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="id" value="{{$user->id}}">
    @if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
	    <div class="alert fresh-color alert-danger" role="alert">
            <strong>注意：</strong>{{ $error }}
        </div>
        @endforeach
	@endif
        <div class="sub-title">用户名</div>
        <div>
            <input type="text" class="form-control" name="username" value="{{$user->username}}" disabled="disabled" placeholder="6-20位中英文字符">
        </div>
        <div class="sub-title">头像</div>
        <div>
        	<input type="file" class="form-control" name="face_img" value="{{$user->face_img}}">
        </div>
        <div class="sub-title">手机号</div>
        <div>
            <input type="text" class="form-control" name="mobilephone" value="{{$user->mobilephone}}" placeholder="11位手机号">
        </div>
         <div class="sub-title">邮箱</div>
        <div>
            <input type="email" class="form-control" name="email" value="{{$user->email}}" placeholder="你的Email">
        </div>
        <div class="sub-title">启用</div>
         <div>
	        <input type="checkbox" class="toggle-checkbox" name="status" @if($user->status==0) checked="checked" @endif >
	    </div>
        <div class="sub-title">备注</div>
        <div>
            <textarea class="form-control" name="comment" rows="3" placeholder="你可以做一些备注！">{{$user->comment}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    </div>
</div>
@endsection