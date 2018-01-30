<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
	protected $table = 'invoices';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'reference_cmd','invoice_type','date','credit'];
     public function commande_achat()
    {
        return $this->belongsTo('Drstock\Commade_achat','reference_cmd');
    }
     public function commande_vente()
    {
        return $this->hasOne('Drstock\Commade_vente');
    }
    public function payments()
    {
        return $this->hasMany('Drstock\Payment','invoice_id');
    }
}
