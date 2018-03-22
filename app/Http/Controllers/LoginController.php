<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\gysxt_User;
//class_alias('App\Models\gysxt_User','User');

class LoginController extends Controller
{
    public function login()
    {
        return view('login.login');
    }

    public function login_submit(Request $request)
    {
        $this->validate($request,[
        	'username'=>'required',
        	'password'=>'required'
        ],[
        	'username.required'=>'请输入您的用户名！',
        	'password.required'=>'请输入您的密码！'
        ]);
        /*验证密码*/
        if($user=gysxt_User::where('username',$request->username)->first()){
        	if($user->password==$request->password){
        		$request->session()->put('uid',$user->id);
        		return redirect('/admin');
        	}else{
        		return back()->with('info','密码错误！');
        	}
        }else{
        	return back()->with('info','用户名不存在！');
        }
    }
    //密码操作
    public function password()
    {
        return view('login.password');
    }

    public function password_submit(Request $request)
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
                return redirect('/login')->with('info','密码修改成功！');
            }
        }else{
            return back()->with('info','用户名不存在或密码错误！');
        }
    }
}
