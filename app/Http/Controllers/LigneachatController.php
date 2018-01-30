<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\ligneachat\LigneachatRepository;
use Drstock\Repositories\Article\ArticleRepository;
use Drstock\Repositories\Category\CategoryRepository;
use Drstock\Repositories\Cmdachat\CmdachatRepository;


use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;


class LigneachatController extends Controller {

    public function __construct(LigneachatRepository $ligneachat, ArticleRepository $article, UploadInterface $upload ,CmdachatRepository $commande_achat,CategoryRepository $category) {
        $this->ligneachat = $ligneachat;
        $this->commande_achat= $commande_achat;
$this->category = $category;
        $this->article = $article;
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
        public function index($id) {
               $ligneachats = $this->ligneachat->paginate(20);
               $articles = $this->article->all();
               $categorys = $this->category->all();
               $commande_achat = $this->commande_achat->byId($id);
              // dd($commande_achat->provider->name);
               return view('Ligneachat.index')->with(['ligneachats'=>$ligneachats,'articles' => $articles,'commande_achat' => $commande_achat,'categorys' => $categorys]);
     }

  
   
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request,$id) {

        $input = $request->all();
         $commande_achat = $this->commande_achat->byId($id);
        $this->ligneachat->create($input,$id,$commande_achat);
        return redirect()->route('dashboard::Ligneachat.index',$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id) {
     	$ligneachat = $this->ligneachat->byId($id);
     	$articles = $this->article->all();
        $categorys = $this->category->all();
     return view('Ligneachat.edit')->with(['ligneachat'=>$ligneachat,'articles' => $articles,'categorys' => $categorys]);
    }

 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id) {
        $input = $request->all(); 
        $ligneachat = $this->ligneachat->byId($id);
        $total_old=$ligneachat->T_TTC;
       
        $commande_achat = $this->commande_achat->byId($ligneachat->achat_lignes_commande_id);


 $result = $this->ligneachat->update($input,$commande_achat,$ligneachat,$total_old );
        
        
        return redirect()->route('dashboard::Ligneachat.index',$ligneachat->achat_lignes_commande_id);
        }

         /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcmd,$id) {
       $commande_achat = $this->commande_achat->byId($idcmd);
       $ligneachat = $this->ligneachat->byId($id);
       $total_old_cmd=$commande_achat->total;
      $commande_achat->total =($total_old_cmd)-($ligneachat->T_TTC);
      $commande_achat->save();

      $ligneachat = $this->ligneachat->destroy($id);
  
       return redirect()->route('dashboard::Ligneachat.index',$idcmd);
    }
    
}
