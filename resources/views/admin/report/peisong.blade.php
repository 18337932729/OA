
@extends('admin.report.report')
@section('menu_list','配送流向')
@section('selecter')
<div id="div_selecter">
    <form action="{{url('/admin/report/peisong')}}" method="get">
        <div class="form-group col-sm-3">
            <label for="from_date">起始日期</label>
            <input type="date" class="form-control" id="from_date" name="from_date" value="{{$from_date or date('Y-m-01',strtotime('-1 month'))}}">
        </div>
        <div class="form-group col-sm-3">
            <label for="end_date">结束日期</label>
            <input type="date" class="form-control" id="end_date" name="end_date" value="{{$end_date or date('Y-m-t',strtotime('-1 month'))}}">
        </div>
        <div class="form-group col-sm-3">
            <label for="submit">操作</label>
            <input type="submit" class="form-control btn-primary" id="submit" value="查询">
        </div>
        <div class="form-group col-sm-3">
            <label for="submit">导出</label>
            <input type="button" class="form-control" id="export" value="导出">
        </div>
    </form>
</div>
@endsection
@section('report')
<div id="div_result">
    @if(isset($reports))
    <div class="loader-container text-center color-white">
        <div><i class="fa fa-spinner fa-pulse fa-3x"></i></div>
        <div>数据查询中，请不要刷新...</div>
    </div>
    <table class="table table-hover" id="report_table">
		<!-- <caption>洛阳万家康大药房连锁有限公司-流向表</caption> -->
        <thead>
            <tr>
            	<th>日期</th>
                <th>To Company调入单位</th>
                <!--<th>流水号</th>
                <th>店内码</th> -->
                <th>Product Name品名</th>
                <th>规格</th>
                <th>单位</th>
                <th>Product company生产单位</th>
                <!-- <th>零售价</th> -->
                <th>批号</th>
                <th>数量</th>
            </tr>
        </thead>
        <tbody>
            <?php $count=0; ?>
            @foreach($reports as $k=>$v)
            <tr>
                <td>{{$v->rq}}</td>
                <td>{{$v->huowname}}</td>
              <!--   <td>{{$v->djbh}}</td>
                <td>{{$v->spbh}}</td> -->
                <td>{{$v->spmch}}</td>
                <td>{{$v->shpgg}}</td>
                <td>{{$v->dw}}</td>
                <td>{{$v->shpchd}}</td>
                <!-- <td>{{$v->lshj}}</td> -->
                <td>{{$v->pihao}}</td>
                <td>{{$v->shl}}</td>
            </tr>
            <?php $count=$count+1;?>
            @endforeach
        </tbody>
    </table>
    <span>共查找到{{$count}}行</span>
    <div class=pages>{!!$reports->appends(['from_date' => $from_date,'end_date'=>$end_date])->render()!!}</div>
    @endif
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('/lib/js/tableExport.js')}}"></script>
<script type="text/javascript" src="{{asset('/lib/js/jquery.table2excel.js')}}"></script>
<script type="text/javascript">
    $('#submit').click(function(){
        $("body").addClass("loader");
        // $("#div_table").removeClass("loader");
    });
    $('div.pages a').click(function(){
        $("body").addClass("loader");
        // $("#div_table").removeClass("loader");
    });
	 $("#export").click(function(){
        $("#report_table").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "洛阳万家康大药房流向数据表-{{$user->name or ''}}-配送.xls" ,//do not include extension
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
</script>
@endsection