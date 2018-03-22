@extends('base')
@section('title','申请开户')
@section('content')
<div class="container-fluid app-content-b contact-us" style="min-height: 800px;">
    <div class="container">
        <div class="row featurette">
            <div class="container"><h2 class="color-white contact-us-header">申请开户</h2>
            <p class="color-white contact-us-description">请填写您的真实姓名、联系电话及申请说明，如有深度需求，请来公司采购部进行详细沟通！</p>
        </div>
        <div class="container">
            <form action="{{url('/contact')}}" method="post">
                {{csrf_field()}}
                <div class="row">
                    <div class="col-sm-6"><input type="text" name="name" class="form-control" value="{{old('name')}}" placeholder="联系人"> </div>
                    <div class="col-sm-6"><input type="text" name="mobilephone" class="form-control" value="{{old('mobilephone')}}" placeholder="手机号"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12"><textarea name="content" class="form-control" value="{{old('content')}}" placeholder="申请说明" rows="10"></textarea></div>
                </div>
                <div>
                    <button id="contact-submit" type="submit" class="btn btn-success pull-right">提交申请</button>
                </div>
            </form>
        </div>
    </div>
    @if (count($errors) > 0)
        @foreach ($errors->all() as $error)
            <div class="alert alert-warning alert-dismissible" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <strong>错误!</strong> {{$error}}
            </div>
        @endforeach
    @endif
    @if(session('info'))
    <div class="alert fresh-color alert-success" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <strong>恭喜!</strong> {{session('info')}}
    </div>
    @endif
</div
@endsection