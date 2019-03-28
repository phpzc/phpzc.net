<?php
/**
 * Created by PhpStorm.
 * User: zhangcheng
 * Date: 2019-03-27
 * Time: 17:12
 */

namespace App\Transformers;


use App\Model\Article;


class ArticlePageTransformer extends Transformer
{
    protected $availableIncludes = ['user'];

    public function transform(Article $article)
    {
        return [
            'id'=>$article->id,
            'title' => $article->title,
            //'time' => $article->time,
            'time' => date('Y-m-d H:i',$article->time),

            'visit' => $article->visit,
            'isdel' => $article->isdel,
            'type' => $article->type,//0-baidu 1-markdown

            'category_name' => $article->getCategoryName(),
        ];
    }

    public function includeUser(Article $article)
    {
        return $this->item($article->user, new UserTransformer());
    }
}
