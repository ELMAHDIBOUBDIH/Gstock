<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Ligne_achat extends Model
{
     protected $table = 'achat_lignes';

    /**
     * The proprieties that can be filled in this model.
     */
     protected $fillable = ['achat_lignes_commande_id','id_article', 'qnt_cmd','prix_unitaire','TVA','T_HT','T_TTC'];

    
    /**
     * Query the user that posted the trick.
     */
    public function commande_achat() {
        return $this->belongsTo('Drstock\Commande_achat','achat_lignes_commande_id');
    }
    public function article() {
        return $this->belongsTo('Drstock\Article','id_article');
    }
    public function payments() {
        return $this->hasMany('Drstock\Payment','invoice_id');
    }
}
