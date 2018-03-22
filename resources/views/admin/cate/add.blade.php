@extends('admin.base')
@section('title','分类添加')
@section('menu','分类管理')
@section('menu_list','分类添加')

@section('content')
<div class="card">
    <div class="card-body">
    <form method="post" action="/admin/cate">
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
            <input type="text" class="form-control" name="name" value="{{old('name')}}" required="required" placeholder="输入分类名称">
        </div>
        <div class="sub-title">上级分类</div>
        <div>
        	<select tabindex="-1" class="select2" name="pid">
                <option value="0" selected="selectede">根分类</option>
        		@foreach($cates as $k=>$v)
            	<option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" class="btn btn-default">提交</button>
    </form>
    </div>
</div>
@endsection