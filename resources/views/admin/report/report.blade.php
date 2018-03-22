@extends('admin.base')
@section('title','流向查询')
@section('menu','流向查询')

@section('content')
<div class="card">
	<div class="card-body">
		@section('selecter')
		@show
		@section('report')
		@show
	</div>
</div>
<!-- 覆盖div -->
<div class="loader-container text-center color-white">
    <div><i class="fa fa-spinner fa-pulse fa-3x"></i></div>
    <div>数据查询中，请不要刷新...</div>
</div>
<!-- 覆盖div完毕 -->
@endsection
