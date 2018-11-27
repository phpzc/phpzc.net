<?php
/**
 * Created by PhpStorm.
 * User: zhangcheng
 * Date: 2018/11/26
 * Time: 5:35 PM
 */

namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class MyAuthProvider  extends EloquentUserProvider
{
    //自定义auth认证使用的 validateCredentials 验证码密码方法
    public function validateCredentials(Authenticatable $user, array $credentials)
    {
        return md5($credentials['password']) == $user->getAuthPassword();

    }
}
