<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Client\ClientRepository;
use Drstock\Http\Requests\StoreClientRequest;
use Drstock\Repositories\Cmdvente\CmdventeRepository;
use Drstock\Http\Requests\UpdateClientRequest;

use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class ClientController extends Controller
{
public function __construct(ClientRepository $client, UploadInterface $upload ,CmdventeRepository $cmdvente) {
        $this->client = $client;
       $this->cmdvente = $cmdvente;
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
   $clients = $this->client->paginate(20);
    return view('client.index')->with(['clients' => $clients]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $clients = $this->client->all();
       
        return view('client.create')->with(['clients' => $clients]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClientRequest $request) {
      $input = $request->all();

      if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
            $input['image'] = $this->upload->image($data);
        } else {
            $input['image'] = "default.jpg";
        }
         $result = $this->client->create($input);
         session()->flash('message',$result['message']);
        return redirect()->route('dashboard::client.index');
    

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $client = $this->client->byId($id);
        return view('client.show')->with(['client' => $client]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $client = $this->client->byId($id);
       
        return view('client.edit')->with(['client' => $client]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateClientRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClientRequest $request, $id) {
        $input = $request->all();
        $client = $this->client->byId($id);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
            $input['image'] = $this->upload->image($data);
        } else {
            $input['image'] = $client->image;
        }
         $result = $this->client->update($client, $input);
         session()->flash('message',$result['message']);
         return redirect()->route('dashboard::client.index');
}
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id,$nbcmd) {

$result['message'] = trans('text.card-not-deleted');  
$result['action'] = "0";

if($nbcmd == 0)
 { 
    $client = $this->client->destroy($id);
    $result['message'] = trans('text.card-deleted');
$result['action'] = "1";
 } 

  return redirect()->route('dashboard::client.index',$result);

}

}