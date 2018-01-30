<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Commade_vente extends Model
{
   protected $table = 'vente_commandes';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'client_id','user_id','date','total','etat'];

    
    /**
     * Query the user that posted the trick.
     */
   
     public function user() {
        return $this->belongsTo('Drstock\User');
    }
    public function vente_lignes() {
    return $this->hasMany('Drstock\Ligne_vente' ,'vente_lignes_commande_id');}


    public function invoicevente()
    {
     return $this->hasOne('Drstock\Invoice_vente','reference_cmd');
    }
    public function client()
    {
        return $this->belongsTo('Drstock\Client','client_id');
    }
    
}
