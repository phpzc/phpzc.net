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
    public function transform(Article $article)
    {
        return [
            'id'=>$article->id,
            'title' => $article->title,
            'content' => $article->content,
            'time' => date('Y-m-d',$article->time),
            'visit' => $article->visit,
            'isdel' => $article->isdel,
            'type' => $article->type,//0-baidu 1-markdown
            'markdown' => $article->markdown,
        ];
    }
}
