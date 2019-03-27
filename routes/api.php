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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


$api = app('Dingo\Api\Routing\Router');

$api->version('v1', [
    'namespace' => 'App\Http\Controllers\Api',
    //'middleware' => ['serializer:array', 'bindings', 'change-locale'],
    'middleware' => ['serializer:array',],
], function ($api) {

    //不需要token的
    $api->group([
        'middleware' => 'api.throttle',
        'limit' => config('api.rate_limits.sign.limit'),
        'expires' => config('api.rate_limits.sign.expires'),

    ], function($api) {

        // 登录
        $api->post('authorizations', 'AuthorizationsController@store')
            ->name('api.authorizations.store');

        // 图片验证码
        $api->post('captchas', 'CaptchasController@store')
            ->name('api.captchas.store');


        // 刷新token
        $api->put('authorizations/current', 'AuthorizationsController@update')
            ->name('api.authorizations.update');
        // 删除token
        $api->delete('authorizations/current', 'AuthorizationsController@destroy')
            ->name('api.authorizations.destroy');


        //小程序登录 需要帐号密码
        //$api->post('weapp/authorizations', 'AuthorizationsController@weappStore')
            //->name('api.weapp.authorizations.store');

        //小程序登录2  微信端 不需要帐号密码
        $api->post('weapp/authorizations2', 'AuthorizationsController@weappStore2')
            ->name('api.weapp.authorizations.store2');

    });


    $api->group([
        'middleware'=>'api.throttle',
        'limit' => config('api.rate_limits.access.limit'),
        'expires' => config('api.rate_limits.access.expires'),

    ],function($api){

        //游客可以访问的  非登录状态
        // 小程序不设置权限验证 都可以访问
        $api->get('about','UserController@about')
            ->name('api.weapp.about');

        //列表
        $api->get('articles','ArticleController@index')
            ->name('api.weapp.articles');
        //详情



        //已登录用户可以访问的
        $api->group(['middleware'=>'api.auth'],function($api){

            //当前登录用户信息
            $api->get('user','UserController@me')
                ->name('api.user.show');
        });


    });


});
