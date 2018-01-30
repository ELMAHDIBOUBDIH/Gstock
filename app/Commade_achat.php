<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Commade_achat extends Model
{
    protected $table = 'achat_commandes';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'provider_id','user_id','date','total','etat'];

    
    /**
     * Query the user that posted the trick.
     */
    public function provider() {
        return $this->belongsTo('Drstock\Provider','provider_id');
    }


     public function user() {
        return $this->belongsTo('Drstock\User');
    }


    public function achat_lignes() {
        return $this->hasMany('Drstock\Ligne_achat','achat_lignes_commande_id');}



    public function Invoice()
    {
 //return $this->hasMany('Drstock\Invoice','reference_cmd');
  return $this->hasOne('Drstock\Invoice', 'reference_cmd');
    }
}
