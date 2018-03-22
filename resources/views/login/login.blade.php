@extends('base')
@section('title','用户登录')
@section('body')
<body class="flat-blue login-page" style="background: {{asset('/img/app-header-bg.jpg')}};">
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
                                    后台登陆
                                </div>
                            </div>
                            <form action="{{asset('/login')}}" method="post">
                            {{csrf_field()}}
                                <div class="control">
                                    <input type="text" class="form-control" name="username" required="required" placeholder="您的用户名！" value="{{old('username')}}" />
                                </div>
                                <div class="control">
                                    <input type="password" class="form-control" name="password" required="required" placeholder="您的密码！" value="{{old('password')}}" />
                                </div>
                                <div class="login-button text-center">
                                    <input type="submit" class="btn btn-primary" value="登陆">
                                </div>
                            </form>
                        </div>
                        <div class="login-footer">
                            <span class="text-right"><a href="{{url('/password')}}" class="color-white">修改密码？</a></span>
                            <span class="text-left"><a href="{{url('/')}}" class="color-white">返回首页</a></span>
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
@section('script')
<script type="text/javascript">
    $(function(){
        var ie_version=IEVersion();
        if(ie_version>=0 && ie_version<11){
            alert('系统检测到 您当前使用的是IE浏览器并且版本较低！\n使用当前浏览器将导致 部分页面和功能将不能正常显示和运行！\n强烈建议您使用非IE内核的浏览器。如谷歌、火狐等！\n如果您使用的是360浏览器或QQ浏览器，请切换到极速模式！ ');
        }
    })
    function IEVersion() {
        var userAgent = navigator.userAgent; //取得浏览器的userAgent字符串  
        var isIE = userAgent.indexOf("compatible") > -1 && userAgent.indexOf("MSIE") > -1; //判断是否IE<11浏览器  
        var isEdge = userAgent.indexOf("Edge") > -1 && !isIE; //判断是否IE的Edge浏览器  
        var isIE11 = userAgent.indexOf('Trident') > -1 && userAgent.indexOf("rv:11.0") > -1;
        if(isIE) {
            var reIE = new RegExp("MSIE (\\d+\\.\\d+);");
            reIE.test(userAgent);
            var fIEVersion = parseFloat(RegExp["$1"]);
            if(fIEVersion == 7) {
                return 7;
            } else if(fIEVersion == 8) {
                return 8;
            } else if(fIEVersion == 9) {
                return 9;
            } else if(fIEVersion == 10) {
                return 10;
            } else {
                return 6;//IE版本<=7
            }   
        } else if(isEdge) {
            return 'edge';//edge
        } else if(isIE11) {
            return 11; //IE11  
        }else{
            return -1;//不是ie浏览器
        }
    }
</script>
@endsection
