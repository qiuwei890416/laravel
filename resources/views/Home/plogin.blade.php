<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>手机号登录</title>
    @include('Home.Public.style')
    @include('Home.Public.script')
</head>
<body>
<div style="width: 500px;height: 400px;margin: auto;background: #afafaf">
    <form id='biaodan' action="{{ url('/doplogin') }}" method="post">
    {{csrf_field()}}
    <h3 style="text-align: center;font-size: 30px;margin-bottom: 50px;padding-top: 30px;">手机号登录</h3>
        @if (\Session::has('error'))
            <p style="color: red;font-size: 16px;margin-bottom: 10px;margin-left: 30%;"><?php echo \Session::get('error') ?></p>

        @endif
    <p style="margin-bottom: 30px;"><span style="margin-left: 10%;font-size: 25px;">手机号：<input  style="width: 300px;" value="{{old('phone')}}" type="text" name="phone"> </span></p>
    <p style="margin-bottom: 50px;"><span style="margin-left: 10%;font-size: 25px;">密码：<input style="width: 300px;" type="password" name="user_pass"> </span></p>
    <p style="margin-left: 20%;margin-bottom: 20px;">
        <span style="margin-right: 20px;"><button type="submit"  style="background: #0b8fba;width: 50px;height: 40px;font-size: 20px;color:white; ">登录</button></span>
        <span style="margin-right: 20px;"><a href="{{ url('/yxlogin') }}" style="background: #0b8fba;color: white;padding: 7px 10px 7px 10px;font-size: 20px;">邮箱登录</a></span>
        <span><a href="{{ url('/index') }}" style="background: #0b8fba;color: white;padding: 7px 10px 7px 10px;font-size: 20px;">返回首页</a></span>

    </p>
        <p style="margin-left: 30%;">
            <span style="margin-right: 20px;"><a href="{{ url('/pzhuce') }}" style="color: white;font-size: 20px;">手机号注册>></a></span>
{{--            <span style="margin-right: 20px;"><a href="{{ url('/wangjiyx') }}" style="color: white;font-size: 20px;">忘记密码>></a></span>--}}

        </p>
    </form>
</div>

</body>
</html>