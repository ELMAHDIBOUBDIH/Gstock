<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Client;

use Drstock\Client;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentClientRepository extends EloquentRepository implements ClientRepository {

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
    public function __construct(Client $model) {
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
        $client = new $this->model;

       
        $client->name = e($data['name']);
        $client->tel = e($data['tel']);
        $client->fax = e($data['fax']);
        $client->mail = e($data['mail']);
        $client->name_society = e($data['name_society']);
        $client->adresse = e($data['adresse']);
        $client->image = e($data['image']);
        

        $save = $client->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $client->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }

    /**
     * Update a model by id.
     *
     * @param int   $id
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($client, array $data) {

        $client->name = e($data['name']);
        $client->tel = e($data['tel']);
        $client->fax = e($data['fax']);
        $client->mail = e($data['mail']);
        $client->name_society = e($data['name_society']);
        $client->adresse = e($data['adresse']);
        $client->image = e($data['image']);
        

        $save = $client->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-Updated');
        } else {
            $result['id'] = $client->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-Updated');
        }

        return $result;
    }

    // count commande whire exist id client

    public function exist_cmd($id,$cmdvente) {
        return $cmdvente->where('client_id',$id)->count();
    }

}
