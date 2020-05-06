<?php
namespace App\Http\Controllers\Api;

use Auth;
use App\Model\User;
use Illuminate\Http\Request;
use App\Http\Requests\Api\AuthorizationRequest;

use App\Service\UserService;

use App\Http\Requests\Api\WeappAuthorizationRequest;
use App\Model\WxUser;

class AuthorizationsController extends Controller
{

    public function store(AuthorizationRequest $request)
    {

        $captchaData = \Cache::get($request->captcha_key);

        if (!$captchaData) {
            return $this->response->error('图片验证码已失效', 422);
        }

        if (!hash_equals($captchaData['code'], $request->captcha_code)) {
            // 验证错误就清除缓存
            \Cache::forget($request->captcha_key);
            return $this->response->errorUnauthorized('验证码错误');
        }

        //


        $username = $request->username;

//        $service = new UserService();
//
//        $user = $service->check($username,$request->password);
//
//        if($user === false){
//            return $this->response->errorUnauthorized('用户名或密码错误');
//        }
//
//
//
//
//        $token = \Auth::guard('api')->fromUser($user);


        if (!$token = Auth::guard('api')->attempt(['username'=>$request->username,'password'=>$request->password])) {
            return $this->response->errorUnauthorized(trans('auth.failed'));
        }

        return $this->respondWithToken($token)->setStatusCode(201);
    }


    public function update()
    {
        $token=Auth::guard('api')->refresh();

        return $this->respondWithToken($token);

    }


    public function destroy()
    {
        Auth::guard('api')->logout();
        return $this->response->noContent();
    }

    //小程序登录
    public function weappStore(WeappAuthorizationRequest $request)
    {

        $code = $request->code;

        // 根据 code 获取微信 openid 和 session_key
        $miniProgram = \EasyWeChat::miniProgram();
        $data = $miniProgram->auth->session($code);

        // 如果结果错误，说明 code 已过期或不正确，返回 401 错误
        if (isset($data['errcode'])) {
            return $this->response->errorUnauthorized('code 不正确');
        }
        // 找到 openid 对应的用户
        $user = User::where('weapp_openid', $data['openid'])->first();

        $attributes['weixin_session_key'] = $data['session_key'];

        if (!$user) {
            // 如果未提交用户名密码，403 错误提示
            if (!$request->username) {
                return $this->response->errorForbidden('用户不存在');
            }

            $username = $request->username;

            $credentials['username'] = $username;
            $credentials['password'] = $request->password;

            // 验证用户名和密码是否正确
            if (!Auth::guard('api')->once($credentials)) {
                return $this->response->errorUnauthorized('用户名或密码错误');
            }

            // 获取对应的用户
            $user = Auth::guard('api')->getUser();

            if($user->id != 1){
                return $this->response->errorForbidden('只有管理员可以登录');
            }

            $attributes['weapp_openid'] = $data['openid'];
        }


        // 更新用户数据
        $user->update($attributes);

        // 为对应用户创建 JWT
        $token = Auth::guard('api')->fromUser($user);

        return $this->respondWithToken($token)->setStatusCode(201);


    }

    //小程序登录2  无需帐号密码 只使用微信身份
    public function weappStore2(WeappAuthorizationRequest $request) {

        $code = $request->code;

        // 根据 code 获取微信 openid 和 session_key
        $miniProgram = \EasyWeChat::miniProgram();
        $data = $miniProgram->auth->session($code);

        // 如果结果错误，说明 code 已过期或不正确，返回 401 错误
        if (isset($data['errcode'])) {
            return $this->response->errorUnauthorized('code 不正确');
        }
        // 找到 openid 对应的用户
        $user = WxUser::where('openid', $data['openid'])->first();

        if (!$user) {

            //新建
            $user = new WxUser();
            $user->openid = $data['openid'];
            $user->save();
        }

        // 为对应用户创建 JWT
        $token = Auth::guard('api')->fromUser($user);

        return $this->respondWithToken($token)->setStatusCode(201);

    }

    protected function respondWithToken($token)
    {
        return $this->response->array([
            'access_token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => \Auth::guard('api')->factory()->getTTL() * 60
        ]);
    }



}
