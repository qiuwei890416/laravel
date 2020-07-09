<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>邮箱登录</title>
    @include('Home.Public.style')
    @include('Home.Public.script')
</head>
<body>
<div style="width: 500px;height: 400px;margin: auto;background: #afafaf">
    <form action="{{ url('/doyxlogin') }}" method="post">
    {{csrf_field()}}
    <h3 style="text-align: center;font-size: 30px;margin-bottom: 50px;padding-top: 30px;">邮箱登录</h3>
        @if(session('active')=='账号激活成功,请登录')
            <p style="color: green;margin-left: 35%;margin-bottom: 10px;font-size: 20px;">{{session('active') }}</p>
        @elseif (session('active')=='请先登录邮箱激活账号')
            <p style="color: red;margin-left: 35%;margin-bottom: 10px;font-size: 20px;">{{session('active') }}</p>
            @else
            <p style="color: red;margin-left: 35%;margin-bottom: 10px;font-size: 20px;">{{session('active') }}</p>
        @endif

    <p style="margin-bottom: 30px;"><span style="margin-left: 15%;font-size: 25px;">邮箱：<input  style="width: 300px;" type="text" name="email"> </span></p>
    <p style="margin-bottom: 50px;"><span style="margin-left: 15%;font-size: 25px;">密码：<input style="width: 300px;" type="password" name="user_pass"> </span></p>
    <p style="margin-left: 25%;margin-bottom: 20px;">
        <span style="margin-right: 20px;"><button type="submit" style="background: #0b8fba;width: 50px;height: 40px;font-size: 20px;color:white; ">登录</button></span>
        <span style="margin-right: 20px;"><a href="{{ url('/plogin') }}" style="background: #0b8fba;color: white;padding: 7px 10px 7px 10px;font-size: 20px;">手机登录</a></span>
        <span><a href="{{ url('/index') }}" style="background: #0b8fba;color: white;padding: 7px 10px 7px 10px;font-size: 20px;">返回首页</a></span>

    </p>
        <p style="margin-left: 30%;">
            <span style="margin-right: 20px;"><a href="{{ url('/yxzhuce') }}" style="color: white;font-size: 20px;">邮箱注册>></a></span>
            <span style="margin-right: 20px;"><a href="{{ url('/wangjiyx') }}" style="color: white;font-size: 20px;">忘记密码>></a></span>

        </p>
    </form>
</div>
</body>
</html>