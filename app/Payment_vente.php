<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Payment_vente extends Model
{
	  protected $table = 'payment_ventes';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'invoice_id','date','type','payer','montant','rest_pay','description'];

   public function invoicevente() {
        return $this->belongsTo('Drstock\Invoice_vente','invoice_id');
    }
}
