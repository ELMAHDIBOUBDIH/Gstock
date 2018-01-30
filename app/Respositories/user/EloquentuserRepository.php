<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\user;

use Drstock\User;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentuserRepository extends EloquentRepository implements userRepository {

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
    public function __construct(User $model) {
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
        $user = new $this->model;
        $user->name = e($data['name']);
         $user->name = e($data['username']);
        $user->email = e($data['email']);
        $user->password = e(bcrypt($data['password']));
        $save = $user->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $user->id;
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
    public function update($user, array $data) {

        $user->name = e($data['name']); 
        $user->email = e($data['email']);
        $user->name = e($data['username']);
    $user->password = e(bcrypt($data['password']));
    $save = $user->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-Updated');
        } else {
            $result['id'] = $user->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-Updated');
        }

        return $result;
    }


}
