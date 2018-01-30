<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Cmdvente\CmdventeRepository;
use Drstock\Repositories\Client\ClientRepository;
use Drstock\Http\Requests\StoreCmdventeRequest;
use Drstock\Http\Requests\updateCmdRequest;
use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class CmdventeController extends Controller
{
    
    public function __construct(CmdventeRepository $cmdvente, ClientRepository $client, UploadInterface $upload) {
        $this->cmdvente = $cmdvente;
        $this->client = $client;
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
        $cmdventes = $this->cmdvente->paginate(20);
       
        return view('cmdvente.index')->with(['cmdventes' => $cmdventes]); 
        
    }
     public function show($id){
         $commande_vente = $this->cmdvente->byId($id);
       
        return view('cmdvente.show')->with(['commande_vente' => $commande_vente]); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $clients = $this->client->all();
        
        return view('cmdvente.create')->with(['clients' => $clients]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCmdventeRequest $request) {
      $input = $request->all();

       $result = $this->cmdvente->create($input);
      


        return redirect()->route('dashboard::cmdvente.index' , $result);
        
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $cmdvente = $this->cmdvente->byId($id);
        $client = $this->client->byId( $cmdvente['client_id']);
        
        return view('cmdvente.edit')->with(['cmdvente' =>$cmdvente , 'client' => $client]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateCmdRequest $request, $id) {
        $input = $request->all();
        $cmdvente = $this->cmdvente->byId($id);
        $result = $this->cmdvente->update($cmdvente, $input);

        return redirect()->route('dashboard::cmdvente.index',$result);
    }
    public function destroy($id) {
      
       $cmdvente=$this->cmdvente->byId($id);  
      $cmdvente->vente_lignes()->delete();
      $cmdvente->invoicevente()->delete();
      $cmdvente = $this->cmdvente->destroy($id);
      $result['message'] = trans('messages.card-deleted');
       return redirect()->route('dashboard::cmdvente.index',$result);
    }

}
