<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Provider;

use Drstock\Provider;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentProviderRepository extends EloquentRepository implements ProviderRepository {

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
    public function __construct(Provider $model) {
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
        $provider = new $this->model;

       
        $provider->name = e($data['name']);
        $provider->tel = e($data['tel']);
        $provider->fax = e($data['fax']);
        $provider->mail = e($data['mail']);
        $provider->name_society = e($data['name_society']);
        $provider->adresse = e($data['adresse']);
        $provider->image = e($data['image']);
        

        $save = $provider->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $provider->id;
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
    public function update($provider, array $data) {

        $provider->name = e($data['name']);
        $provider->tel = e($data['tel']);
        $provider->fax = e($data['fax']);
        $provider->mail = e($data['mail']);
        $provider->name_society = e($data['name_society']);
        $provider->adresse = e($data['adresse']);
        $provider->image = e($data['image']);
        

        $save = $provider->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $provider->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }

}
