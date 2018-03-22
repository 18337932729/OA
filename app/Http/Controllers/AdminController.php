<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use DB;

class AdminController extends Controller
{
    public function index()
    {
        $user=\App\Models\gysxt_User::find(session('uid'));
        $chart=DB::table('retmxls')
                    ->select('retmxls.rq', DB::raw('sum(sshje) as xse'))
                    ->join('gysxt_gyssp','retmxls.spid','=','gysxt_gyssp.spid')
                    ->where('retmxls.rq','>=','2018-01-01')
                    ->where('gysxt_gyssp.username','=', $user->username)
                    ->groupBy('retmxls.rq')
                    ->orderBy('retmxls.rq','ASC')
                    ->get();
        $charts=[];
        foreach ($chart as $key => $value) {
            $charts[]=[$value->rq,$value->xse];
        }
        return view('admin.index.index',['charts'=>$charts]);
    }

    public function loginout(Request $request)
    {   
        # code...
        $request->session()->flush();
        return redirect('/');
    }
}
