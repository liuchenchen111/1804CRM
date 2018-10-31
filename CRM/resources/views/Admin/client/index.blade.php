<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>客户列表</title>

    <script type="text/javascript" src="/win10/js/jquery-2.2.4.min.js"></script>
    <link href="/win10/component/layer-v3.0.3/layer/css/layui.css" rel="stylesheet">
    <script type="text/javascript" src="/win10/component/layer-v3.0.3/layer/layer.js"></script>


</head>
<body>

  <div style="margin: 15px;">


    <button class="layui-btn layui-btn-danger">客户列表</button>
    <button class="layui-btn " onclick="popup('新增客户资料','client_add')">新增客户</button>

  </div>
  <table class="layui-table" lay-size="sm" id="test" style="margin: 15px;width:98%;">
      <colgroup>
          <col width="150">
          <col width="200">
          <col>
      </colgroup>
      <thead>
      <tr>
          <th>编号</th>
          <th>客户名称</th>
          <th>所在地区</th>
          <th>详细地址</th>
          <th>客户级别</th>
          <th>联系人</th>
          <th>手机号码</th>
          <th>业务员</th>
          <th>管理</th>
      </tr>
      </thead>
      <tbody>
      @foreach( $client as $v )
      <tr>
          <td>{{$v->client_id}}</td>
          <td>{{$v->client_name}}</td>
          <td>{{$map[$v->province].$map[$v->city]}}</td>
          <td>{{$v->area_detail}}</td>
          <td>{{$v->client_level}}</td>
          <td>{{$v->client_contact}}</td>

          <td>{{$v->client_phone}}</td>
          <td>{{$v->client_contact}}</td>
          <td>
              <div class="layui-btn-group">

                  <button class="layui-btn layui-btn-sm" onclick="popup('客户资料修改','client_save?cid={{$v->client_id}}')">修改</button>
                  <button class="layui-btn layui-btn-sm layui-btn-normal del" cid="{{$v->client_id}}">删除</button>
              </div>
          </td>
      </tr>
      @endforeach

      </tbody>
  </table>

</body>
<script>
    //页面层
    function popup(title,url){

        layer.open({
            type: 2,
            shade: 0.3,
            title: title,
            shadeClose: true,
            maxmin: true, //开启最大化最小化按钮
            area: ['1000px', '500px'],
            content: '/index.php/'+url,
            end: function () {
                window.location.reload();
            }

        });

    }

    /*
    * 删除
    * */
    $('.del').click(function(){
        var cid = $(this).attr('cid');
        $.ajax({
            url:'client_del',
            data:{
                '_token' : '{{csrf_token()}}',
                'cid' : cid
            },
            dataType:'json',
            type:'post',
            asyn:false,
            success:function(json_msg){
                if(json_msg.code == '1000'){

                    layer.msg(json_msg.font,{icon:6});

                }else{

                    layer.msg(json_msg.font,{icon:5});
                }

            }

        })

    })






</script>


</html>