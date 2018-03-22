@extends('admin.base')
@section('title','用户添加')
@section('menu','用户管理')
@section('menu_list','用户添加')

@section('content')
<div class="card">
    <div class="card-body">
    <form method="post" action="/admin/user/add/submit" enctype="multipart/form-data">
    {{csrf_field()}}
    @if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
	    <div class="alert fresh-color alert-danger" role="alert">
            <strong>注意：</strong>{{ $error }}
        </div>
        @endforeach
	@endif
        <div class="sub-title">用户名</div>
        <div>
            <input type="text" class="form-control" name="username" value="{{old('username')}}" placeholder="6-20位中英文字符">
        </div>
        <div class="sub-title">头像</div>
        <div>
        	<input type="file" class="form-control" name="face_img" value="{{old('face_img')}}">
        </div>
        <div class="sub-title">密码</div>
        <div>
            <input type="password" class="form-control" name="password" placeholder="6-20位英文或字符">
        </div>
        <div class="sub-title">再次输入密码</div>
        <div>
            <input type="password" class="form-control" name="repassword" placeholder="6-20位英文或字符">
        </div>
        <div class="sub-title">手机号</div>
        <div>
            <input type="text" class="form-control" name="mobilephone" value="{{old('mobilephone')}}" placeholder="11位手机号">
        </div>
         <div class="sub-title">邮箱</div>
        <div>
            <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Text input">
        </div>
        <div class="sub-title">启用</div>
         <div>
	        <input type="checkbox" class="toggle-checkbox" name="status" value="1" checked="checked">
	    </div>
        <div class="sub-title">备注</div>
        <div>
            <textarea class="form-control" name="comment" rows="3" placeholder="你可以做一些备注！">{{old('comment')}}</textarea>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    </div>
</div>
@endsection