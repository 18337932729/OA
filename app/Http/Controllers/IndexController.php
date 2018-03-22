<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use DB;
use App\Models\gysxt_Contact;

class IndexController extends Controller
{
    public function index()
    {
        return view('index');
    }
    public function contact()
    {
        return view('contact');
    }

    public function contact_submit(Request $request)
    {
    	$this->validate($request,[
    		'name'=>'required',
    		'mobilephone'=>'required',
    		'content'=>'required'
    	],[
    		'name.required'=>'请输入您的姓名！',
    		'mobilephone.required'=>'请输入您的联系电话！',
    		'content.required'=>'请输入申请说明！'
    	]);
    	$contact=new gysxt_Contact;
    	$contact->name=$request->name;
    	$contact->mobilephone=$request->mobilephone;
    	$contact->content=$request->content;
    	$contact->date=date('Y-m-d H:i:s');
    	
    	if($contact->save()){
    		return back()->with('info','申请提交成功！');
    	}else{
    		return back()->with('info','申请提交失败');
    	}
    }

    public function downloadApp()
    {
        return redirect('/download/供应商协同.apk');
    }
    
}
