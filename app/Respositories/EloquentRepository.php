<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Auth;

abstract class EloquentRepository {

    /**
     * Returns all models.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all($perPage = null) {
        if (is_null($perPage)) {
            return $this->model->all();
        } else {
            return $this->model->paginate($perPage);
        }
    }

    /**
     * Returns all models.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function byId($id, $proposition = null) {
        if (is_null($proposition)) {
            return $this->model->find($id);
        } else {
            return $this->model->where('active', 1)->find($id);
        }
    }

    public function byIds($ids) {
        return $this->model->where('active', 1)->whereIn('id', $ids)->get();
    }

    public function bySlug($slug) {
        return $this->model->where('slug', $slug)->first();
    }

    

    /**
     * Returns active models.
     * byStatus
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function byStatus($status, $perPgae = 20) {
        return $this->model->where('active', $status)->paginate($perPgae);
    }

    /**
     * Returns paginated result.
     *
     * @param int $perPage
     *
     * @return \Illuminate\Pagination\Paginator
     */
    public function paginate($perPage = 20) {
        return $this->model->paginate($perPage);
    }

    /**
     * Count all the registered users
     *
     * @return stdObject Collection of users
     */
    public function count() {
        return $this->model->count();
    }
    

    /**
     * Deletes a model by id.
     *
     * @param int $id
     */
    public function destroy($id) {

         $this->model->destroy($id);
          $result['message'] = trans('text.card-deleted');return $result;
    }

    public function activate($id) {
        $model = $this->model->findOrFail($id);
        $model->active = 1;
        $model->save();

        return $model;
    }

    public function desactivate($id) {
        $model = $this->model->findOrFail($id);
        $model->active = 0;
        $model->save();

        return $model;
    }
 
    
     } 

    



