<?php

namespace App\Http\Controllers\Login;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Model\User;
use Illuminate\Support\Facades\Session;
class LoginController extends Controller
{
    //登陆表单
    public function login(){
        return view("vm.login");
    }


    //登陆逻辑方法
    public function loginDo(){
        $name=request()->name;
        $pwd=request()->pwd;
       // dd(password_hash("123",PASSWORD_DEFAULT ));
        $userinfo=User::where("name",$name)->first();
        if(!$userinfo){
            return redirect("/vm/login");
        }
        if(password_verify($pwd,$userinfo['pwd'])){
            echo "登陆成功";
            request()->session()->put(['id'=>$userinfo['id'],'name'=>$name]);
            return redirect("vm/center");
        }else{
            echo "密码错误";
           return redirect('/vm/login');
        }
    }


    //注册的表单
    public function reg(){
        return view("vm.reg");
    }

    public function regDo(){
        $name=request()->name;
        $pwd=request()->pwd;
        $pwd=password_hash($pwd,PASSWORD_DEFAULT);
        $data=[
          'name'=>$name,
            'pwd'=>$pwd
        ];
        User::insert($data);
    }




    //用户中心
    public function center(){
        return view("vm.center");
    }




    //测试方法
    public function test(){
        $id=request()->session()->get("id");
        dd($id);
    }
}
