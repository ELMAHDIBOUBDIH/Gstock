<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Cmdvente;

use Drstock\Commade_vente;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentCmdventeRepository extends EloquentRepository implements CmdventeRepository {

    /**
     * The eloquent model instance.
     *
     * @var \Drstock\Models\Incident
     */
    protected $model;

    /**
     * Create a new eloquent incident repository instance.
     *
     * @param \Drstock\Models\Incident $model
     */
    public function __construct(Commade_vente $model) {
        $this->model = $model;
    }


    /**
     * Create a new model.
     *
     * @param int   $userId
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function create(array $data) {
        $cmdvente = new $this->model;

        $cmdvente->date = e($data['date']);
        $cmdvente->client_id = e($data['client_id']);
        $cmdvente->total = e($data['total']);
        $cmdvente->etat = e('invalide');
        $save = $cmdvente->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $cmdvente->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }
    public function update($cmdvente,array $data) {
      

        $cmdvente->date = e($data['date']);
        $cmdvente->total = e($data['total']);
        $save = $cmdvente->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $cmdvente->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }

   public function recherche_Sortie($date1,$date2,$id)
     {
        if($id!="0")
        {return $model=$this->model->where('etat','valide')->where('client_id','=',$id)->where('date','>=',$date1)->where('date','<=',$date2)->paginate(20);}
    else
    {return $model=$this->model->where('etat','valide')->where('date','>=',$date1)->where('date','<=',$date2)->paginate(20);  
    }
}
}