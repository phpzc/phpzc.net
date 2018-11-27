<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends  Authenticatable implements JWTSubject
{
    use Notifiable;
    /**
     * 该模型是否被自动维护时间戳
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * 主键名称
     * @var string
     */
    public $primaryKey = 'id';


    public $table = 'user';

    /**
     * 此模型的连接名称。
     *
     * @var string
     */
    //protected $connection = '';


    /**
     * 可以被赋值的字段
     *
     * @var array
     */
    protected $fillable = [
        'username',
        'password',
        'name',
        'regtime',
        'regip',
        'baidu',
        'qq',
        'sina',
        'github',
        'battle_us',
        'remember_token',
        'weapp_openid',
        'weixin_session_key',
    ];

    /**
     * 在模型数组或 JSON 显示中隐藏的属性
     *
     * @var array
     */
//    protected $hidden = [
//        'password',
//    ];


    /**
     * 自定义的密码字段, 无此，对于密码字段名不为password的登录时将出现密码不存在
     * @return string
     */
    public function getAuthPassword() {
        return $this->attributes['password'];// 一定要返回加密了的密码
    }

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
