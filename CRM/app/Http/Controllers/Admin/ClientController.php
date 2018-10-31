<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use \App\Http\Controllers\Controller;


class ClientController extends Controller
{
    /*首页*/
    public function client_list()
    {

        $client_info = DB::table('client')->where(['client_status' => 1])->get();
        $arr = [];
        foreach ($client_info as $k => $v) {

            $client_info[$k]->client_level = str_repeat('⭐', $v->client_level);
            $arr[] = $v->province;
            $arr[] = $v->city;
        }

        $map = $this->get_region_name( $arr );


        return view('admin.client.index', ['client' => $client_info,'map'=>$map]);
    }

    /*添加客户*/
    public function client_add()
    {

        //查询pid为1的省
        $region_info = DB::table('region')->where(['pid' => 1])->get();

        return view('admin.client.add', ['region' => $region_info]);

    }

    /*添加客户操作*/
    public function client_add_db(Request $request)
    {
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
        $insert['client_contact'] = $data['arr']['contact'];
        $insert['client_status'] = 1;
        $insert['admin_id'] = 1;//管理员id

        //插入数据库
        $res = DB::table('client')->insert($insert);
        if ($res) {
            return ['code' => 1000, 'font' => '添加成功'];
        } else {
            return ['code' => 1, 'font' => '添加失败'];
        }


    }

    /*
     * 根据pid获取地址信息
     */
    public function get_region(Request $request)
    {
        //接收地址id
        $region_id = $request->input('region_id');
        //根据地址id等于pid查询对应的数据
        $region_info = DB::table('region')->where(['pid' => $region_id])->get();

        return ['region' => $region_info];


    }

    /*
     * ajax删除
     * 把客户表中的client_status字段的值改为2假删
     */
    public function client_del(Request $request)
    {
        //过滤参数
        $client_id = intval($request->input('cid'));

        if (DB::table('client')->where(['client_id' => $client_id])->update(['client_status' => 2])) {

            return ['code' => 1000, 'font' => '删除成功'];
        } else {
            return ['code' => 1000, 'font' => '删除失败'];
        }


    }

    //客户资料修改
    public function client_save(Request $request )
    {
        //查询pid为1的省
        $region_info = DB::table('region')->where(['pid' => 1])->get();

        /*查出当前用户的数据*/
        //接收客户id
        $client_id = intval($request->input('cid'));
        $client_info = DB::table('client')->where(['client_id'=>$client_id])->first();
        //查询该用户的省名和市名
        $arr = [
            $client_info->province,
            $client_info->city
        ];
        $map = $this -> get_region_name($arr);

        return view('admin.client.save',['region' => $region_info,'client'=>$client_info,'map'=>$map]);

    }
    //查询该用户的省名和市名
    public function get_region_name($arr){
        $data = DB::table('region')->whereIn('region_id',$arr)->get();
        $map = [];
        foreach($data as $v){
            $map[$v->region_id] = $v->region_name;
        }
        return $map;
    }

    //修改操作
    public function client_save_db(Request $request){
        dd($request ->all());
    }

}
