<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Category\CategoryRepository;
use Drstock\Http\Requests\StoreCategoryRequest;
use Drstock\Http\Requests\UpdateCategoryRequest;
use Drstock\Services\UploadInterface;

class CategoryController extends Controller {

    public function __construct(CategoryRepository $category, UploadInterface $upload) {

        $this->category = $category;
        $this->upload = $upload;
        $this->middleware('create:admin')->only('create');
         $this->middleware('create:admin')->only('store');
         $this->middleware('update:admin')->only('edit');
          $this->middleware('delete:admin')->only('destroy');
    }

    public function index() {
        $categories = $this->category->paginate(20);
        
        return view('category.index')->with(['categories' => $categories]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoryRequest $request) {

        $input = $request->all();
       $result= $this->category->create($input);
        
        return redirect()->route('dashboard::category.index',$result);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        
        $category = $this->category->byId($id);
       
        return view('category.edit')->with(['category' => $category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateCategoryRequest $request, $id) {
        $input = $request->all();

        $category = $this->category->byId($id);
        $result= $this->category->update($category, $input);
        session()->flash('message',$result['message']);
        
    return redirect()->route('dashboard::category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id) {
  $category=$this->category->byId($id);
        $this->category->destroy($id);
        $category->articles()->delete();
        return redirect()->route('dashboard::category.index');
    }
}
