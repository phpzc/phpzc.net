<?php
namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{

    public $timestamps = false;

    public $table = 'article';

    public function getCategoryName()
    {
        $path = $this->bpath;
        $idArr = explode('-',$path);
        $id = $idArr[1];
        $category = Category::find($id);

        return $category->name;
    }
}
