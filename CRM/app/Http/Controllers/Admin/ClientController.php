<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Http\Controllers\Controller;


class ClientController extends Controller
{	
	/*首页*/
	public function client_list(){
		
		return view('admin.client.index');
	}

    /*添加客户*/
    public function client_add(){

        return view('admin.client.add');

    }

    /*添加客户操作*/
    public function client_add_db(Request $request){
        $data = $request->all();
        //判断参数
        $insert = [];

//        组合数据
        $insert['client_phone'] = $data['arr']['tel'];
        $insert['client_name'] = $data['arr']['title'];
        $insert['client_type'] = $data['arr']['type'];
        $insert['client_level'] = $data['arr']['level'];
        $insert['client_from'] = $data['arr']['title'];
        $insert['corp_name'] = $data['arr']['crop'];
        $insert['province'] = $data['arr']['pro'];
        $insert['city'] = $data['arr']['ciy'];
        $insert['area_detail'] = $data['arr']['detail'];
        $insert['client_remark'] = $data['arr']['remark'];
        $insert['client_ctime'] = time();
        $insert['client_status'] = 1;
        $insert['admin_id'] = 1;//管理员id

        //插入数据库
        $res = DB::table('client')->insert($insert);
        if($res){
            return ['code'=>1000,'font'=>'添加成功'];
        }else{
            return ['code'=>1,'font'=>'添加失败'];
        }


    }

}
