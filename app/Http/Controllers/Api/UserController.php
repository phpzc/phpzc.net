<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\User;
use App\Transformers\UserTransformer;


class UserController extends Controller
{
    //登录用户个人信息获取
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }

}
