<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Invoice\InvoiceRepository;
use Drstock\Repositories\ligneachat\LigneachatRepository;

use Drstock\Repositories\Cmdachat\CmdachatRepository;


use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class InvoiceController extends Controller
{

    public function __construct(LigneachatRepository $ligneachat, UploadInterface $upload ,CmdachatRepository $commande_achat,InvoiceRepository $Invoice) {
        $this->ligneachat = $ligneachat;
        $this->commande_achat= $commande_achat;
        $this->upload = $upload;
        $this->Invoice = $Invoice;
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
        $Invoices = $this->Invoice->paginate(20);
         $commande_achats = $this->commande_achat->all();


    return view('Invoice.index')->with(['Invoices' => $Invoices,'commande_achats' => $commande_achats]); 
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store($idcmd) {

       $commande_achat = $this->commande_achat->byId($idcmd);
       $this->Invoice->updatestock($commande_achat);
     $result=$this->Invoice->create($idcmd,$commande_achat);

       return redirect()->route('dashboard::Invoice.index',$result);
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
        $Invoice = $this->Invoice->byId($id);
        $result = $this->Invoice->update($input,$Invoice);

       return redirect()->route('dashboard::Invoice.index',$result);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $Invoice = $this->Invoice->byId($id);
     
        
        return view('Invoice.edit')->with(['Invoice' =>$Invoice]);
    }


    public function destroy($id) {

      $result = $this->Invoice->destroy($id);
       return redirect()->route('dashboard::Invoice.index',$result);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $date = Carbon::now();

        $Invoice = $this->Invoice->byId($id);
        $provider=$Invoice->commande_achat->provider;
        $commande_achat=$Invoice->commande_achat;

   return   View('Invoice.show')->with(['Invoice' => $Invoice,'date' =>$date,'provider' =>$provider,'commande_achat' =>$commande_achat ]);
        

    }
    /**
     * Display PDF the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function pdf_invoice($id) {
$date = Carbon::now();
$Invoice = $this->Invoice->byId($id);
$provider=$Invoice->commande_achat->provider;
$commande_achat=$Invoice->commande_achat;
$pdf = PDF::loadView('Invoice.PDF',['Invoice' => $Invoice,'date' =>$date,'provider' =>$provider,'commande_achat' =>$commande_achat ]);
return $pdf->stream('FactureAchat.pdf');
}
}
