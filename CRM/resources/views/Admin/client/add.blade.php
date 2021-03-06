<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no"/>
    <title>新增客户</title>

    <script type="text/javascript" src="/win10/js/jquery-2.2.4.min.js"></script>
    <link href="/win10/component/layer-v3.0.3/Layui/css/layui.css" rel="stylesheet">
    <script type="text/javascript" src="/win10/js/win10.child.js"></script>
    <script type="text/javascript" src="/win10/component/layer-v3.0.3/Layui/layui.js"></script>


</head>
<body>
<form class="layui-form layui-form-pane" action="" style="margin-top: 20px;margin-left: 20px;">

    <div class="layui-form-item">
        <label class="layui-form-label">手机号</label>

        <div class="layui-input-inline">
            <input type="text" name="tel" lay-verify="required" placeholder="请输入" autocomplete="off"
                   class="layui-input">
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
                <select name="type">
                    <option value="1">已成交</option>
                    <option value="2">未成交</option>
                    <option value="3">跟进中</option>
                    <option value="4">有意向</option>
                </select>
            </div>
        </div>
        <div class="layui-inline">
            <label class="layui-form-label">客户级别</label>

            <div class="layui-input-inline">
                <select name="level">
                    <option value="1">vip1</option>
                    <option value="2">vip2</option>
                    <option value="3">vip3</option>
                    <option value="4">vip4</option>
                    <option value="5">vip5</option>
                </select>
            </div>
        </div>
    </div>
    <div class="layui-form-item">
        <div class="layui-inline">
            <label class="layui-form-label">客户来源</label>

            <div class="layui-input-block">
                <select name="detail">
                    <option value="1">电话营销</option>
                    <option value="2">搜索引擎</option>
                    <option value="3">朋友介绍</option>
                    <option value="4">其他来源</option>
                </select>
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
                <select name="position">
                    <option value="1">总监</option>
                    <option value="2">业务员</option>
                    <option value="3">董事长</option>
                    <option value="4">总经理</option>
                </select>
            </div>
        </div>
    </div>


    <div class="layui-form-item">
        <label class="layui-form-label">所在地区</label>

        <div class="layui-input-inline">
            <select name="pro" id="pro" lay-filter="test">
                <option value="1">请选择省</option>
                @foreach( $region as $v )
                    <option value="{{$v->region_id}}">{{$v->region_name}}</option>
                @endforeach

            </select>
        </div>
        <div class="layui-input-inline">
            <select name="ciy" id="ciy">

            </select>
        </div>

    </div>

    <div class="layui-form-item">

        <div class="layui-block" style="margin-right:20px;">
            <label class="layui-form-label">详细地址</label>

            <div class="layui-input-block">
                <input type="text" name="detail" autocomplete="off" class="layui-input">
            </div>
        </div>
    </div>

    <div class="layui-form-item layui-form-text" style="margin-right:20px;">
        <label class="layui-form-label">备注</label>

        <div class="layui-input-block">
            <textarea placeholder="请输入内容" class="layui-textarea" name="remark"></textarea>
        </div>
    </div>
    <div class="layui-form-item" style="text-align:center;">
        <button class="layui-btn" lay-submit="" lay-filter="*">保存</button>
        <button class="layui-btn" id="colse">关闭</button>
    </div>
</form>

</body>
<script>


    layui.use(['form', 'layedit', 'laydate'], function () {
        var form = layui.form
                , layer = layui.layer;
        //监听提交
        form.on('submit(*)', function (data) {

            $.ajax({
                url: 'client_add_db',
                data: {
                    '_token': '{{csrf_token()}}',
                    'arr': data.field
                },
                dataType: 'json',
                type: 'post',
                async: false,
                success: function (json_msg) {
                    if (json_msg.code == '1000') {
                        layui.layer.msg(json_msg.font, {icon: 6});

                    } else {
                        layui.layer.msg(json_msg.font, {icon: 5});
                    }
                }
            });
            return false;
        });

        //选择省的内容改变事件
        form.on('select(test)', function (data) {
//            console.log(data.elem); //得到select原始DOM对象
//            console.log(data.value); //得到被选中的值
//            console.log(data.othis); //得到美化后的DOM对象

            var region_id = data.value;
            var _tr = '<option value="">请选择市</option>';
            $.ajax({
                url: 'get_region',
                data: {
                    '_token': '{{csrf_token()}}',
                    'region_id': region_id
                },
                dataType: 'json',
                type: 'post',
                async: false,
                success: function (json_msg) {
                    for( v in json_msg.region){

                        _tr += '<option value="'+json_msg.region[v]['region_id']+'">'
                                +json_msg.region[v]['region_name']
                                +'</option>';
                    }


                }

            });
            //赋值
            $('#ciy').append(_tr);
            form.render('select');


        });


    });
//    点击关闭按钮
    $('#colse').click(function(){
        window.Win10_child.close();
    })


</script>

</html>