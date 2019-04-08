<?php
/**
 * Created by PhpStorm.
 * User: zhangcheng
 * Date: 2019-03-27
 * Time: 16:55
 */

namespace App\Transformers;

use App\Model\Article;

class ArticleTransformer extends Transformer
{
    protected $availableIncludes = ['user'];

    public function transform(Article $article)
    {
        return [
            'id'=>$article->id,
            'title' => htmlspecialchars_decode($article->title),
            'content' =>  htmlspecialchars_decode($article->content),
            'time' => date('Y-m-d H:i:s',$article->time),
            'visit' => $article->visit,
            'isdel' => $article->isdel,
            'type' => $article->type,//0-baidu 1-markdown
            'markdown' => $article->markdown,


            'category_name' => $article->getCategoryName(),
        ];
    }

    public function includeUser(Article $article)
    {
        return $this->item($article->user, new UserTransformer());
    }
}
