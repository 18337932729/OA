@extends('admin.base')
@section('title','用户中心')
@section('menu','用户中心')
@section('menu_list','用户信息')
@section('content')
<div class="card">
    <div class="card-header">
        <div class="card-title">
            <div class="title">用户信息</div>
        </div>
    </div>
    <div class="card-body">
        <form class="form-horizontal" action="{{url('/admin/userinfo/'.$userinfo->id)}}" method="post">
            {{csrf_field()}}
            {{method_field('PUT')}}
            <div class="form-group">
                <label for="username" class="col-sm-2 control-label">账号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="username" name="username" placeholder="登录时的用户名！" value="{{$userinfo->username}}">
                </div>
            </div>
            <div class="form-group">
                <label for="name" class="col-sm-2 control-label">昵称</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" id="name" name="name" placeholder="您的简称，例如“葵花一部、云南白药！" value="{{$userinfo->name}}">
                </div>
            </div>
            <div class="form-group">
                <label for="mobilephone" class="col-sm-2 control-label">手机号</label>
                <div class="col-sm-10">
                    <input type="tel" class="form-control" id="mobilephone" name="mobilephone" placeholder="您的手机号！" value="{{$userinfo->mobilephone}}">
                </div>
            </div>
       <!-- <div id="mb2">
                <div class="form-group">
                    <label for="new_mobilephone" class="col-sm-2 control-label">手机号</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" id="new_mobilephone" name="new_mobilephone" placeholder="您的手机号！" value="{{$userinfo->mobilephone}}">
                    </div>
                    <div class="col-sm-2">
                        <input type="button" class="form-control" id="send_code" value="发送验证码">
                    </div>
                </div>
                <div class="form-group">
                <label for="code" class="col-sm-2 control-label">验证码</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" id="code" name="code" placeholder="请输入您收到的验证码，5分钟内有效！">
                </div>
                <div class="col-sm-2">
                    <input type="button" class="form-control" id="send_code" value="提交验证">
                </div>
            </div>
            </div>-->
            
            <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10">
                    <input type="email" class="form-control" id="email" name="email" placeholder="如果需要使用邮箱发送流向，可以留下您的邮箱！" value="{{$userinfo->email}}">
                </div>
            </div>
            @if($userinfo->type==0)
            <div class="form-group">
                <label for="type" class="col-sm-2 control-label">账户类型</label>
                <div class="col-sm-10">
                    <select class="form-control" id="type" name="type">
                        <option value="0" @if($userinfo->type==0) selected @endif>管理员</option>
                        <option value="1" @if($userinfo->type==1) selected @endif>普通用户</option>
                    </select>
                </div>
            </div>
            @endif
            <div class="form-group">
                <label for="mobilephone" class="col-sm-2 control-label">备注</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="comment" name="comment" placeholder="请输入备注信息！">{{$userinfo->comment}}</textarea>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                    <button type="button" class="btn btn-primary" id="modify">修改资料</button>
                    <button type="submit" class="btn btn-primary" id="submit">提交</button>
                </div>
                 <div class="col-sm-offset-2 col-sm-10">
                   
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$('#username').attr('readonly','readonly');
		$('#name').attr('readonly','readonly');
		$('#mobilephone').attr('readonly','readonly');
		$('#email').attr('readonly','readonly');
        $('#comment').attr('readonly','readonly');
        $('#type').attr('disabled','true');
		$('#submit').attr('disabled','true');

		$('#modify').click(function(){
			// 如果是修改资料执行下面的操作
			$('#username').removeAttr('readonly');
			$('#name').removeAttr('readonly');
			$('#mobilephone').removeAttr('readonly');
			$('#email').removeAttr('readonly');
            $('#comment').removeAttr('readonly');
            $('#type').removeAttr('disabled');
			$('#submit').removeAttr('disabled');

            $('#modify').attr('disabled','true');

            // $('#send_code').click(function(){
            //     sendMessage();
            // });
		});

        // var InterValObj; //timer变量，控制时间  
        // var count = 120; //间隔函数，1秒执行  
        // var curCount;//当前剩余秒数  
          
        // function validatemobile(mobile)  
        // {  
        //     if(mobile.length==0)  
        //     {  
        //        alert('请输入手机号码！');  
        //        return false;  
        //     }      
        //     if(mobile.length!=11)  
        //     {  
        //         alert('请输入有效的手机号码！');  
        //         return false;  
        //     }  
              
        //     var myreg = /^(((13[0-9]{1})|159|153)+\d{8})$/;  
        //     if(!myreg.test(mobile))  
        //     {  
        //         alert('请输入有效的手机号码！');
        //         return false;  
        //     }  
        // }

        // function sendMessage() {  
        //     curCount = count;  
        // 　　//设置button效果，开始计时  
        //      $("#send_code").attr("disabled", "true");  
        //      $("#send_code").val("请在" + curCount + "秒内输入验证码");  
        //      InterValObj = window.setInterval(SetRemainTime, 1000); //启动计时器，1秒执行一次  
        // 　　  //向后台发送处理数据  
        //      var mobile = document.getElementById("new_mobilephone").value; 
        //      //validatemobile(mobile);//调用上边的方法验证手机号码的正确性     
        //      $.get("url('/sms?mobilephone=')".mobile);
        // }  
          
        // //timer处理函数  
        // function SetRemainTime() {  
        //     if (curCount == 0) {                  
        //         window.clearInterval(InterValObj);//停止计时器  
        //         $("#send_code").removeAttr("disabled");//启用按钮  
        //         $("#send_code").val("重新发送验证码");  
        //     }  
        //     else {  
        //         curCount--;  
        //         $("#send_code").val("请在" + curCount + "秒内输入验证码");  
        //     }  
        // }
	});
</script> 
@endsection