<?php

namespace App\Http\Controllers\Home;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
class LoginController extends Controller
{
    public function login(){
//        echo 111;
        return view('Home.login');
    }
    public function login_do(){
        $account = $_POST['account'];
//        echo $account;
        $pwd = $_POST['pwd'];
        $where = [
            'admin_account'=>$account,
            'admin_status'=>1
        ];
        $admin = DB::table('admin')->where($where)->get();
        $admin = json_decode(json_encode($admin),true);
//        dump($admin);exit;
        if(empty($admin)){
            return ['status'=>1,'msg'=>'账号错误，请重新输入'];
        }
        $where = [
            'admin_psd' => $pwd ,
            'admin_status' => 1
        ];
        $admin_info = DB::table('admin')->where($where)->get();
        $admin_info = json_decode(json_encode($admin_info),true);
        if(empty($admin_info)){
            return ['status'=>1,'msg'=>'密码错误，请重新输入'];
        }else{
            session(['admin_info'=>$admin_info]);
            return ['status'=>100,'msg'=>'登陆成功'];
        }
    }
}
