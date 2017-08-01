<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//这里用了Dingo和JWT作为api的开发工具
$api = app('Dingo\Api\Routing\Router');

//版本为v1
$api->version('v1', function ($api) {
    //路由组
    $api->group(['namespace' => 'App\Api\V1\Controllers'], function ($api) {
        $api->get('show', 'UsersController@show');//获取用户所有信息(在不需要登录的情况下测试路由)
        $api->post('user/register', 'AuthenticateController@register');//注册
        $api->post('user/login', 'AuthenticateController@authenticate');//登录


        //这里面的路由的正确访问形式
        //你自己的域名+/api/user/me/info?token=登录后返回的token
        //这里面都是登录之后的路由
        $api->group(['middleware' => 'jwt.auth'], function ($api) {
            //获取登录后的用户信息
            $api->get('user/me/info', 'AuthenticateController@getAuthenticatedUser');//获取登录后的用户信息

            //显示用户信息
            $api->get('show/userinfo','UsersController@show_user_info');//显示所有用户信息

            //显示单个课程
            $api->get('show/lesson/{id}','LessonsController@show_single_lesson');//显示单个课程
        });
    });
});
