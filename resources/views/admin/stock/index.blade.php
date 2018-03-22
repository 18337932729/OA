@extends('admin.base')
@section('title','库存查询')
@section('menu','库存查询')
@section('menu_list','商品库存')
@section('content')
<div class="card">
    <div class="card-body">
        <div><button class="btn btn-primary" id="btn-export">导出</button></div>
        <table class="table table-hover" id="table-report">
            <thead>
                <tr>
                    <th>店内码</th>
                    <th>品名</th>
                    <th>规格</th>
                    <th>单位</th>
                    <th>生产企业</th>
                    <th>进价</th>
                    <th>零售价</th>

                    <th>配送中心</th>
                    <th>东花坛店</th>
                    <th>瀍河店</th>
                    <th>中州路店</th>
                    <th>经三路店</th>
                    <th>御博路店</th>
                    <th>伊洛路店</th>
                    <th>利民店</th>
                    <th>建华店</th>
                    <th>龙锦店</th>
                    <th>龙和店</th>
                    <th>中鑫店</th>
                    <th>中弘店</th>
                    <th>延安路店</th>
                    <th>九都西路店</th>
                    <th>郑州路店</th>
                    <th>唐宫东路店</th>
                    <th>李楼店</th>
                    <th>景华店</th>
                    <th>数量合计</th>
                    <th>金额合计</th>
                </tr>
            </thead>
            <tbody>
            <?php $sum=0;$count=0; ?>
            @foreach($report as $k=>$v)
                <tr>
                    <td>{{$v->spbh}}</td>
                    <td>{{$v->spmch}}</td>
                    <td>{{$v->shpgg}}</td>
                    <td>{{$v->dw}}</td>
                    <td>{{$v->shpchd}}</td>
                    <td>{{number_format($v->jj,2)}}</td>
                    <td>{{number_format($v->lshj,2)}}</td>

                    <td>{{number_format($v->pszx)}}</td>
                    <td>{{number_format($v->dhtd)}}</td>
                    <td>{{number_format($v->chd)}}</td>
                    <td>{{number_format($v->zzld)}}</td>
                    <td>{{number_format($v->jsld)}}</td>
                    <td>{{number_format($v->ybld)}}</td>
                    <td>{{number_format($v->ylld)}}</td>
                    <td>{{number_format($v->lmd)}}</td>
                    <td>{{number_format($v->jhd)}}</td>
                    <td>{{number_format($v->ljd)}}</td>
                    <td>{{number_format($v->lhd)}}</td>
                    <td>{{number_format($v->zxd)}}</td>
                    <td>{{number_format($v->zhd)}}</td>
                    <td>{{number_format($v->yald)}}</td>
                    <td>{{number_format($v->jdxld)}}</td>
                    <td>{{number_format($v->zzld)}}</td>
                    <td>{{number_format($v->tgdld)}}</td>
                    <td>{{number_format($v->lld)}}</td>
                    <td>{{number_format($v->jinhuadian)}}</td>
                    <td>{{number_format($v->heji)}}</td>
                    <td>{{number_format($v->heji*$v->jj,2)}}</td>
                </tr>
                <?php $sum=$sum+($v->heji*$v->jj);$count=$count+1; ?>
            @endforeach
            </tbody>
        </table>
        <span>合计：共{{$count}}个品种，总金额{{number_format($sum,2)}}</span>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript" src="{{asset('/lib/js/tableExport.js')}}"></script>
<script type="text/javascript" src="{{asset('/lib/js/jquery.table2excel.js')}}"></script>
<script type="text/javascript">
     $("#btn-export").click(function(){
        $("#table-report").table2excel({
            // exclude CSS class
            exclude: ".noExl",
            name: "Worksheet Name",
            filename: "洛阳万家康大药房库存表-{{$user->name or ''}}.xls" ,//do not include extension
            exclude_img: true,
            exclude_links: true,
            exclude_inputs: true
        });
    });
</script>
@endsection