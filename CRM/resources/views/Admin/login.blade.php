<style>
    .login{
        margin-left: 40%;
        margin-top:20%;
    }
    .login input{
        width:220px;
        height:30px;
        margin-top:20px;
    }
    .login button{
        width:100px;
        height:30px;
        background:lightblue;
        border:none;
        margin-top:10px;
        margin-left:70px;
        border-radius: 6px;
        color:#fff;
    }
    .login span{
        margin-left:110px;
    }
</style>
<div class="login">
    <span>登陆</span><br>
    账号：<input type="text" placeholder="请输入你的账号" class="account"><br>
    密码：<input type="password" placeholder="请输入你的密码" class="pwd"><br>
    <button type="button">登录</button>
</div>
<script src="/jquery-3.2.1.min.js"></script>
<script>
    $('[type=button]').on('click',function(){
        var account = $('.account').val();
        var pwd = $('.pwd').val();
        $.ajax({
            url:'login_do',
            data:'account='+account+'&pwd='+pwd+'&_token='+'{{csrf_token()}}',
            type:'post',
            dataType:'json',
            success:function(json_info){
                if(json_info.status==100){
                    alert(json_info.msg);
                    window.location.href = 'index';
                }else{
                    alert(json_info.msg);
                }
            }
        })
    })
</script>