<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>重置密码</title>
    @include('Home.Public.style')
    @include('Home.Public.script')
</head>
<body>
<div style="width: 500px;height: 400px;margin: auto;background: #afafaf">
    <form action="{{ url('/doyxchongzhi') }}" method="post">
    {{csrf_field()}}
    <h3 style="text-align: center;font-size: 30px;margin-bottom: 50px;padding-top: 30px;">重置密码</h3>
        @if (\Session::has('error'))
           <p style="color: red;font-size: 16px;margin-bottom: 10px;margin-left: 30%;"><?php echo \Session::get('error') ?></p>

        @endif
        <input type="hidden" value="{{ $data->id }}" name="id">
    <p style="margin-bottom: 30px;"><span style="margin-left: 15%;font-size: 25px;">邮箱：<input readonly value="{{ $data->email }}" style="width: 300px;" type="text" name="email"> </span></p>
    <p style="margin-bottom: 50px;"><span style="margin-left: 15%;font-size: 25px;">密码：<input style="width: 300px;" type="password" name="user_pass"> </span></p>
    <p style="margin-left: 35%;">
        <span style="margin-right: 20px;"><button type="submit" style="background: #0b8fba;width: 50px;height: 40px;font-size: 20px;color:white; ">提交</button></span>
        <span><a href="{{ url('/yxlogin') }}" style="background: #0b8fba;color: white;padding: 7px 10px 7px 10px;font-size: 20px;">返回登录页</a></span>
    </p>
    </form>
</div>
</body>
</html>