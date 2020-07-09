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
                <form class="layui-form" action="{{ url('admin/Role/doauth') }}" method="post">
{{--                    <div class="layui-form-item">--}}
{{--                        <label for="L_email" class="layui-form-label">--}}
{{--                            <span class="x-red">*</span>邮箱</label>--}}
{{--                        <div class="layui-input-inline">--}}
{{--                            <input type="text" id="L_email" name="email" required="" lay-verify="email" autocomplete="off" class="layui-input"></div>--}}
{{--                        <div class="layui-form-mid layui-word-aux">--}}
{{--                            <span class="x-red">*</span>将会成为您唯一的登入名</div></div>--}}
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>角色名称</label>
                        <div class="layui-input-inline">
                            <input type="hidden" name="role_id" value="{{$role->id}}">
                            <input type="text" readonly id="L_username" value="{{$role->role_name}}" name="role_name" required="" lay-verify="nikename" autocomplete="off" class="layui-input"></div>
                    </div>
                    {{csrf_field()}}
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">
                            拥有权限
                        </label>

                        <table  class="layui-table layui-input-block " style="width: 90%">
                            <tbody>
                            @foreach($permission as $v)
                            <tr>
                                <td>
                                    @if (in_array($v->id, $own_permid))
                                        <input class="father"  type="checkbox" checked name="permission_id[]" lay-skin="primary" value="{{$v->id}}" lay-filter="father" title="{{$v->per_name}}">
                                    @else
                                        <input class="father" type="checkbox" name="permission_id[]" title="{{$v->per_name}}" value="{{$v->id}}" lay-skin="primary" lay-filter="father">
                                    @endif
                                </td>
                                <td>
                                    <div class="layui-input-block">
                                        @foreach($v->zi as $val)
                                            @if (!empty($val))
                                                @if (in_array($val->id, $own_permid))
                                                    <input class="child" name="permission_id[]" checked title="{{$val->per_name}}" value="{{$val->id}}" lay-filter="child"  lay-skin="primary" type="checkbox">
                                                @else
                                                    <input class="child" name="permission_id[]"  title="{{$val->per_name}}" value="{{$val->id}}" lay-filter="child"  lay-skin="primary" type="checkbox">
                                                @endif
                                            @endif
                                        @endforeach

                                    </div>
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>


                    </div>
{{--                    <div class="layui-form-item layui-form-text">--}}
{{--                        <label class="layui-form-label">角色权限</label>--}}
{{--                        <div class="layui-input-block">--}}
{{--                            @foreach($permission as $v)--}}
{{--                                @if (in_array($v->id, $own_permid))--}}
{{--                                    <input type="checkbox" checked name="permission_id[]" title="{{$v->per_name}}" value="{{$v->id}}" lay-skin="primary">--}}
{{--                                @else--}}
{{--                                    <input type="checkbox" name="permission_id[]" title="{{$v->per_name}}" value="{{$v->id}}" lay-skin="primary">--}}
{{--                                @endif--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
                    <div class="layui-form-item">
                        <label for="L_repass" class="layui-form-label"></label>
                        <button class="layui-btn" type="submit">授权</button>
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
                form.on('checkbox(child)', function(data){
                    console.log(data);
                    if(data.elem.checked){
                        $(this).prop("checked", true);
                        $(this).parent().parent().parent().find('.father').prop("checked", true);
                        form.render();
                    }else{
                        $(this).prop("checked", false);
                        var a=[];
                        var i=0;
                        $(data.elem).parent().find('input').each(function(){
                            if($(this).prop('checked')){
                                a[i]=1
                            }else{
                                a[i]=0
                            }
                            i++;
                        });
                        console.log(a);
                        var fan=0;
                        for(var i = 0;i<a.length;i++){
                            if(a[0]==a[i]&&a[0]==0){
                                fan=1;
                            }else{
                                fan=0;
                            }

                        }
                        if(fan==1){
                            $(this).parent().parent().parent().find('.father').prop("checked", false);
                        }



                        form.render();
                    }
                });

                form.on('checkbox(father)', function(data){

                    if(data.elem.checked){
                        $(data.elem).parent().siblings('td').find('input').prop("checked", true);
                        form.render();
                    }else{
                        $(data.elem).parent().siblings('td').find('input').prop("checked", false);
                        form.render();
                    }
                });
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