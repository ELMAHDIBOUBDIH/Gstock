<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Provider extends Model
{
    protected $table = 'providers';

    /**
     * The proprieties that can be filled in this model.
     */
   protected $fillable = [ 'name_society','name','tel','fax','adresse','mail','image'];
    public function cmdachats()
    {
       return $this->hasMany('Drstock\Commade_achat','provider_id');
    }
}