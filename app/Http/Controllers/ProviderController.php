<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Provider\ProviderRepository;
use Drstock\Http\Requests\StoreProviderRequest;
use Drstock\Http\Requests\UpdateProviderRequest;
use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class ProviderController extends Controller
{
public function __construct(ProviderRepository $provider, UploadInterface $upload) {
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
        $providers = $this->provider->paginate(20);
        
        return view('provider.index')->with(['providers' => $providers]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        $providers = $this->provider->all();
       
        return view('provider.create')->with(['providers' => $providers]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreProviderRequest $request) {
      $input = $request->all();

      if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
            $input['image'] = $this->upload->image($data);
        } else {
            $input['image'] = "default.jpg";
        }
         $result = $this->provider->create($input);
         session()->flash('message',$result['message']);
        return redirect()->route('dashboard::provider.index');
    

    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $provider = $this->provider->byId($id);
        return view('provider.show')->with(['provider' => $provider]);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $provider = $this->provider->byId($id);
       
        return view('provider.edit')->with(['provider' => $provider]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProviderRequest $request, $id) {
        $input = $request->all();
        $provider = $this->provider->byId($id);
        
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image');
            $input['image'] = $this->upload->image($data);
        } else {
            $input['image'] = $provider->image;
        }
         $result = $this->provider->update($provider, $input);
         session()->flash('message',$result['message']);
         return redirect()->route('dashboard::provider.index');
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
    $provider = $this->provider->destroy($id);
    $result['message'] = trans('text.card-deleted');
$result['action'] = "1";
 } 
      session()->flash('message',$result['message']);
       return redirect()->route('dashboard::provider.index');
    }

}