@extends('base')
@section('title','首页')
@section('news','自2018年1月1日起，所有来货药品必须携带批次检验报告！纸质版和电子版（限彩色）均可！（电子版请发送至邮箱lywjkdyf@126.com）')
@section('content')
<div id="top" class="jumbotron app-header">
        <div class="container">
            <h2 class="text-center">
            	<i class="app-logo fa fa-connectdevelop fa-5x color-white"></i>
            	<div class="color-white">{{getAppName()}}</div>
            </h2>
            <p style="color: white;">
            	<a href="{{url('/download/app')}}" target="_blank">
            		<span class="text-center color-white app-description" style="display:block;margin-left:auto;margin-right:auto;font-weight:bold;">下载APP（安卓版）</span>
            	</a>欢迎使用万家康协同平台！如您需要开户，可以通过右上角
            	<a href="/contact">
            		<span style="color: rgb(240,250,251); font-weight: bold;cursor: pointer;">申请开户</span>
            	</a>提交给我们，我们会及时与您联系开户！
            </p>
            <p class="text-center">
                @if(date('d')<=5)
            	<a class="btn btn-primary btn-lg app-btn" href="{{url('/login')}}" role="button">点击登录>></a>
                @else
                <a class="btn btn-primary btn-lg app-btn" role="button">本系统限每月5号前使用</a>
                @endif
            </p>
        </div>
</div>
<div id="news" class="container-fluid app-content-a">
    <div class="container">
    	<div class="row text-center">
	        <div class="col-md-4 col-sm-6">
	            <span class="fa-stack fa-lg fa-2x">
	              <i class="fa fa-circle-thin fa-stack-2x"></i>
	              <i class="fa fa-bullhorn fa-stack-1x"></i>
	            </span>
	            <h2>最新通知</h2>
	            <p class="text-left text-indent">@yield('news')</p>
	        </div>
	        <div class="col-md-4 col-sm-6">
	            <span class="fa-stack fa-lg fa-2x">
	              <i class="fa fa-circle-thin fa-stack-2x"></i>
	              <i class="fa fa-bullhorn fa-stack-1x"></i>
	            </span>
	            <h2>企业消息</h2>
	            <p class="text-left text-indent">@yield('news')</p>
	        </div>
	        <div class="col-md-4 col-sm-6">
	            <span class="fa-stack fa-lg fa-2x">
	              <i class="fa fa-circle-thin fa-stack-2x"></i>
	              <i class="fa fa-bullhorn fa-stack-1x"></i>
	            </span>
	            <h2>行业新闻</h2>
	            <p class="text-left text-indent">@yield('news')</p>
	        </div>
        <!-- /.col-lg-4 -->
    	</div>
    </div>
</div>
<div id="about" class="container-fluid app-content-b feature-1">
    <div class="container">
        <div class="row">
            <div class="col-md-7 col-sm-6">
            </div>
            <div class="col-md-5 col-sm-6 text-right color-white">
                <h2 class="featurette-heading">平台介绍</h2>
                <p class="lead">本系统是由万家康自主研发旨在为万家康的合作伙伴提供更简便、高效的信息服务。本系统与我公司ERP系统完美打通，数据实时同步！马上使用，感受基于新时代、新技术带来的快捷服务吧！</p>
                <p class="lead">简便·高效·智能</p>
            </div>
        </div>
    </div>
</div>
@endsection