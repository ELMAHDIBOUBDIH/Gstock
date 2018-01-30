<?php

namespace Drstock;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
        protected $table = 'clients';

    /**
     * The proprieties that can be filled in this model.
     */
    protected $fillable = [ 'name_society','name','tel','fax','adresse','mail','image'];

    public function cmdventes()
    {
       return $this->hasMany('Drstock\Commade_vente','client_id');
    }
    

}
