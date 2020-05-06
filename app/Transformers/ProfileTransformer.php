<?php
/**
 * Created by PhpStorm.
 * User: zhangcheng
 * Date: 2019-03-27
 * Time: 16:29
 */

namespace App\Transformers;

use App\Model\Profile;

class ProfileTransformer extends Transformer
{
    public function transform(Profile $profile)
    {
        return [
            'id'=>$profile->id,
            'name'=>$profile->name,
            'mail' => $profile->mail,
            'github'=>$profile->github,
            'avator_url'=>$profile->avator_url,
            'weibo'=>$profile->weibo,
            'description'=>$profile->description,
        ];

    }
}
