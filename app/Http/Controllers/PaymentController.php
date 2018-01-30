<?php

namespace Drstock\Http\Controllers;
use Drstock\Repositories\Invoice\InvoiceRepository;
use Drstock\Repositories\ligneachat\LigneachatRepository;
use Drstock\Repositories\Cmdachat\CmdachatRepository;
use Drstock\Repositories\Payment\PaymentRepository;
use Carbon\Carbon;
use PDF;
use Drstock\Services\UploadInterface;
use Illuminate\Http\Request;

class PaymentController extends Controller
{

  public function __construct(LigneachatRepository $ligneachat, UploadInterface $upload ,CmdachatRepository $commande_achat,PaymentRepository $Payment,InvoiceRepository $Invoice ) {
        $this->ligneachat = $ligneachat;
        $this->commande_achat= $commande_achat;
        $this->upload = $upload;
        $this->Payment=$Payment;
        $this->Invoice = $Invoice;
        $this->middleware('create:admin')->only('create');
         $this->middleware('create:admin')->only('store');
         $this->middleware('update:admin')->only('edit');
          $this->middleware('delete:admin')->only('destroy');

    }
   public function create($id) {
    $commande_achat=$this->commande_achat->byId($id);

       return view('Payment.create')->with(['commande_achat'=>$commande_achat]);
    }
      /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
  public function store(Request $request) {
  	   $input=$request->all();
       $Invoice=$this->Invoice->byId($input['invoice_id']);  
      $result= $this->Payment->create($input,$Invoice);
  return redirect()->route('dashboard::Payment.index',$Invoice->id);
    }
       public function index($id) {
      
     $Invoice=$this->Invoice->byId($id);  
     $payments = $Invoice->payments;
     return view('Payment.index')->with(['payments'=>$payments,
     	'Invoice'=> $Invoice]);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
   public function show($idpay,$id) {
        $date = Carbon::now();

        $Invoice = $this->Invoice->byId($id);
       $provider=$Invoice->commande_achat->provider;
   
       $payment = $this->Payment->byId($idpay);

        return view('Payment.show')->with(['Invoice' => $Invoice,'date' =>$date,'payment' =>$payment,'provider'=>$provider]);
    }
     public function destroy($id,$idcmd) {

      $result = $this->Payment->destroy($id);
       return redirect()->route('dashboard::Payment.index',$idcmd);

}
/**
     * Display PDF the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
public function PDF($idpay,$id) {
        $date = Carbon::now();

        $Invoice = $this->Invoice->byId($id);
       $provider=$Invoice->commande_achat->provider;
   
       $payment = $this->Payment->byId($idpay);

        $pdf = PDF::loadView('Payment.PDF',['Invoice' => $Invoice,'date' =>$date,'payment' =>$payment,'provider'=>$provider]);
        return $pdf->stream('Payment.pdf');
    }
}