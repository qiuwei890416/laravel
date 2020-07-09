<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>欢迎页面-X-admin2.2</title>
        <meta name="renderer" content="webkit">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        @include('Admin/Public/style')
        @include('Admin/Public/script')
    </head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form"  id="art_form" enctype="multipart/form-data">
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>标题</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" value="{{$data->conf_title}}" name="conf_title" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>名称</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" value="{{$data->conf_name}}" name="conf_name" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">内容</label>
                        <div class="layui-input-block">
                            <textarea style="width: 90%;" name="conf_content"  placeholder="请输入内容" class="layui-textarea">{{$data->conf_content}}</textarea>
                        </div>
                    </div>
                    {{csrf_field()}}

                    <div class="layui-form-item">
                        <label class="layui-form-label">类型</label>
                        <div class="layui-input-inline">
                            @if($data->fiele_type=='input')
                                <input type="radio" checked name="fiele_type" value="input" title="输入框">
                                @else
                                <input type="radio" name="fiele_type" value="input" title="输入框">
                            @endif()
                                @if($data->fiele_type=='textarea')
                                    <input type="radio" checked name="fiele_type" value="textarea" title="文本域" >
                                @else
                                    <input type="radio" name="fiele_type" value="textarea" title="文本域" >
                                @endif()
                                @if($data->fiele_type=='radio')
                                    <input type="radio" checked name="fiele_type" value="radio" title="单选按钮" >
                                @else
                                    <input type="radio" name="fiele_type" value="radio" title="单选按钮" >
                                @endif()

                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">说明</label>
                        <div class="layui-input-block">
                            <textarea style="width: 90%;"  name="fiele_value" placeholder="请输入内容" class="layui-textarea">{{$data->fiele_value}}</textarea>
                        </div>
                    </div>



                    <input type="hidden"  name="id" value="{{$data->id}}" required=""  autocomplete="off" class="layui-input">

                     <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" lay-filter="edit" lay-submit="">修改</button>
                    </div>
                </form>
            </div>
        </div>
        <script>layui.use(['form', 'layer'],
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
                form.on('submit(edit)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                        url:'/admin/Config/'+data.field.id,
                        type:'PUT',
                        timeout:"3000",
                        dataType : 'json',
                        cache:"false",
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        data:data.field,
                        success:function(data){
                            console.log(data);
                            if(data.status==0){
                                layer.alert(data.message, {
                                        icon: 6
                                    },
                                    function() {
                                        //关闭当前frame
                                        xadmin.close();

                                        // 可以对父窗口进行刷新
                                        xadmin.father_reload();
                                    });
                            }else{
                                layer.alert(data.message, {
                                        icon: 5
                                    },
                                    function(index) {
                                        layer.close(index);


                                    });
                            }



                        },
                        error:function(err){
                            console.log(err);
                        }
                    });
                    return false;
                });

            });</script>
        <script>var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();</script>
    </body>

</html>