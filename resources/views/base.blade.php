@extends('common')
@section('body')
<body class="flat-blue landing-page">
    <nav class="navbar navbar-inverse navbar-fixed-top  navbar-affix" role="navigation" data-spy="affix" data-offset-top="60">
        <div class="container">
            <div class="navbar-header">
                <!--此处button用于生成手机浏览时 点击展现导航条-->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <div class="icon fa fa-paper-plane"></div>
                    <div class="title">{{getAppName()}}</div>
                </a>
            </div>
            <div id="navbar" class="navbar-collapse collapse " aria-expanded="true">
                <ul class="nav navbar-nav navbar-right">
                    <li class="active"><a href="{{url('/#top')}}">首页</a></li>
                    <li><a href="{{url('/#news')}}">通知消息</a></li>
                    <li><a href="{{url('/#about')}}">平台介绍</a></li>
                    <li><a href="{{url('/contact')}}">申请开户</a></li>
                    <li>@if(date('d')<=5)
                        <a href="{{url('/login')}}">点击登录>></a>
                        @endif
                    </li>
                </ul>
            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
    @section('content')
    @show
    <!-- FOOTER -->
    <footer class="app-footer">
      <div class="container">
        <p class="text-muted">&copy;2018 洛阳万家康大药房 技术研发</p>
      </div>
    </footer>
 @endsection
