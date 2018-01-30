<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   protected $table = 'categorys';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'name','description'];

    
    /**
     * Query the user that posted the trick.
     */
    public function articles() {
        return $this->hasMany('Drstock\Article','category_id');}
}
