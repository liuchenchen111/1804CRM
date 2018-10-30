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
    <button class="layui-btn " onclick="popup('新增客户资料')">新增客户</button>

  </div>
  <table class="layui-table" lay-size="sm" style="margin: 15px;width:98%;">
      <colgroup>
          <col width="150">
          <col width="200">
          <col>
      </colgroup>
      <thead>
      <tr>
          <th>昵称</th>
          <th>加入时间</th>
          <th>签名</th>
      </tr>
      </thead>
      <tbody>
      <tr>
          <td>贤心</td>
          <td>2016-11-29</td>
          <td>人生就像是一场修行</td>
      </tr>
      <tr>
          <td>许闲心</td>
          <td>2016-11-28</td>
          <td>于千万人之中遇见你所遇见的人，于千万年之中，时间的无涯的荒野里…</td>
      </tr>
      <tr>
          <td>sentsin</td>
          <td>2016-11-27</td>
          <td> Life is either a daring adventure or nothing.</td>
      </tr>
      </tbody>
  </table>

</body>
<script>
    //页面层
    function popup(title){

        layer.open({
            type: 2,
            shade: 0.3,
            title: title,
            shadeClose: true,
            maxmin: true, //开启最大化最小化按钮
            area: ['1000px', '500px'],
            content: '/index.php/client_add',
            end: function () {
                window.location.reload();
            }

        });

    }


</script>


</html>