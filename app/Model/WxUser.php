<?php
/**
 * Created by PhpStorm.
 * User: zhangcheng
 * Date: 2019-03-26
 * Time: 17:17
 */

namespace App\Model;

use Tymon\JWTAuth\Contracts\JWTSubject;

use Illuminate\Database\Eloquent\Model;


class WxUser extends Model implements JWTSubject
{

    public $table = 'wx_users';

    /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     * getJWTIdentifier 返回了 User 的 id
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * getJWTCustomClaims 是我们需要额外再 JWT 载荷中增加的自定义内容，这里返回空数组
     *
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
