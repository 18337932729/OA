<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user=\App\Models\gysxt_User::find(session('uid'));
        $report=\DB::table('hwsp')
                        ->select(\DB::raw("spkfk.spid,spkfk.spbh,spkfk.spmch,spkfk.shpgg,spkfk.dw,spkfk.shpchd,spkfk.jj,spkfk.lshj,
                            
                            sum(case when hwsp.hw='HWI00000001' then hwsp.hwshl else 0 end) as pszx,
                            sum(case when hwsp.hw='HWI00000003' then hwsp.hwshl else 0 end) as dhtd,
                            sum(case when hwsp.hw='HWI00000005' then hwsp.hwshl else 0 end) as chd,
                            sum(case when hwsp.hw='HWI00000007' then hwsp.hwshl else 0 end) as zzld,
                            sum(case when hwsp.hw='HWI00000009' then hwsp.hwshl else 0 end) as jsld,
                            sum(case when hwsp.hw='HWI00000011' then hwsp.hwshl else 0 end) as ybld,
                            sum(case when hwsp.hw='HWI00000017' then hwsp.hwshl else 0 end) as ylld,
                            sum(case when hwsp.hw='HWI00000018' then hwsp.hwshl else 0 end) as lmd,
                            sum(case when hwsp.hw='HWI00000026' then hwsp.hwshl else 0 end) as jhd,
                            sum(case when hwsp.hw='HWI00000037' then hwsp.hwshl else 0 end) as ljd,
                            sum(case when hwsp.hw='HWI00000040' then hwsp.hwshl else 0 end) as lhd,
                            sum(case when hwsp.hw='HWI00000043' then hwsp.hwshl else 0 end) as zxd,
                            sum(case when hwsp.hw='HWI00000051' then hwsp.hwshl else 0 end) as zhd,
                            sum(case when hwsp.hw='HWI00000054' then hwsp.hwshl else 0 end) as yald,
                            sum(case when hwsp.hw='HWI00000069' then hwsp.hwshl else 0 end) as jdxld,
                            sum(case when hwsp.hw='HWI00000071' then hwsp.hwshl else 0 end) as zzld,
                            sum(case when hwsp.hw='HWI00000072' then hwsp.hwshl else 0 end) as tgdld,
                            sum(case when hwsp.hw='HWI00000078' then hwsp.hwshl else 0 end) as lld,
                            sum(case when hwsp.hw='HWI00000079' then hwsp.hwshl else 0 end) as jinhuadian,
                            sum(hwsp.hwshl) as heji"))
                        ->join ('spkfk','spkfk.spid','=','hwsp.spid')
                        ->join ('gysxt_gyssp','hwsp.spid','=','gysxt_gyssp.spid')
                        ->whereNotIn('hwsp.hw',['HWI00000030','HWI00000041','HWI00000046','HWI00000076'])
                        ->where('gysxt_gyssp.username','=',$user->username)
                        ->groupBy(\DB::raw('spkfk.spid,spkfk.spbh,spkfk.spmch,spkfk.shpgg,spkfk.dw,spkfk.shpchd,spkfk.jj,spkfk.lshj'))
                        ->orderBy('spkfk.spid','ASC')->get();
        return view('admin.stock.index',['report'=>$report]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
