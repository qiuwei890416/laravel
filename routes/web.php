<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//




//前台路由组
    Route::group(['namespace' => 'Home'], function(){
        //前端首页
        Route::get('/', 'IndexController@index');
        Route::get('/index', 'IndexController@index');
        //文章收藏
        Route::post('/shoucang', 'IndexController@shoucang');


        //短信发送验证码
        Route::post('/phone', 'IndexController@phone');

        //手机登录页面
        Route::get('/plogin', 'IndexController@plogin');
        //手机登录上传
        Route::post('/doplogin', 'IndexController@doplogin');
        //手机注册页面
        Route::get('/pzhuce', 'IndexController@pzhuce');
        //手机注册上传
        Route::post('/dopzhuce', 'IndexController@dopzhuce');


        //邮箱登录页面
        Route::get('/yxlogin', 'IndexController@yxlogin');
        //邮箱登录上传
        Route::post('/doyxlogin', 'IndexController@doyxlogin');
        //邮箱注册页面
        Route::get('/yxzhuce', 'IndexController@yxzhuce');
        //邮箱注册上传
        Route::post('/doyxzhuce', 'IndexController@doyxzhuce');
        //邮箱激活
        Route::get('/active', 'IndexController@active');
        //忘记密码页面->邮箱
        Route::get('/wangjiyx', 'IndexController@wangjiyx');
        //忘记密码上传->邮箱
        Route::post('/dowangjiyx', 'IndexController@dowangjiyx');
        //密码重置页面->邮箱
        Route::get('/yxchongzhi', 'IndexController@yxchongzhi');
        //密码重置上传->邮箱
        Route::post('/doyxchongzhi', 'IndexController@doyxchongzhi');

        //文章列表
        Route::get('/lists/{id}', 'IndexController@lists');
        //文章详情
        Route::get('/detail/{id}', 'IndexController@detail');
        //留言簿
        Route::get('/liuyan', 'IndexController@liuyan');


    });

    //登录页
    Route::get('/admin','Admin\LoginController@login');
    //验证码路由
    Route::get('/admin/Login/code','Admin\LoginController@code');
    //自带验证码路由
    Route::get('/admin/Login/captcha/{tmp}','Admin\LoginController@captcha');
    //登录上传
    Route::post('/admin/Login/dologin','Admin\LoginController@dologin');
    Route::get('/admin/Login/outdenglu','Admin\LoginController@outdenglu');
    //页面404或没权限
    Route::get('/admin/Index/error/{err}','Admin\IndexController@error')->middleware('login');
    //后台路由组
    Route::group(['namespace' => 'Admin', 'prefix' => 'admin','middleware'=>['login','hasrole']], function(){
        // 控制器在 "App\Http\Controllers\Admin" 命名空间下

        //首页
        Route::get('/Index/index','IndexController@index');

        //欢迎页
        Route::get('/Index/welcome','IndexController@welcome');
        //用户
        Route::post('/User/doauth','UserController@doauth');
        Route::get('/User/auth/{id}','UserController@auth');
        Route::get('/User/delall','UserController@delall');
        Route::resource('User','UserController');
        //角色
        Route::post('/Role/doauth','RoleController@doauth');
        Route::get('/Role/delall','RoleController@delall');
        Route::get('/Role/auth/{id}','RoleController@auth');
        Route::resource('Role','RoleController');
        //权限
        Route::get('/Permission/delall','PermissionController@delall');
        Route::resource('Permission','PermissionController');
        //分类
        Route::get('/Category/delall','CategoryController@delall');
        Route::post('/Category/paixu','CategoryController@paixu');
        Route::resource('Category','CategoryController');

        //文章
        Route::post('/Article/upload','ArticleController@upload');
        Route::post('/Article/duotushan','ArticleController@duotushan');
        Route::post('/Article/duotushanc','ArticleController@duotushanc');
        Route::any('/Article/uploadduo','ArticleController@uploadduo');
        Route::get('/Article/delall','ArticleController@delall');
        Route::resource('Article','ArticleController');

        //网站配置
        Route::get('/Config/xieru','ConfigController@xieru');
        Route::post('/Config/editall','ConfigController@editall');
        Route::resource('Config','ConfigController');

    });
