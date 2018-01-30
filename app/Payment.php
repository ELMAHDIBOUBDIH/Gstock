<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
	  protected $table = 'payments';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'invoice_id','date','type','payer','montant','rest_pay','description'];

   public function invoice() {
        return $this->belongsTo('Drstock\Invoice','invoice_id');
    }
}
