@extends('admin.base')
@section('title','文章添加')
@section('menu','文章管理')
@section('menu_list','文章添加')


@section('content')
<div class="card">
    <div class="card-body">
    <form method="post" action="{{url('/admin/article')}}">
    {{csrf_field()}}
    @if (count($errors) > 0)
    	@foreach ($errors->all() as $error)
	    <div class="alert fresh-color alert-danger" role="alert">
            <strong>注意：</strong>{{ $error }}
        </div>
        @endforeach
	@endif
        <div class="sub-title">文章标题</div>
        <div>
            <input type="text" class="form-control" name="title" value="{{old('title')}}" placeholder="100个字符以内">
        </div>
        <div class="sub-title">文章内容</div>
        <div>
            <div id="editor">{!!old('content')!!}</div>
            <input type="hidden" id="_content" name="content">
        </div>
         <div class="sub-title">分类</div>
        <div>
            <select tabindex="-1" class="select2" name="cate_id">
                @foreach($cates as $k=>$v)
                <option value="{{$v->id}}">{{$v->name}}</option>
                @endforeach
            </select>
        </div>
        <button type="submit" id="submit" class="btn btn-default">提交</button>
    </form>
    </div>
</div>
<!-- 注意， 只需要引用 JS，无需引用任何 CSS ！！！-->
<script type="text/javascript" src="{{asset('/plugins/wangEditor.min.js')}}"></script>
<script type="text/javascript">
    var E = window.wangEditor;
    //var editor = new E('#editor')
    var editor = new E( document.getElementById('editor') );
    editor.customConfig.uploadImgServer = '/upload';
    editor.create();
    /*当点击提交时，更新input的内容*/
    var v=document.getElementById('submit');
    v.addEventListener('click',function(){
        var _content=document.getElementById('_content');
        _content.value=editor.txt.html()
    },false);
</script>
@endsection