<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>新增客户</title>

    <script type="text/javascript" src="/win10/js/jquery-2.2.4.min.js"></script>
    <link href="/win10/component/layer-v3.0.3/Layui/css/layui.css" rel="stylesheet">
    <script type="text/javascript" src="/win10/component/layer-v3.0.3/Layui/layui.js"></script>


</head>
<body>
<form class="layui-form layui-form-pane" action="" style="margin-top: 20px;margin-left: 20px;">

    <div class="layui-form-item">
        <label class="layui-form-label">手机号</label>
        <div class="layui-input-inline">
            <input type="text" name="tel" lay-verify="required" placeholder="请输入" autocomplete="off" class="layui-input">
        </div>

        <label class="layui-form-label">客户名称</label>
        <div class="layui-input-inline">
            <input type="text" name="title" autocomplete="off" placeholder="请输入标题" class="layui-input">
        </div>

    </div>

    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">客户类型</label>
            <div class="layui-input-block">
                <input type="text" name="type" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">客户级别</label>
            <div class="layui-input-inline">
                <input type="text" name="level" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">客户来源</label>
            <div class="layui-input-block">
                <input type="text" name="from" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">公司名称</label>
            <div class="layui-input-inline">
                <input type="text" name="crop" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">联系人</label>
            <div class="layui-input-block">
                <input type="text" name="contact" id="date1" autocomplete="off" class="layui-input">
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">职位</label>
            <div class="layui-input-inline">
                <input type="text" name="position" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">所在地区</label>
        <div class="layui-input-inline">
            <select name="pro">
                <option value="">请选择省</option>
                <option value="浙江" selected="">浙江省</option>
                <option value="你的工号">江西省</option>
                <option value="你最喜欢的老师">福建省</option>
            </select>
        </div>
        <div class="layui-input-inline">
            <select name="ciy">
                <option value="">请选择市</option>
                <option value="杭州">杭州</option>
                <option value="宁波" disabled="">宁波</option>
                <option value="温州">温州</option>
                <option value="温州">台州</option>
                <option value="温州">绍兴</option>
            </select>
        </div>

    </div>

    <div class="layui-form-item">

        <div class="layui-block"style="margin-right:20px;">
            <label class="layui-form-label">详细地址</label>
            <div class="layui-input-block">
                <input type="text" name="detail" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>

    <div class="layui-form-item layui-form-text"style="margin-right:20px;">
        <label class="layui-form-label">备注</label>
        <div class="layui-input-block">
            <textarea placeholder="请输入内容" class="layui-textarea" name="remark"></textarea>
        </div>
    </div>
    <div class="layui-form-item"style="text-align:center;">
        <button class="layui-btn" lay-submit="" lay-filter="*">保存</button>
        <button class="layui-btn"  >关闭</button>
    </div>
</form>

</body>
<script>


    layui.use(['form', 'layedit', 'laydate'], function(){
        var form = layui.form
                ,layer = layui.layer;
        //监听提交
        form.on('submit(*)', function(data){

            $.ajax({
                url:'client_add_db',
                data:{'_token':'{{csrf_token()}}',
                    'arr':data.field
                },
                dataType:'json',
                type:'post',
                async:false,
                success:function(json_msg){

                }
            });
            return false;
        });





    });




</script>

</html>