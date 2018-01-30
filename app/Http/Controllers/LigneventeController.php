<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\lignevente\LigneventeRepository;
use Drstock\Repositories\Article\ArticleRepository;
use Drstock\Repositories\Category\CategoryRepository;
use Drstock\Repositories\Cmdvente\CmdventeRepository;


use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;


class LigneventeController extends Controller {

    public function __construct(LigneventeRepository $lignevente, ArticleRepository $article, UploadInterface $upload ,CmdventeRepository $commande_vente,CategoryRepository $category) {
        $this->lignevente = $lignevente;
        $this->commande_vente= $commande_vente;
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
            $ligneventes = $this->lignevente->paginate(20);
            $articles = $this->article->all();
            $categorys = $this->category->all();
    $commande_vente = $this->commande_vente->byId($id);
    
        
return view('Lignevente.index')->with(['ligneventes'=>$ligneventes,'articles' => $articles,'commande_vente' => $commande_vente,'categorys' => $categorys]);
     }

  
   
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request,$id) {

        $input = $request->all();
         $commande_vente = $this->commande_vente->byId($id);
        $this->lignevente->create($input,$id,$commande_vente);
        return redirect()->route('dashboard::Lignevente.index',$id);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     public function edit($id) {
     	$lignevente = $this->lignevente->byId($id);
     	$articles = $this->article->all();
        $categorys = $this->category->all();

     return view('Lignevente.edit')->with(['lignevente'=>$lignevente,'articles' => $articles,'categorys' => $categorys]);
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
        $lignevente = $this->lignevente->byId($id);
        $total_old=$lignevente->T_TTC;
       
        $commande_vente = $this->commande_vente->byId($lignevente->vente_lignes_commande_id);


 $result = $this->lignevente->update($input,$commande_vente,$lignevente,$total_old );
        
        
        return redirect()->route('dashboard::Lignevente.index',$lignevente->vente_lignes_commande_id);
        }

         /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idcmd,$id) {
       $commande_vente = $this->commande_vente->byId($idcmd);
       $lignevente = $this->lignevente->byId($id);
       $total_old_cmd=$commande_vente->total;
      $commande_vente->total =($total_old_cmd)-($lignevente->T_TTC);
    $commande_vente->invoicevente->credit = $commande_vente->total;
      $commande_vente->save();
      $commande_vente->invoicevente->save();

      $lignevente = $this->lignevente->destroy($id);

       return redirect()->route('dashboard::Lignevente.index',$idcmd);
    }
    
}
