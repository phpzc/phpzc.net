<?php
namespace App\Transformers;

use App\Model\User;

class UserTransformer extends Transformer {

    public function transform(User $user)
    {
        return [
            'id'=> $user->id,
            'name' => $user->name,
            'username' => $user->username,
            'avatar' => $user->avatar,
            'introduction' => $user->introduction,
            'baidu'=>$user->baidu,
            'qq'=>$user->sina,
            'github'=>$user->github,
            'battle_us'=>$user->battle_us,
        ];
    }
}
