<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table = 'articles';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'barre_code','name','Brand','description','prix_vente','prix_achat','available_qnt','min_qnt','image','category_id'];

    
    /**
     * Query the user that posted the trick.
     */
    public function category() {
        return $this->belongsTo('Drstock\Category','category_id');
    }
     public function achat_lignes() {
        return $this->hasMany('Drstock\Ligne_achat','id_article');}

}
