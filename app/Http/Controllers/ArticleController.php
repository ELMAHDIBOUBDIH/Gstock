<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Article\ArticleRepository;
use Drstock\Repositories\Category\CategoryRepository;
use Drstock\Http\Requests\StoreArticleRequest;
use Drstock\Http\Requests\UpdateArticleRequest;
use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ArticleController extends Controller {

    public function __construct(ArticleRepository $article, CategoryRepository $category, UploadInterface $upload) {
        $this->article = $article;
        $this->category = $category;
        $this->upload = $upload;
        $this->middleware('create:admin')->only('create');
         $this->middleware('create:admin')->only('store');
         $this->middleware('update:admin')->only('edit');
          $this->middleware('delete:admin')->only('destroy');

    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
       
        $articles = $this->article->paginate(20);
     $categorys=$this->category->all();
 
return view('article.index')->with(['articles' => $articles,'categorys'=>$categorys]);
    }
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
        $articles = $this->article->all();
        $categories = $this->category->all();
        return view('article.create')->with(['articles' => $articles, 'categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreArticleRequest $request) {
      $input = $request->all();

      if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
            $input['image'] = $this->upload->image($data);
        } else {
            $input['image'] = "default.jpg";
        }

       $result = $this->article->create($input);
session()->flash('message',$result['message']);

    return redirect()->route('dashboard::article.index');
        
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $article = $this->article->byId($id);
        return view('article.show')->with(['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $article = $this->article->byId($id);
        $categorys = $this->category->all();
        return view('article.edit')->with(['article' => $article, 'categorys' => $categorys]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateArticleRequest $request, $id) {
        $input = $request->all();
        $article = $this->article->byId($id);
        
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
            $input['image'] = $this->upload->image($data);
        } else {
            $input['image'] = $article->image;
        }

       

        $result = $this->article->update($article, $input);
session()->flash('message',$result['message']);
return redirect()->route('dashboard::article.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
$article = $this->article->ById($id); 
if($article->achat_lignes->count()!=0)
{$cmdachat=$article->achat_lignes[0]->achat_lignes_commande_id;
$this->article->destroy($id);
return  redirect()->route('dashboard::cmdachat.destroy',$cmdachat);}
else
{
 $this->article->destroy($id);
return  redirect()->route('dashboard::article.index');}   
}


public function SearchArticle(Request $Request)
{
$input=$Request->all(); 
$articles =$this->article->recherche_article($input['design'],$input['cat']); 
$this->article->list_rech($articles);
}

}
