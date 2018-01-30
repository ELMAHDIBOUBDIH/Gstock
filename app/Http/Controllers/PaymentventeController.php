<?php

namespace Drstock\Http\Controllers;
use Drstock\Repositories\Invoicevente\InvoiceventeRepository;
use Drstock\Repositories\lignevente\LigneventeRepository;
use Drstock\Repositories\Cmdvente\CmdventeRepository;
use Drstock\Repositories\Paymentvente\PaymentventeRepository;
use Carbon\Carbon;
use PDF;
use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class PaymentventeController extends Controller
{

  public function __construct(LigneventeRepository $lignevente, UploadInterface $upload ,CmdventeRepository $commande_vente,PaymentventeRepository $Paymentvente,InvoiceventeRepository $Invoicevente ) {
        $this->lignevente = $lignevente;
        $this->commande_vente= $commande_vente;
        $this->upload = $upload;
        $this->Paymentvente=$Paymentvente;
        $this->Invoicevente = $Invoicevente;
        $this->middleware('create:admin')->only('create');
         $this->middleware('create:admin')->only('store');
         $this->middleware('update:admin')->only('edit');
          $this->middleware('delete:admin')->only('destroy');

    }
   public function create($id) {
    $commande_vente=$this->commande_vente->byId($id);
  
       return view('Paymentvente.create')->with(['commande_vente'=>$commande_vente]);
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request) {
  	   $input=$request->all();
       $Invoicevente=$this->Invoicevente->byId($input['Invoice_id']);  
       $this->Paymentvente->create($input,$Invoicevente);
       return redirect()->route('dashboard::Invoicevente.index');
    }
       public function index($id) {
      
     $Invoicevente=$this->Invoicevente->byId($id);  
     $Paymentventes = $Invoicevente->Paymentventes;
    // dd($Invoicevente);
  return view('Paymentvente.index')->with(['Paymentventes'=>$Paymentventes,'Invoicevente'=> $Invoicevente]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($idpay,$id) {
        $date = Carbon::now();

       $Invoicevente = $this->Invoicevente->byId($id);
      $client=$Invoicevente->commande_vente->client;
     
        $Paymentvente = $this->Paymentvente->byId($idpay);

        return view('Paymentvente.show')->with(['Invoicevente' => $Invoicevente,'date' =>$date,'Paymentvente' =>$Paymentvente,'client'=>$client]);
    }
    
      public function destroy($id,$idcmd) {
      $Paymentvente = $this->Paymentvente->destroy($id);
       return redirect()->route('dashboard::Paymentvente.index',$idcmd);
    }

/**
     * Display PDF specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function PDF_Paymentvente($idpay,$id) {
        $date = Carbon::now();

       $Invoicevente = $this->Invoicevente->byId($id);
      $client=$Invoicevente->commande_vente->client;
     
        $Paymentvente = $this->Paymentvente->byId($idpay);

 $pdf = PDF::loadView('Paymentvente.PDF',['Invoicevente' => $Invoicevente,'date' =>$date,'Paymentvente' =>$Paymentvente,'client'=>$client]);
        return $pdf->stream('Payment_vente.pdf');
    }
}
