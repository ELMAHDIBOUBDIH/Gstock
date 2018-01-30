<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\user\userRepository;
use Drstock\Http\Requests\StoreuserRequest;
use Drstock\Http\Requests\UpdateuserRequest;

use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class UserController extends Controller
{
public function __construct(userRepository $user, UploadInterface $upload ) {
        $this->user = $user;
        $this->upload = $upload;
    }
    

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
   $users = $this->user->paginate(20);
    return view('user.index')->with(['users' => $users]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        
       
        return view('user.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreuserRequest $request) {
      $input = $request->all();
     
         $result = $this->user->create($input);
        return redirect()->route('dashboard::user.index',$result);
    

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $user = $this->user->byId($id);
       
        return view('user.edit')->with(['user' => $user]);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\UpdateuserRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateuserRequest $request, $id) {
        $input = $request->all();
       
        $user = $this->user->byId($id);
         $result = $this->user->update($user, $input);
         return redirect()->route('dashboard::user.index',$result);
}
/**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function destroy($id) {

$result = $this->user->destroy($id);
  return redirect()->route('dashboard::user.index',$result);

}
}
