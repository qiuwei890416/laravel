<!DOCTYPE html>
<html class="x-admin-sm">
    <head>
        <meta charset="UTF-8">
        <title>用户列表</title>
        <meta name="renderer" content="webkit">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
        @include('Admin/Public/style')
        @include('Admin/Public/script')
    </head>
    <body>
        <div class="x-nav">
          <span class="layui-breadcrumb">
            <a href="">首页</a>
            <a href="">演示</a>
            <a>
              <cite>导航元素</cite></a>
          </span>
          <a class="layui-btn layui-btn-small" style="line-height:1.6em;margin-top:3px;float:right" onclick="location.reload()" title="刷新">
            <i class="layui-icon layui-icon-refresh" style="line-height:30px"></i></a>
        </div>
        <div class="layui-fluid">
            <div class="layui-row layui-col-space15">
                <div class="layui-col-md12">
                    <div class="layui-card">
                        <div class="layui-card-body ">

                        </div>
                        <div class="layui-card-header">
                            <button class="layui-btn layui-btn-danger" onclick="delAll()"><i class="layui-icon"></i>批量删除</button>
                            <button class="layui-btn" onclick="xadmin.open('添加分类','{{url('admin/Category/create')}}',600,400)"><i class="layui-icon"></i>添加</button>
                        </div>
                        <div class="layui-card-body layui-table-body layui-table-main">
                            <table class="layui-table layui-form">
                                <thead>
                                  <tr>
                                    <th>
                                      <input type="checkbox" lay-filter="checkall" name="" lay-skin="primary">
                                    </th>
                                    <th>ID</th>
                                    <th>分类名</th>
                                      <th>分类别名</th>
                                      <th>排序</th>

                                    <th>操作</th></tr>
                                </thead>
                                <tbody>
                                @foreach ($list as $v)
                                    <tr>
                                        <td>

                                            <input  type="checkbox" value="{{$v->id}}" data-id="{{$v->id}}"  lay-skin="primary">
                                        </td>
                                        <td>{{$v->id}}</td>
{{--                                        二级分类--}}
{{--                                        <td>{{$v->cate_name}}</td>--}}
{{--                                        无限极分类--}}
                                        <td>{{str_repeat('|----',$v->level)}}{{$v->cate_name}}</td>
                                        <td>{{$v->cate_title}}</td>
                                        <td>
                                            <input onchange="paixu(this,{{$v->id}})" type="text" style="width: 50px;" name="cate_order" value="{{$v->cate_order}}" data-id="{{$v->id}}" required  lay-verify="required" autocomplete="off" class="layui-input paixu">
                                        </td>

{{--                                            <a onclick="member_stop(this,'10001')" href="javascript:;"  title="启用">--}}
{{--                                                <i class="layui-icon">&#xe601;</i>--}}
{{--                                            </a>--}}
                                        <td>

                                            <a title="编辑"  onclick="xadmin.open('编辑','{{url('admin/Category/'.$v->id.'/edit')}}',600,400)" href="javascript:;">
                                                <i class="layui-icon">&#xe642;</i>
                                            </a>
{{--                                            <a onclick="xadmin.open('修改密码','member-password.html',600,400)" title="修改密码" href="javascript:;">--}}
{{--                                                <i class="layui-icon">&#xe631;</i>--}}
{{--                                            </a>--}}

                                            <a title="删除" onclick="member_del(this,{{$v->id}})" href="javascript:;">
                                                <i class="layui-icon">&#xe640;</i>
                                            </a>

                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="layui-card-body ">
                            <div class="page">
{{--                                {{  $list->appends($request->all())->links()}}--}}
                            </div>
                        </div>
{{--                        <div class="layui-card-body ">--}}
{{--                            <div class="page">--}}
{{--                                <div>--}}
{{--                                  <a class="prev" href="">&lt;&lt;</a>--}}
{{--                                  <a class="num" href="">1</a>--}}
{{--                                  <span class="current">2</span>--}}
{{--                                  <a class="num" href="">3</a>--}}
{{--                                  <a class="num" href="">489</a>--}}
{{--                                  <a class="next" href="">&gt;&gt;</a>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </div> 
    </body>
    <script>
        function paixu(obj,id){
            var cate_order=$(obj).val();
            $.post('/admin/Category/paixu',{"_token":"{{ csrf_token() }}",'id':id,'cate_order':cate_order},function (data) {
                if(data.status==0){
                    // $(obj).parents("tr").remove();
                    layer.msg(data.message,{icon:6,time:1000},function () {
                        location.reload();//刷新页面
                    });
                }else{
                    layer.msg(data.message,{icon:5,time:3000});
                }
            })
        }
        $(document).ready(function() {

        });
      layui.use(['laydate','form'], function(){
        var laydate = layui.laydate;
        var  form = layui.form;


        // 监听全选
        form.on('checkbox(checkall)', function(data){

          if(data.elem.checked){
            $('tbody input').prop('checked',true);
          }else{
            $('tbody input').prop('checked',false);
          }
          form.render('checkbox');
        }); 
        
        //执行一个laydate实例
        laydate.render({
          elem: '#start' //指定元素
        });

        //执行一个laydate实例
        laydate.render({
          elem: '#end' //指定元素
        });


      });

       /*用户-停用*/
      function member_stop(obj,id){
          layer.confirm('确认要停用吗？',function(index){

              if($(obj).attr('title')=='启用'){

                //发异步把用户状态进行更改
                $(obj).attr('title','停用')
                $(obj).find('i').html('&#xe62f;');

                $(obj).parents("tr").find(".td-status").find('span').addClass('layui-btn-disabled').html('已停用');
                layer.msg('已停用!',{icon: 5,time:1000});

              }else{
                $(obj).attr('title','启用')
                $(obj).find('i').html('&#xe601;');

                $(obj).parents("tr").find(".td-status").find('span').removeClass('layui-btn-disabled').html('已启用');
                layer.msg('已启用!',{icon: 5,time:1000});
              }
              
          });
      }

      /*用户-删除*/
      function member_del(obj,id){
          layer.confirm('确认要删除吗？',function(index){
              //发异步删除数据
              $.post('/admin/Category/'+id,{"_method":"DELETE","_token":"{{ csrf_token() }}"},function (data) {
                  if(data.status==0){
                      $(obj).parents("tr").remove();
                      layer.msg(data.message,{icon:6,time:1000});
                  }else{
                      layer.msg(data.message,{icon:5,time:3000});
                  }
              })
              // $.ajax({
              //     url:'/admin/User/'+id,
              //     type:'DELETE',
              //     timeout:"3000",
              //     dataType : 'json',
              //     cache:"false",
              //     headers: {
              //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              //     },
              //     data:{},
              //     success:function(data){
              //         console.log(data);
              //         if(data.status==0){
              //             // $(obj).parents("tr").remove();
              //             // layer.msg('已删除!',{icon:1,time:1000});
              //             layer.alert(data.message, {
              //                     icon: 6
              //                 },
              //                 function() {
              //                     // //关闭当前frame
              //                     // xadmin.close();
              //
              //                     // 可以对父窗口进行刷新
              //                     xadmin.father_reload();
              //                 });
              //         }else if(data.status==1){
              //             layer.alert(data.message, {
              //                     icon: 5
              //                 },
              //                 function(index) {
              //                     layer.close(index);
              //
              //
              //                 });
              //         }
              //
              //
              //
              //     },
              //     error:function(err){
              //         console.log(err);
              //     }
              // });


          });
      }



      function delAll (argument) {
        var ids = [];

        // 获取选中的id 
        $('tbody input').each(function(index, el) {
            if($(this).prop('checked')){
               ids.push($(this).val())
            }
        });
  console.log(ids);
        layer.confirm('确认要删除吗？'+ids.toString(),function(index){
            //捉到所有被选中的，发异步进行删除
            $.get('/admin/Category/delall/',{"ids":ids},function (data) {
                if(data.status==0){
                    layer.msg(data.message, {icon: 6});
                    $(".layui-form-checked").not('.header').parents('tr').remove();

                }else{
                    layer.msg(data.message, {icon: 5});
                }
            })

        });
      }
    </script>
</html>