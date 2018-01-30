<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Cmdachat;

use Drstock\Commade_achat;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentCmdachatRepository extends EloquentRepository implements CmdachatRepository {

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
    public function __construct(Commade_achat $model) {
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
        $cmdachat = new $this->model;

        $cmdachat->date = e($data['date']);
        $cmdachat->provider_id = e($data['provider_id']);
        $cmdachat->total = e($data['total']);
        $cmdachat->etat = e('en traitement');
        $save = $cmdachat->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $cmdachat->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }
    public function update($cmdachat,array $data) {
      

        $cmdachat->date = e($data['date']);
        $cmdachat->total = e($data['total']);
         if(isset($data['etat']))
        {dd("zzzz");}
        $save = $cmdachat->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['id'] = $cmdachat->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-updated');
        }

        return $result;
    }

    public function recherche_Entree($date1,$date2,$id)
     {
        if($id!="0")
        {return $model= $this->model->where('etat','valide')->where('provider_id','=',$id)->where('date','>=',$date1)->where('date','<=',$date2)->paginate(20);}
    else
    {return $model=$this->model->where('etat','valide')->where('date','>=',$date1)->where('date','<=',$date2)->paginate(20);  
    }
   
     }
}
