<!doctype html>
<html  class="x-admin-sm">
<head>
	<meta charset="UTF-8">
	<title>后台登录</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    @include('Admin/Public/style')
    @include('Admin/Public/script')
</head>
<body class="login-bg">
    
    <div class="login layui-anim layui-anim-up">
        <div class="message">后台管理系统</div>
        <div id="darkbannerwrap"></div>
        @if (\Session::has('error'))
            <div style="color: red;font-size: 16px;margin-bottom: 10px;"><?php echo \Session::get('error') ?></div>

        @endif
        <form method="post" action="{{ url('admin/Login/dologin') }}" class="layui-form" >
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">
            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
            <input name="code" style="width: 150px;float: left" lay-verify="required" placeholder="验证码"  type="text" class="layui-input">

            <img style="float: right" onclick="this.src='{{ url('admin/Login/code') }}?'+Math.random()" id="code"  src="{{ url('admin/Login/code') }}">
            <hr class="hr15">
{{--            <input name="code" lay-verify="required" placeholder="验证码"  type="text" class="layui-input" style="height: 40px;width: 150px;float: left;">--}}
{{--            <a onclick="javascript:re_captcha()" style="margin-left: 60px">--}}
{{--                <img src="{{URL('admin/Login/captcha/1')}}" alt="" id="127ddf0de5a04167a9e427d883690ff6">--}}
{{--            </a>--}}
            {{csrf_field()}}
            <hr class="hr15">
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >
        </form>
    </div>
    <script type="text/javascript">
        //自带验证码刷新
        function re_captcha() {
            $url = "{{URL('admin/Login/captcha')}}";
            $url = $url+"/"+Math.random();
            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $url;
        }
    </script>
    <script>
        {{--$(function  () {--}}
        {{--    layui.use('form', function(){--}}
        {{--      var form = layui.form;--}}
        {{--      // layer.msg('玩命卖萌中', function(){--}}
        {{--      //   //关闭后的操作--}}
        {{--      //   });--}}
        {{--      //监听提交--}}
        {{--      form.on('submit(login)', function(data){--}}
        {{--        // alert(888)--}}
        {{--        layer.msg(JSON.stringify(data.field),function(){--}}
        {{--            location.href="{{ url('admin/Login/dologin') }}";--}}
        {{--        });--}}
        {{--        return false;--}}
        {{--      });--}}
        {{--    });--}}
        {{--})--}}
    </script>
    <!-- 底部结束 -->
    <script>
    //百度统计可去掉
    var _hmt = _hmt || [];
    (function() {
      var hm = document.createElement("script");
      hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
      var s = document.getElementsByTagName("script")[0]; 
      s.parentNode.insertBefore(hm, s);
    })();
    </script>
</body>
</html>