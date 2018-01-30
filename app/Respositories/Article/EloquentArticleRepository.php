<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Article;

use Drstock\Article;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentArticleRepository extends EloquentRepository implements ArticleRepository {

    /**
     * The eloquent model instance.
     *
     * @var \Drstock\Models\Incident
     */
    protected $model;

    /**
     * Create a new eloquent incident repository instance.
     *
     * @param \Drstock\Models\Incident $model
     */
    public function __construct(Article $model) {
        $this->model = $model;
    }

    /**
     * Create a new model.
     *
     * @param int   $userId
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data) {
        $article = new $this->model;

        $article->barre_code = e($data['barre_code']);
        $article->name = e($data['name']);
        $article->Brand = e($data['Brand']);
        $article->description = e($data['description']);
        $article->prix_vente = e($data['prix_vente']);
        $article->prix_achat = e($data['prix_achat']);
        $article->available_qnt = e($data['available_qnt']);
        $article->min_qnt = e($data['min_qnt']);
        $article->image = e($data['image']);
        $article->category_id = e($data['category']);

        $save = $article->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $article->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }

    /**
     * Update a model by id.
     *
     * @param int   $id
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($article, array $data) {
        $article->barre_code = e($data['barre_code']);
        $article->name = e($data['name']);
        $article->Brand = e($data['Brand']);
        $article->description = e($data['description']);
        $article->prix_vente = e($data['prix_vente']);
        $article->prix_achat = e($data['prix_achat']);
        $article->available_qnt = e($data['available_qnt']);
        $article->min_qnt = e($data['min_qnt']);
         $article->category_id = e($data['category']);
        
        $save = $article->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['id'] = $article->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-updated');
        }

        return $result;
    }
//recherche automatique 
     public function recherche_article($design,$cat)
     {if ($cat==0 && $design==null) {
      return $model=$this->model->paginate();   
     }elseif($design==null)
     {
        return $model=$this->model->where('category_id','LIKE',$cat.'%')->get();
     }
     elseif($cat==0)
     { 
        return $model=$this->model->where('name','LIKE',$design.'%')->get();
     }
     else{
    return $model=$this->model->where('name','LIKE',$design.'%')->where('category_id','LIKE',$cat.'%')->get();
}
  }
     

//function return liste rechercher 
public  function list_rech($articles)
{

foreach ($articles as $article)
{
$list='<tr>'.
    '<td>'.$article->id.'</td>'.
    '<td>'.$article->name.'</td>'.
    '<td>'.$article->Brand.'</td>'.
    '<td>'.$article->category->name.'</td>'.
    '<td>'.'<img src="/Nprojet/public/uploads/'.$article->image.'"
    alt="img produit"style="width:71px;height:41px;margin-bottom:-4px;"></td>'.
    '<td>'.$article->prix_achat.'</td>'.
    '<td>'.$article->prix_vente.'</td>'.
    '<td>'.$article->available_qnt.'</td>'.
    '<td>'.$article->min_qnt.'</td>'.
    "<td><a href='article/edit/".$article->id."'  class='btn btn-warning' style='margin-left: -16%' data-toggle='tooltip' data-placement='top' title='edit'><span class='glyphicon glyphicon-edit'></span></a>
    <a href='article/detete/".$article->id."'  class='btn btn-danger'  data-toggle='tooltip' data-placement='top' title='delete'><span class='glyphicon glyphicon-trash'></span></a>
    <a href='article/".$article->id."'  class='btn btn-success'  data-toggle='tooltip' data-placement='top' title='show'><span class='glyphicon glyphicon-fullscreen'></span></a>
</td>"
.'</tr>';
echo  $list;

}

}
}
