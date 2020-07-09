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
                <form class="layui-form">
{{--                    二级分类--}}
{{--                    <div class="layui-form-item">--}}
{{--                        <label class="layui-form-label">父级分类</label>--}}
{{--                        <div class="layui-input-inline">--}}
{{--                            <select name="cate_pid" lay-verify="required">--}}
{{--                                <option value="0">顶级分类</option>--}}
{{--                                @foreach ($list as $v)--}}
{{--                                    @if($data->cate_pid==$v->id)--}}
{{--                                    <option selected value="{{$v->id}}">{{$v->cate_name}}</option>--}}
{{--                                    @else--}}
{{--                                        <option  value="{{$v->id}}">{{$v->cate_name}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    无限极分类--}}
                    <div class="layui-form-item">
                        <label class="layui-form-label">上级分类</label>
                        <div class="layui-input-inline">
                            <select name="cate_pid" lay-verify="required">
                                <option value="0">顶级分类</option>
                                @foreach ($list as $v)
                                    @if($data->cate_pid==$v->id)
                                        <option selected value="{{$v->id}}">{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</option>
                                    @else
                                        <option value="{{$v->id}}">{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>分类名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="cate_name" value="{{$data->cate_name}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>分类别名</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="cate_title" value="{{$data->cate_title}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>排序</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="cate_order" value="{{$data->cate_order}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
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
                        url:'/admin/Category/'+data.field.id,
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