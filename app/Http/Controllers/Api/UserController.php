<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Model\User;
use App\Transformers\UserTransformer;

use App\Model\Profile;
use App\Transformers\ProfileTransformer;

class UserController extends Controller
{
    //登录用户个人信息获取
    public function me()
    {
        return $this->response->item($this->user(), new UserTransformer());
    }

    public function about()
    {
        $profile = Profile::find(1);
        return $this->response->item($profile, new ProfileTransformer() );
    }
}
