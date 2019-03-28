<?php
/**
 * Created by PhpStorm.
 * User: zhangcheng
 * Date: 2019-03-27
 * Time: 16:59
 */

namespace App\Http\Controllers\Api;


use Illuminate\Http\Request;
use App\Model\Article;
use App\Transformers\ArticleTransformer;
use App\Transformers\ArticlePageTransformer;

class ArticleController extends Controller
{
    public function index(Request $request,Article $article)
    {
        $articles = $article->orderBy('id', 'desc')->paginate(5);

        return $this->response->paginator($articles, new ArticlePageTransformer());
    }

    public function show($id)
    {
        $article = Article::find($id);

        return $this->response->item($article, new ArticleTransformer());
    }
}
