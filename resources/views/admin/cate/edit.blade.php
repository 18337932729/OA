@extends('admin.base')
@section('title','分类修改')
@section('menu','分类管理')
@section('menu_list','分类修改')

@section('content')
<div class="card">
    <div class="card-body">
    <form method="post" action="/admin/cate/{{$cate->id}}">
    <input type="hidden" name="_method" value="PUT">
    {{csrf_field()}}
    @if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
	    <div class="alert fresh-color alert-danger" role="alert">
            <strong>注意：</strong>{{ $error }}
        </div>
        @endforeach
	@endif
        <div class="sub-title">分类名称</div>
        <div>
            <input type="text" class="form-control" name="name" value="{{$cate->name}}" required="required" placeholder="输入分类名称">
        </div>
        <div class="sub-title">上级分类</div>
        <div>
        	<select tabindex="-1" class="select2" name="pid">
        		@foreach($cates as $k=>$v)
            	<option value="{{$v->id}}" @if($v->id==$cate->pid) selected @endif>{{$v->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    </div>
</div>
@endsection