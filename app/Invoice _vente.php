<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Invoice_vente extends Model
{
	protected $table = 'Invoice_ventes';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'reference_cmd','invoice_type','date','credit'];
     public function commande_vente()
    {
        return $this->belongsTo('Drstock\Commade_vente','reference_cmd');
    }
     
    public function paymentventes()
    {
        return $this->hasMany('Drstock\Payment_vente','invoice_id');
    }
}
