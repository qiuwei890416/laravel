<!DOCTYPE html>
<html class="x-admin-sm">
    
    <head>
        <meta charset="UTF-8">
        <title>添加用户</title>
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        @include('Admin/Public/style')
        @include('Admin/Public/script')
    </head>
    <body style="background: white;">
        <div class="layui-fluid">
            <div class="layui-row">
                <form id="form" class="layui-form" action="{{ url('admin/User/doauth') }}" method="post">
{{--                    <div class="layui-form-item">--}}
{{--                        <label for="L_email" class="layui-form-label">--}}
{{--                            <span class="x-red">*</span>邮箱</label>--}}
{{--                        <div class="layui-input-inline">--}}
{{--                            <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input"></div>--}}
{{--                        <div class="layui-form-mid layui-word-aux">--}}
{{--                            <span class="x-red">*</span>将会成为您唯一的登入名</div></div>--}}
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>用户名</label>
                        <div class="layui-input-inline">
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <input type="text" readonly id="L_username" value="{{$user->user_name}}" name="user_name" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                    </div>
                    {{csrf_field()}}
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">用户角色</label>
                        <div class="layui-input-block">
                            @foreach($role as $v)
                                @if (in_array($v->id, $own_permid))
                                    @if($user->id==1)
                                        <span style="pointer-events:none;"><input class="danxuan" type="checkbox" checked name="role_id[]" title="{{$v->role_name}}" value="{{$v->id}}" lay-skin="primary"></span>
                                    @else
                                        <input type="checkbox" class="danxuan" checked name="role_id[]" title="{{$v->role_name}}" value="{{$v->id}}" lay-skin="primary">

                                    @endif

                                @else
                                    <input type="checkbox" class="danxuan" name="role_id[]" title="{{$v->role_name}}" value="{{$v->id}}" lay-skin="primary">
                                @endif
                            @endforeach
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" id="tijiao" type="button">授权</button>
                        <button class="layui-btn" id="back" type="button">返回</button>
                    </div>
                </form>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $('#back').click(function() {
                    window.history.go(-1);
                });
                $('#tijiao').click(function() {
                    var a=[];
                    var i=0;
                    $('.danxuan').each(function(){
                        if($(this).prop('checked')){
                            a[i]=1
                        }else{
                            a[i]=0
                        }
                        i++;
                    });
                    $('#form').submit();
                    // var r=0;
                    // for (i = 0; i < a.length; i++) {
                    //     if(a[i]==1){
                    //         r++;
                    //     }
                    //
                    // }
                    // console.log(r);
                    // if(r==1||r==0){
                    //     $('#form').submit();
                    // }else{
                    //     layer.alert('只能选择一个角色', {
                    //             icon: 2
                    //         },
                    //         function(index) {
                    //             layer.close(index);
                    //
                    //         });
                    // }
                });


            });
            layui.use(['form', 'layer','jquery'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;

                //自定义验证规则
                // form.verify({
                //     nikename: function(value) {
                //         if (value.length < 5) {
                //             return '昵称至少得5个字符啊';
                //         }
                //     },
                //     pass: [/(.+){6,12}$/, '密码必须6到12位'],
                //     repass: function(value) {
                //         if ($('#L_pass').val() != $('#L_repass').val()) {
                //             return '两次密码不一致';
                //         }
                //     }
                // });

                //监听提交
                // form.on('submit(add)',
                // function(data) {
                //     console.log(data);
                //     //发异步，把数据提交给php
                //     $.ajax({
                //         url:'/admin/Role',
                //         type:'post',
                //         timeout:"3000",
                //         dataType : 'json',
                //         cache:"false",
                //         headers: {
                //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                //         },
                //         data:data.field,
                //         success:function(data){
                //             console.log(data);
                //             if(data.status==0){
                //                 layer.alert(data.message, {
                //                         icon: 6
                //                     },
                //                     function() {
                //                         //关闭当前frame
                //                         xadmin.close();
                //
                //                         // 可以对父窗口进行刷新
                //                         xadmin.father_reload();
                //                     });
                //             }else if(data.status==1){
                //                 layer.alert(data.message, {
                //                         icon: 5
                //                     },
                //                     function(index) {
                //                         layer.close(index);
                //
                //
                //                     });
                //             }else if(data.status==2){
                //                 layer.alert(data.message, {
                //                         icon: 2
                //                     },
                //                     function(index) {
                //                         layer.close(index);
                //
                //                     });
                //             }
                //
                //
                //
                //         },
                //         error:function(err){
                //             console.log(err);
                //         }
                //     });

                    // return false;
                // });

            });
        </script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>