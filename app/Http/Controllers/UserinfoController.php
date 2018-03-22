<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\gysxt_User;

class UserinfoController extends Controller
{
    //用户资料操作
    public function index()
    {
        $user=gysxt_User::find(session('uid'));
        return view('admin.userinfo.userinfo',['userinfo'=>$user]);
    }
     //用户资料操作
    public function store(Request $request)
    {
        $this->validate($request,[
            'username'=>'required',
            'password'=>'required',
            'new_password'=>'required|same:re_new_password',
            're_new_password'=>'required',

        ],[
            'username.required'=>'请输入您的用户名！',
            'password.required'=>'请输入您的原密码！',
            'new_password.required'=>'请输入您的新密码！',
            're_new_password.required'=>'请再次输入您的密码！',
            'new_password.same'=>'新密码两次输入不一致！',
        ]);
        /*验证密码*/
        if($user=gysxt_User::where('username',$request->username)->where('password',$request->password)->first()){
            $user->password=$request->new_password;
            if($user->save()){
                session()->flush();
                return redirect('/login')->with('info','密码修改成功！');
            }
        }else{
            return back()->with('info','用户名不存在或密码错误！');
        }
    }
    /**/
    public function update(Request $request,$id)
    {
        # code...
        $user=gysxt_User::find($id);
        $user->username=$request->username;
        $user->name=$request->name;
        $user->mobilephone=$request->mobilephone;
        $user->email=$request->email;
        $user->comment=trim($request->comment);
        $user->type=$request->type;
        if($user->save()){
            return back()->with('info','用户资料修改成功！');
        }else{
            return back()->with('info','用户资料修改失败！');
        }
    }
}
