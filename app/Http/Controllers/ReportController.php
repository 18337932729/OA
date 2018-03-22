<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

//use App\Models\Retmxls;

class ReportController extends Controller
{
    //购进
    public function goujin(Request $request)
    {
        if(!$request->from_date||!$request->end_date){
            return view('admin.report.goujin');
        }else{
            $user=\App\Models\gysxt_User::find(session('uid'));
            $reports=\DB::table('jh_rkmx')
                            ->select(\DB::raw('jh_rkhz.rq,jh_rkhz.djbh,mchk.dwmch,spkfk.spbh,spkfk.spmch,spkfk.dw,spkfk.shpchd,spkfk.shpgg,spkfk.lshj,jh_rkmx.pihao,jh_rkmx.sxrq,jh_rkmx.shl,jh_rkmx.je'))
                            ->join('jh_rkhz', 'jh_rkhz.djbh','=','jh_rkmx.djbh')
                            ->join('mchk','jh_rkhz.dwbh','=','mchk.dwbh')
                            ->join('spkfk','jh_rkmx.spid','=','spkfk.spid')
                            ->join('gysxt_gyssp','spkfk.spid','=','gysxt_gyssp.spid')
                            ->where('jh_rkhz.djbh','like','jh[a,b,c]%')
                            ->where('jh_rkhz.rq','>=',$request->from_date)
                            ->where('jh_rkhz.rq','<=',$request->end_date)
                            ->where('gysxt_gyssp.username','=',$user->username)
                            ->orderBy('jh_rkhz.rq','ASC')
                            ->paginate(1000);
            return view('admin.report.goujin',['user'=>$user,'reports'=>$reports,'from_date'=>$request->from_date,'end_date'=>$request->end_date]);
        }
    }
     //配送
    public function peisong(Request $request)
    {
        if(!$request->from_date||!$request->end_date){
            return view('admin.report.peisong');
        }else{
            $user=\App\Models\gysxt_User::find(session('uid'));
            $reports=\DB::table('zpckmx')
                            ->select(\DB::raw('zpckmx.djbh,zpckhz.rq,huoweizl.huowname,spkfk.spbh,spkfk.spmch,spkfk.shpgg,spkfk.dw,spkfk.shpchd,spkfk.lshj,zpckmx.shl,zpckmx.dbdj,zpckmx.dbje,zpckmx.pihao,spkfk.pizhwh'))
                            ->join('zpckhz', 'zpckmx.djbh','=','zpckhz.djbh')
                            ->join('spkfk','zpckmx.spid','=','spkfk.spid')
                            ->join('huoweizl','zpckmx.drhw','=','huoweizl.hw')
                            ->join('gysxt_gyssp','spkfk.spid','=','gysxt_gyssp.spid')
                            ->where('zpckhz.djbs','like','ZCK%')
                            ->where('zpckhz.rq','>=',$request->from_date)
                            ->where('zpckhz.rq','<=',$request->end_date)
                            ->where('gysxt_gyssp.username','=',$user->username)
                            ->orderBy('zpckhz.rq','ASC')
                            ->paginate(1000);
            return view('admin.report.peisong',['user'=>$user,'reports'=>$reports,'from_date'=>$request->from_date,'end_date'=>$request->end_date]);
        }
    }
    //销售
    public function xiaoshou(Request $request)
    {
        if(!$request->from_date||!$request->end_date){
            return view('admin.report.xiaoshou');
        }else{
            $user=\App\Models\gysxt_User::find(session('uid'));
            $reports=\DB::table('retmxls')
                            ->select(\DB::raw('retmxls.rq,huoweizl.huowname,retmxls.lshh,spkfk.spbh,spkfk.spmch,spkfk.shpgg,spkfk.dw,spkfk.shpchd,spkfk.lshj,retmxls.shl,Retmxls.chbje,retmxls.sshje'))
                            ->leftJoin('spkfk', 'retmxls.spid','=','spkfk.spid')
                            ->leftJoin('huoweizl','retmxls.hw','=','huoweizl.hw')
                            ->join('gysxt_gyssp','spkfk.spid','=','gysxt_gyssp.spid')
                            ->where('retmxls.rq','>=',$request->from_date)
                            ->where('retmxls.rq','<=',$request->end_date)
                            ->where('gysxt_gyssp.username','=',$user->username)
                            ->orderBy('retmxls.rq','ASC')
                            ->paginate(1000);
            return view('admin.report.xiaoshou',['user'=>$user,'reports'=>$reports,'from_date'=>$request->from_date,'end_date'=>$request->end_date]);
        }
    }
    //库存
    public function kucun(Request $request)
    {
        if(!$request->from_date||!$request->end_date){
            return view('admin.report.kucun');
        }else{
            $user=\App\Models\gysxt_User::find(session('uid'));
            $reports=\DB::table('hwsp')
                            ->select(\DB::raw('huoweizl.hw,huoweizl.huowname,spkfk.spid,spkfk.spbh,spkfk.spmch,spkfk.shpgg,spkfk.dw,spkfk.shpchd,spkfk.lshj,hwsp.hwshl'))
                            ->join('spkfk', 'hwsp.spid','=','spkfk.spid')
                            ->join('huoweizl','hwsp.hw','=','huoweizl.hw')
                            ->join('gysxt_gyssp','spkfk.spid','=','gysxt_gyssp.spid')
                            ->where('gysxt_gyssp.username','=',$user->username)
                            ->orderBy('spkfk.spid','ASC')->orderBy('huoweizl.hw','ASC')
                            ->paginate(1000);
            return view('admin.report.kucun',['user'=>$user,'reports'=>$reports,'from_date'=>$request->from_date,'end_date'=>$request->end_date]);
        }
    }
}
