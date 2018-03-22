<?php
    $user=\App\Models\gysxt_User::find(session('uid'));
?>
@extends('common')
@section('title','后台首页')
@section('body')
<body class="flat-blue">
    <div class="app-container">
        <div class="row content-container">
            <!--头部导航-->
            <nav class="navbar navbar-default navbar-fixed-top navbar-top">
                <div class="container-fluid">
                    <div class="navbar-header">
                        <button type="button" class="navbar-expand-toggle">
                            <i class="fa fa-bars icon"></i>
                        </button>
                        <ol class="breadcrumb navbar-breadcrumb">
                            <li>@yield('menu')</li>
                            <li class="active">@yield('menu_list')</li>
                        </ol>
                        <button type="button" class="navbar-right-expand-toggle pull-right visible-xs">
                            <i class="fa fa-th icon"></i>
                        </button>
                    </div>
                    <!--用户消息部分-->
                    <ul class="nav navbar-nav navbar-right">
						<button type="button" class="navbar-right-expand-toggle pull-right visible-xs fa-rotate-90">
                            <i class="fa fa-times icon"></i>
                        </button>
                        <li class="dropdown danger">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-star-half-o"></i> 0</a>
                            <ul class="dropdown-menu danger  animated fadeInDown">
                                <li class="title">
                                    新消息<span class="badge pull-right">0</span>
                                </li>
                                <li>
                                    <ul class="list-group notifications">
                                        <a href="#">
                                            <li class="list-group-item">
                                                <span class="badge">0</span> <i class="fa fa-exclamation-circle icon"></i> 新通知
                                            </li>
                                        </a>
                                        <a href="#">
                                            <li class="list-group-item message">
                                                查看全部
                                            </li>
                                        </a>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                        <!--头部用户名-->
                        <li class="dropdown profile">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">{{$user->username}}<span class="caret"></span></a>
                            <ul class="dropdown-menu animated fadeInDown">
                                <li class="profile-img">
                                    <img src="{{asset('/img/profile/picjumbo.com_HNCK4153_resize.jpg')}}" class="profile-img">
                                </li>
                                <li>
                                    <div class="profile-info">
                                        <h4 class="username">{{$user->username}}</h4>
                                        <p>{{$user->email}}</p>
                                        <div class="btn-group margin-bottom-2x" role="group">
                                            <a href="{{asset('/admin/loginout')}}"><button type="button" class="btn btn-default"><i class="fa fa-sign-out"></i>退出</button></a>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
            <!--侧边导航条-->
            <div class="side-menu sidebar-inverse">
                <nav class="navbar navbar-default" role="navigation">
                    <div class="side-menu-container">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="{{url('/admin')}}">
                                <div class="icon fa fa-paper-plane"></div>
                                <div class="title">{{getAppName()}}</div>
                            </a>
                            <button type="button" class="navbar-expand-toggle pull-right visible-xs">
                                <i class="fa fa-times icon"></i>
                            </button>
                        </div>
                        <ul class="nav navbar-nav">
                            <li>
                                <a href="{{url('/admin')}}">
                                    <span class="icon fa fa-tachometer"></span><span class="title">主页</span>
                                </a>
                            </li>
                            <li>
                                <a href="{{url('/admin/userinfo')}}">
                                    <span class="icon fa fa-tachometer"></span><span class="title">用户中心</span>
                                </a>
                            </li>
                             @if($user->type==0)
                             <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-alert">
                                    <span class="icon fa fa-table"></span><span class="title">预警信息</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-alert" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{{url('/admin/alert/add')}}">缺货预警</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-user">
                                    <span class="icon fa fa-table"></span><span class="title">用户管理</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-user" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{{url('/admin/user/add')}}">用户添加</a>
                                            </li>
                                            <li><a href="{{url('/admin/user/list')}}">用户列表</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-cate">
                                    <span class="icon fa fa-table"></span><span class="title">分类管理</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-cate" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{{url('/admin/cate/create')}}">分类添加</a>
                                            </li>
                                            <li><a href="{{url('/admin/cate')}}">分类列表</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-article">
                                    <span class="icon fa fa-table"></span><span class="title">文章管理</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-article" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{{url('/admin/article/create')}}">文章添加</a>
                                            </li>
                                            <li><a href="{{url('/admin/article')}}">文章列表</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @endif
                            <!--品种管理-->
                            <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-goods">
                                    <span class="icon fa fa-table"></span><span class="title">品种管理</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-goods" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{{url('/admin/goods')}}">品种列表</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            <li>
                                <a href="{{url('/admin/stock')}}">
                                    <span class="icon fa fa-tachometer"></span><span class="title">库存查询</span>
                                </a>
                            </li>
                            <!--数据查询-->
                             <li class="panel panel-default dropdown">
                                <a data-toggle="collapse" href="#dropdown-report">
                                    <span class="icon fa fa-table"></span><span class="title">流向查询</span>
                                </a>
                                <!-- Dropdown level 1 -->
                                <div id="dropdown-report" class="panel-collapse collapse">
                                    <div class="panel-body">
                                        <ul class="nav navbar-nav">
                                            <li><a href="{{url('/admin/report/goujin')}}">购进流向</a>
                                            </li>
                                            <li><a href="{{url('/admin/report/peisong')}}">配送流向</a>
                                            </li>
                                            <li><a href="{{url('/admin/report/xiaoshou')}}">销售流向</a>
                                            </li>
                                            <li><a href="{{url('/admin/report/kucun')}}">库存流向</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- /.navbar-collapse -->
                </nav>
            </div>
            <!-- Main Content -->
            <div class="container-fluid">
                <div class="side-body">
                    @if(session('info'))
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                        <i class="fa fa-info-circle"></i> {{session('info')}}
                    </div>
                    @endif
                    @section('content')
                    @show
                </div>
            </div>
        </div>
        <!--底部版权信息-->
        <footer class="app-footer">
            <div class="wrapper">
                <span class="pull-right">JooJoo©2018 Copyright.<a href="#"><i class="fa fa-long-arrow-up"></i></a></span>
            </div>
        </footer>
    <div>
</div>
@endsection
