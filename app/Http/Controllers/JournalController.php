<?php

namespace Drstock\Http\Controllers;

use Illuminate\Http\Request;
use Drstock\Repositories\Cmdachat\CmdachatRepository;
use Drstock\Repositories\Cmdvente\CmdventeRepository;
use Drstock\Repositories\Category\CategoryRepository;
use Drstock\Http\Requests\StoreJournalRequest;
use Drstock\Repositories\Article\ArticleRepository;
use Drstock\Repositories\Client\ClientRepository;
use Drstock\Repositories\Provider\ProviderRepository;

class JournalController extends Controller
{
    public function __construct(CmdachatRepository $cmdachat,CmdventeRepository $cmdvente ,CategoryRepository $category ,ArticleRepository $Article,ProviderRepository $provider,ClientRepository  $client)
    {
    	$this->cmdachat=$cmdachat;
        $this->cmdvente = $cmdvente;
        $this->category = $category;
        $this->Article = $Article;
        $this->client = $client;
        $this->provider = $provider;
        $this->middleware('create:admin')->only('create');
         $this->middleware('create:admin')->only('store');
         $this->middleware('update:admin')->only('edit');
          $this->middleware('delete:admin')->only('destroy');
    }
/**
     * Show the Sortie stock.
     *
     * @return \Illuminate\Http\Response
     */
    public function Entree(StoreJournalRequest $Request)
    {
 $input=$Request->all();

 $cmdachats = $this->cmdachat->recherche_Entree($input['date_debut'],$input['date_fin'],$input['id']); 


$Article=$this->Article->ById($input['id_art']);

return view('journal.Entree')->with(['cmdachats'=>$cmdachats,'Article'=>$Article]);
}


    /**
     * Show the Entree stock.
     *
     * @return \Illuminate\Http\Response
     */
     public function Sortie(StoreJournalRequest $Request)
    {
        $input=$Request->all();
        
        $cmdventes = $this->cmdvente->recherche_Sortie($input['date_debut'],$input['date_fin'],$input['id']);
        $Article=$this->Article->ById($input['id_art']);
        
        return view('journal.Sortie')->with(['cmdventes'=>$cmdventes,'Article'=>$Article]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function Index()
    {
        $categorys = $this->category->all();
        $providers = $this->provider->all();
        $clients = $this->client->all();
        
        return view('journal.Index')->with(['categorys'=>$categorys,'providers'=>$providers,'clients'=>$clients]);
    }


}
