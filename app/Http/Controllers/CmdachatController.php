<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Cmdachat\CmdachatRepository;
use Drstock\Repositories\Provider\ProviderRepository;
use Drstock\Http\Requests\StoreCmdachatRequest;
use Drstock\Http\Requests\updateCmdRequest;
use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class CmdachatController extends Controller
{
    
    public function __construct(CmdachatRepository $cmdachat, ProviderRepository $provider, UploadInterface $upload) {
        $this->cmdachat = $cmdachat;
        $this->provider = $provider;
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
        $cmdachats = $this->cmdachat->paginate(20);
       
        return view('cmdachat.index')->with(['cmdachats' => $cmdachats]); 
        
    }
    public function show($id){
         $commande_achat = $this->cmdachat->byId($id);
       
        return view('cmdachat.show')->with(['commande_achat' => $commande_achat]); 
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $providers = $this->provider->all();
        
        return view('cmdachat.create')->with(['providers' => $providers]);
    }
     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCmdachatRequest $request) {
      $input = $request->all();
       $result = $this->cmdachat->create($input);
        return redirect()->route('dashboard::cmdachat.index' , $result);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $cmdachat = $this->cmdachat->byId($id);
        $provider = $this->provider->byId( $cmdachat['provider_id']);
        
        return view('cmdachat.edit')->with(['cmdachat' =>$cmdachat , 'provider' => $provider]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(updateCmdRequest $request, $id) {
       
  $input = $request->all() ;
        $cmdachat = $this->cmdachat->byId($id);
        $result = $this->cmdachat->update($cmdachat, $input);

    return redirect()->route('dashboard::cmdachat.index',$result);
    }
    public function destroy($id) {
      $cmdachat=$this->cmdachat->byId($id);  
      $cmdachat->achat_lignes()->delete();
      $cmdachat->Invoice()->delete();
      $cmdachat = $this->cmdachat->destroy($id);
      $result['message'] = trans('text.card-deleted');
      return redirect()->route('dashboard::cmdachat.index',$result);
    }

}
