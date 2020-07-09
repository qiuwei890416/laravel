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

        <style type="text/css">
            .uploader-list {
                margin-left: -15px;
            }
            .uploader-list .info {
                position: relative;
                margin-top: -25px;
                background-color: black;
                color: white;
                filter: alpha(Opacity=80);
                -moz-opacity: 0.5;
                opacity: 0.5;
                width: 100px;
                height: 25px;
                text-align: center;
                display: none;
            }

            .uploader-list .handle {
                position: relative;
                background-color: black;
                color: white;
                filter: alpha(Opacity=80);
                -moz-opacity: 0.5;
                opacity: 0.5;
                width: 100px;
                text-align: right;
                height: 18px;
                margin-bottom: -18px;
                display: none;
            }
            .uploader-list .handle i {
                margin-right: 5px;
            }
            .uploader-list .handle i:hover {
                cursor: pointer;
            }
            .uploader-list .file-iteme {
                margin: 12px 0 0 15px;
                padding: 1px;
                float: left;
            }
        </style>
    </head>
    
    <body>
        <div class="layui-fluid">
            <div class="layui-row">
                <form class="layui-form"  id="art_form" enctype="multipart/form-data">
{{--                    二级分类--}}
{{--                    <div class="layui-form-item">--}}
{{--                        <label class="layui-form-label">文章分类</label>--}}
{{--                        <div class="layui-input-inline">--}}
{{--                            <select name="cate_id" lay-verify="required">--}}
{{--                                @foreach ($list as $v)--}}
{{--                                    @if($data->cate_id==$v->id)--}}
{{--                                    <option value="{{$v->id}}" selected>{{$v->cate_name}}</option>--}}
{{--                                    @else--}}
{{--                                        <option value="{{$v->id}}">{{$v->cate_name}}</option>--}}
{{--                                    @endif--}}
{{--                                @endforeach--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                    </div>--}}

{{--                        无限极分类--}}
                    <div class="layui-form-item">
                        <label class="layui-form-label">文章分类</label>
                        <div class="layui-input-inline">
                            <select name="cate_id" lay-verify="required">
                                @foreach ($list as $v)
                                    @if($data->cate_id==$v->id)
                                        <option selected value="{{$v->id}}">{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</option>
                                    @else
                                        <option  value="{{$v->id}}">{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</option>


                                    @endif
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>文章标题</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="art_title" value="{{$data->art_title}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>

                    <div class="layui-form-item">
                        <label for="L_username" class="layui-form-label">
                            <span class="x-red">*</span>文章作者</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="art_editor" value="{{$data->art_editor}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">关键词</label>
                        <div class="layui-input-inline">
                            <input type="text" id="L_username" name="art_tag" value="{{$data->art_tag}}" required="" lay-verify="nikename" autocomplete="off" class="layui-input">
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章描述</label>
                        <div class="layui-input-block">
                            <textarea style="width: 90%;" name="art_description"  placeholder="请输入内容" class="layui-textarea">{{$data->art_description}}</textarea>
                        </div>
                    </div>
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">缩略图</label>
                        <div class="layui-input-block layui-upload">
                            <input type="hidden" name="art_thumb" id="img1" value="" class="hidden">

                            <input type="hidden" name="art_thumb_old" value="{{$data->art_thumb}}" class="hidden">

                            <button type="button" class="layui-btn" id="test1">
                                <i class="layui-icon">&#xe67c;</i>上传图片
                            </button>
                            <input type="file" name="photo" id="photo_upload" style="display: none;">
                        </div>
                    </div>
                    {{csrf_field()}}
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label"></label>
                        <div class="layui-input-block">
                            {{--方法4--}}
{{--                            <img src="{{env('QINIU_DOMAIN')}}{{$data->art_thumb}}" alt="" id="art_thumb_img" style="width: 200px;">--}}
                            {{--方法1--}}
                            <img src="/{{$data->art_thumb}}" alt="" id="art_thumb_img" style="width: 200px;">
                            {{--方法5--}}
{{--                            <img src="{{env('ALIOSS_DOMAIN')}}{{$data->art_thumb}}" alt="" id="art_thumb_img" style="width: 200px;">--}}

                        </div>
                    </div>
                    <input type="hidden" name="chongchuan" value="0">
                    <input type="hidden" name="thumball_old" value="{{$data->thumball}}">
                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">多图上传</label>
                        <div class="layui-input-block">
                            <button class="layui-btn" id="test2" type="button">多图上传</button>
                            <blockquote class="layui-elem-quote layui-quote-nm" style="margin-top: 10px;">
                                预览图：
                                <div class="layui-upload-list uploader-list" style="overflow: auto;" id="uploader-list">
                                    @if(count($data->thumbarr)!=0)
                                        @foreach ($data->thumbarr as $v)
                                            <div class="file-iteme">
                                                <div class="handle">
                                                    <i class="layui-icon layui-icon-delete">删除</i>
                                                </div>
                                                <input name="thumball[]" type="hidden" value="{{$v}}">
                                                <img src="/{{$v}}"  class="layui-upload-img" style="width: 100px;height: 100px">
                                            </div>
                                        @endforeach
                                    @endif
                                </div>

                            </blockquote>
                        </div>
                    </div>

                    <div class="layui-form-item layui-form-text">
                        <label class="layui-form-label">文章内容</label>
                        <div class="layui-input-block">
                            <!-- 加载编辑器的容器 -->
                            <textarea id="content" style="width: 95%;height: 400px;" name="art_content" placeholder="请输入内容">{{$data->art_content}}</textarea>
                            <!-- 配置文件 -->
                            <script type="text/javascript" src="{{ URL::asset('ueditor/ueditor.config.js') }}"></script>
                            <!-- 编辑器源码文件 -->
                            <script type="text/javascript" src="{{ URL::asset('ueditor/ueditor.all.js') }}"></script>
                            <script type="text/javascript" src="{{ URL::asset('ueditor/lang/zh-cn/zh-cn.js') }}"></script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('content',{
                                    allowDivTransToP: false
                                });

                            </script>
                        </div>
                    </div>
                    <div class="layui-form-item">
                        <label class="layui-form-label">是否推荐</label>
                        <div class="layui-input-inline">
                            @if($data->art_status==1)
                                <input type="radio" name="art_status" value="1" checked title="是">
                                <input type="radio" name="art_status" value="2" title="否" >
                            @else
                                <input type="radio" name="art_status" value="1"  title="是">
                                <input type="radio" name="art_status" value="2" title="否" checked >
                            @endif

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
        <script>layui.use(['form', 'layer','upload'],
            function() {
                $ = layui.jquery;
                var form = layui.form,
                layer = layui.layer;
                var upload=layui.upload;
                $('#test1').on("click", function() {
                    $('#photo_upload').trigger('click');
                    $('#photo_upload').on("change", function() {
                        var obj=this;
                        var formData=new FormData($('#art_form')[0]);


                        $.ajax({
                            url: '/admin/Article/upload',
                            type: 'POST',
                            cache: false,
                            data: formData,
                            processData: false,    //不需要对数据做任何预处理
                            contentType: false,    //不设置数据格式
                            success:function(data){
                                console.log(data);
                                if(data['status']=='100'){
                                    var ur=data['resultdata'];
                                    console.log(ur);
                                    //方法一
                                     $('#art_thumb_img').attr('src','/'+ur);
                                    //方法二。三
                                    // $('#art_thumb_img').attr('src','/uploads/'+ur);
                                    //方法4
                                    {{--$('#art_thumb_img').attr('src','{{env('QINIU_DOMAIN')}}'+ur);--}}
                                    //方法5
                                    {{--$('#art_thumb_img').attr('src','{{env('ALIOSS_DOMAIN')}}'+ur);--}}
                                    $('input[name=art_thumb]').val(data.resultdata);
                                    $(obj).off('change');
                                }else{
                                    alert(data['resultdata']);
                                }
                            },
                            error:function(XMLHttpRequest,textStatus,errorThrown){
                                var number=XMLHttpRequest.status;
                                var info="错误号"+number+"文件上传失败!";
                                alert(info);
                            },
                            async:true

                        });
                    });
                });
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
//多图片上传

                upload.render({
                    elem: '#test2',
                    url: '/admin/Article/uploadduo', //改成您自己的上传接口
                    multiple: true,
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    choose: function(obj){
                        var ids=[];
                        var i=0;
                        $(".duo").each(function(){
                            ids[i]=$(this).val();
                            i++;
                        });
                        if(i!=0){
                            var idall=ids.toString()
                            $.post("{{url('admin/Article/duotushanc')}}",{"_token":"{{ csrf_token() }}",'wenjian':idall},function (data) {
                                if(data.status==0){

                                }else{
                                    layer.msg(data.message,{icon:5,time:3000});
                                }
                            })
                        }

                        $('#uploader-list').html('');
                        $('input[name=chongchuan]').val(1);
                    },
                    /* ,bindAction:'#submitbtn'*/
                    before: function(obj){
                        layer.load(); //上传loading
                        //预读本地文件示例，不支持ie8
                        obj.preview(function(index, file, result){

                            $('#uploader-list').append( '<div class="file-iteme">' +
                                '<div class="handle"><i class="layui-icon layui-icon-delete">删除</i></div>' +
                                '<input name="thumball[]" type="hidden" id="'+index+'"><img src="'+ result +'" alt="'+ file.name +'" class="layui-upload-img" style="width: 100px;height: 100px">'+
                                '</div>'
                            )
                        });
                    },
                    done: function(res,index,upload){
                        layer.closeAll('loading'); //关闭loading
                        //上传完毕

                        if(res['status']=='100'){
                            $('#'+index).val(res['resultdata']);

                        }else{
                            upload();
                        }
                    },
                    error: function(index, upload){
                        var demoText = $('#demoText');
                        layer.closeAll('loading');
                        demoText.html('<span style="color: #FF5722;">上传失败</span> <a class="layui-btn layui-btn-xs demo-reload">重试</a>');
                        demoText.find('.demo-reload').on('click', function () {
                            var ids=[];
                            var i=0;
                            $(".duo").each(function(){
                                ids[i]=$(this).val();
                                i++;
                            });
                            if(i!=0){
                                var idall=ids.toString()
                                $.post("{{url('admin/Article/duotushanc')}}",{"_token":"{{ csrf_token() }}",'wenjian':idall},function (data) {
                                    if(data.status==0){

                                    }else{
                                        layer.msg(data.message,{icon:5,time:3000});
                                    }
                                })
                            }
                            upload();
                        });
                        //关闭loading
                        //当上传失败时，你可以生成一个“重新上传”的按钮，点击该按钮时，执行 upload() 方法即可实现重新上传

                    }
                });
                //监听提交
                form.on('submit(edit)',
                function(data) {
                    console.log(data);
                    //发异步，把数据提交给php
                    $.ajax({
                        url:'/admin/Article/'+data.field.id,
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

            });

            $(document).on("mouseenter mouseleave", ".file-iteme", function(event){

                if(event.type === "mouseenter"){

                    //鼠标悬浮
                    $(this).children(".info").fadeIn("fast");

                    $(this).children(".handle").fadeIn("fast");
                }else if(event.type === "mouseleave") {

                    //鼠标离开

                    $(this).children(".info").hide();

                    $(this).children(".handle").hide();

                }

            });

            // 删除图片
            $(document).on("click", ".file-iteme .handle", function(event){
                var _this=$(this);
                $.post("{{url('admin/Article/duotushan')}}",{"_token":"{{ csrf_token() }}",'wenjian':$(this).next('input').val()},function (data) {
                    if(data.status==0){
                        _this.parent().remove();
                    }else{
                        layer.msg(data.message,{icon:5,time:3000});
                    }
                })

            });
        </script>
        <script>
            var _hmt = _hmt || []; (function() {
                var hm = document.createElement("script");
                hm.src = "https://hm.baidu.com/hm.js?b393d153aeb26b46e9431fabaf0f6190";
                var s = document.getElementsByTagName("script")[0];
                s.parentNode.insertBefore(hm, s);
            })();
        </script>
    </body>

</html>