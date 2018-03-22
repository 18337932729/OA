@extends('common')
@section('title','修改密码')
@section('body')
<body class="flat-blue login-page" style="background: url({{asset('/img/app-header-bg.jpg')}});">
    <div class="container">
        <div class="login-box">
            <div>
                <div class="login-form row">
                    <div class="col-sm-12 text-center login-header">
                        <a style="color: white;" href="{{url('/')}}">
                            <i class="login-logo fa fa-connectdevelop fa-5x"></i>
                            <h4 class="login-title">{{getAppName()}}</h4>
                        </a>
                    </div>
                    <div class="col-sm-12">
                        <div class="login-body">
                            <div class="progress hidden" id="login-progress">
                                <div class="progress-bar progress-bar-success progress-bar-striped active" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%">
                                    修改密码
                                </div>
                            </div>
                            <form action="{{asset('/password')}}" method="post">
                            {{csrf_field()}}
                                <div class="control">
                                    <input type="text" class="form-control" name="username" required="required" placeholder="您的用户名！" value="{{old('username')}}"/>
                                </div>
                                <div class="control">
                                    <input type="password" class="form-control" name="password" required="required" placeholder="您的原密码！" value="{{old('password')}}"/>
                                </div>
                                 <div class="control">
                                    <input type="password" class="form-control" name="new_password" required="required" placeholder="输入新密码！" value="{{old('new_password')}}"/>
                                </div>
                                 <div class="control">
                                    <input type="password" class="form-control" name="re_new_password" required="required" placeholder="再次输入密码！" value="{{old('re_new_password')}}" />
                                </div>
                                <div class="login-button text-center">
                                    <input type="submit" class="btn btn-primary" value="提交">
                                </div>
                            </form>
                        </div>
                        <div class="login-footer">
                            <span class="text-left"><a href="{{url('/')}}" class="color-white">返回首页</a></span>
                            <span class="text-left"><a href="{{url('/login')}}" class="color-white">返回登陆</a></span>
                        </div>
                    </div>
                </div>
                @if(session('info'))
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-info-circle"></i> {{session('info')}}
                </div>
                @endif
                @if(count($errors)>0)
                @foreach($errors->all() as $error)
                <div class="alert alert-info alert-dismissible" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                    <i class="fa fa-info-circle"></i> {{$error}}
                </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
@endsection
