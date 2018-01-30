<?php

namespace Drstock\Http\Controllers;

use Drstock\Repositories\Invoicevente\InvoiceventeRepository;
use Drstock\Repositories\lignevente\LigneventeRepository;

use Drstock\Repositories\Cmdvente\CmdventeRepository;


use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;
use Carbon\Carbon;
use PDF;

class InvoiceventeController extends Controller
{

    public function __construct(LigneventeRepository $lignevente, UploadInterface $upload ,CmdventeRepository $commande_vente,InvoiceventeRepository $Invoicevente) {
        $this->lignevente = $lignevente;
        $this->commande_vente= $commande_vente;
        $this->upload = $upload;
        $this->Invoicevente = $Invoicevente;
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
        $Invoiceventes = $this->Invoicevente->paginate(20);
         $commande_ventes = $this->commande_vente->all();

     
    return view('Invoicevente.index')->with(['Invoiceventes' => $Invoiceventes,'commande_ventes' => $commande_ventes]); 
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
   public function store($idcmd) {

       $commande_vente = $this->commande_vente->byId($idcmd);
       $this->Invoicevente->updatestock($commande_vente);
   $result= $this->Invoicevente->create($idcmd,$commande_vente);

       return redirect()->route('dashboard::Invoicevente.index',$result);
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
        $Invoicevente = $this->Invoicevente->byId($id);
        $result = $this->Invoicevente->update($input,$Invoicevente);

       return redirect()->route('dashboard::Invoicevente.index',$result);
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id) {
        $Invoicevente = $this->Invoicevente->byId($id);
     
        
        return view('Invoicevente.edit')->with(['Invoicevente' =>$Invoicevente]);
    }


    public function destroy($id) {

      $Invoicevente = $this->Invoicevente->destroy($id);
       return redirect()->route('dashboard::Invoicevente.index',$result);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $date = Carbon::now();

        $Invoicevente = $this->Invoicevente->byId($id);
        $client=$Invoicevente->commande_vente->client;
        $commande_vente=$Invoicevente->commande_vente;

        return view('Invoicevente.show')->with(['Invoicevente' => $Invoicevente,'date' =>$date,'client' =>$client,'commande_vente' =>$commande_vente ]);
    }
/**
     * Display PDF the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function pdf_Invoicevente($id) {
 $date = Carbon::now();
$Invoicevente = $this->Invoicevente->byId($id);
$client=$Invoicevente->commande_vente->client;
$commande_vente=$Invoicevente->commande_vente;
$pdf = PDF::loadView('Invoicevente.PDF',['Invoicevente' => $Invoicevente,'date' =>$date,'client' =>$client,'commande_vente' =>$commande_vente ]);
return $pdf->stream('Facturevente.pdf');
}
}
