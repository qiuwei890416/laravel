<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机号注册</title>
    @include('Home.Public.style')
    @include('Home.Public.script')
</head>
<body>
<div style="width: 500px;height: 400px;margin: auto;background: #afafaf">
    <form id='biaodan' action="{{ url('/dopzhuce') }}" method="post">
    {{csrf_field()}}
    <h3 style="text-align: center;font-size: 30px;margin-bottom: 50px;padding-top: 30px;">手机号注册</h3>
        @if (\Session::has('error'))
            <p style="color: red;font-size: 16px;margin-bottom: 10px;margin-left: 30%;"><?php echo \Session::get('error') ?></p>

        @endif
    <p style="margin-bottom: 30px;"><span style="margin-left: 10%;font-size: 25px;">手机号：<input  style="width: 300px;" type="text" value="{{old('phone')}}" name="phone"> </span></p>
    <p style="margin-bottom: 30px;"><span style="margin-left: 10%;font-size: 25px;">短信验证码：<input id="coy" style="width: 100px;" type="text" ></span><span style="margin-left: 10px;"><button id="code" style="font-size: 20px;" type="button">获取验证码</button></span></p>
    <p style="margin-bottom: 50px;"><span style="margin-left: 10%;font-size: 25px;">密码：<input style="width: 300px;" type="password" name="user_pass"> </span></p>
    <p style="margin-left: 30%;margin-bottom: 20px;">
        <span style="margin-right: 20px;"><button type="button" id="tijiao" style="background: #0b8fba;width: 50px;height: 40px;font-size: 20px;color:white; ">注册</button></span>
        <span><a href="{{ url('/plogin') }}" style="background: #0b8fba;color: white;padding: 7px 10px 7px 10px;font-size: 20px;">返回手机登录页</a></span>

    </p>
{{--        <p style="margin-left: 30%;">--}}
{{--            <span style="margin-right: 20px;"><a href="{{ url('/yxzhuce') }}" style="color: white;font-size: 20px;">邮箱注册>></a></span>--}}
{{--            <span style="margin-right: 20px;"><a href="{{ url('/wangjiyx') }}" style="color: white;font-size: 20px;">忘记密码>></a></span>--}}

{{--        </p>--}}
    </form>
</div>
<script>
    $(document).ready(function() {
        var code='';
        //发送短信验证码60秒倒计时
        var count=60;
        function settime(){
            if(count==0){
                $('#code').text('获取验证码');
                $('#code').removeAttr('disabled');
                count=60;

            }else{
                $('#code').attr('disabled','disabled');
                $('#code').text('重新发送('+count+ 's)');
                count--;
                // 1秒运行一次
                setTimeout(function () {
                    settime();
                },1000)
            }
        }
        $("#code").click(function() {
            var phone=$('input[name="phone"]').val();
            if(phone==''){
                layer.msg('手机号不为空', {icon: 5},{time: 3000});
                return;

            }

            $.ajax({
                type: 'POST',
                dataType: 'json',
                url: 'http://www.boke.com/ytxsms/SendTemplateSMS.php',
                // url: 'phone',
                data:{
                    phone:phone,
                },
                cache: false,
                success: function(data){
                    console.log(data.errcode);
                    if(data.errcode=='100'){
                        code=data.num;
                        layer.msg('验证码发送成功', {icon: 1},{time: 3000});
                        settime();
                    }else{
                        layer.msg(data.msg, {icon: 2},{time: 3000});
                    }

                }
            });

        });

        $("#tijiao").click(function(){

            var phone=$('input[name="phone"]').val();
            var user_pass=$('input[name="user_pass"]').val();
            var coy=$('#coy').val();
            if(phone!=''&&user_pass!=''&&coy!=''){
                if(coy==code){
                    $('#biaodan').submit();
                }else{
                    layer.msg('短信验证码错误', {icon: 2},{time: 3000});
                }
            }else{
                layer.msg('手机号，密码，短信验证码不为空。', {icon: 2},{time: 3000});
            }


        });
    });
</script>
</body>
</html>