@extends('admin.base')
@section('title','品种列表')
@section('menu','品种管理')
@section('menu_list','品种列表')
@section('content')
<div class="card">
    <div class="card-body">
        <div>
            <button type="button" class="btn btn-primary">添加商品</button>
        </div>
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>店内码</th>
                    <th>品名</th>
                    <th>规格</th>
                    <th>单位</th>
                    <th>生产企业</th>
                    <th>零售价</th>
                    <th>停采</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
            @foreach($goods as $k=>$v)
                <tr>
                    <td>{{$v->spkfk->spbh}}</td>
                    <td>{{$v->spkfk->spmch}}</td>
                    <td>{{$v->spkfk->shpgg}}</td>
                    <td>{{$v->spkfk->dw}}</td>
                    <td>{{$v->spkfk->shpchd}}</td>
                    <td>{{number_format($v->spkfk->lshj,2)}}</td>
                    <td>@if($v->spkfk->cgxz==1) 是 @endif</td>
                    <td>
                    	<a href="/admin/goods/{{$v->id}}/edit">
                            <button class="btn btn-success btn-xs" style="padding: 0 0.5em;margin: 0 0.3em;">
                                <i class="fa fa-edit"></i>
                            </button>
                        </a>
                        <!-- <form action="/admin/goods/{{$v->id}}" method="post" style="display: inline-block;">
                            <input type="hidden" name="_method" value="DELETE">
                            {{csrf_field()}}
                            <button class="btn btn-danger btn-xs">
                                <i class="fa fa-trash"></i>
                            </button>
                        </form> -->
                        <button class="btn btn-danger btn-xs" style="padding: 0 0.6em;margin: 0 0.3em;" data-toggle="modal" data-target="#modal">
                            <i class="fa fa-trash"></i>
                        </button>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>{!! $goods->render() !!}</div>
    </div>
</div>
 <!-- Modal -->
<div class="modal fade modal-danger" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">删除确认</h4>
            </div>
            <div class="modal-body">
                确定要删除吗？
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                <button type="button" class="btn btn-danger" id="btn-delete">确定</button>
            </div>
        </div>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
$(document).ready(function(){
    $('#btn-delete').click(function(){
        $.post("/admin/goods",{"_token":"{{csrf_token()}}","_method":"DELETE"},function(data){
            // 如果返回成功，跳转
            if(data==1){
                window.location.href="{{url('/admin/goods')}}";
            }else{
                alert('删除失败！');
            }
        });
    });
});
</script>
@endsection