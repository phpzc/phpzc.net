<?php

namespace App\Providers;

use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        'App\Model' => 'App\Policies\ModelPolicy',
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //注册自定义auth认证使用的验证码密码方法 auth配置里面的providers的users的driver使用my-eloquen
        \Auth::provider('my-eloquent', function ($app, $config) {
            return new \App\Providers\MyAuthProvider($app['hash'], $config['model']);
        });
    }
}
