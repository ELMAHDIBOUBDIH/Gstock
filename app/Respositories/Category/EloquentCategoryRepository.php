<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Category;

use Drstock\Category;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentCategoryRepository extends EloquentRepository implements CategoryRepository {

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
    public function __construct(Category $model) {
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

        $category = new $this->model;
        
        $category->description= e($data['description']);
        $category->name=e($data['name']);
        
        $save = $category->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
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
    public function update($category, array $data) {
        
        $category->description= e($data['description']);
        $category->name=e($data['name']);
        
        $save = $category->save();

        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['success'] = true;
            $result['message'] = trans('text.card-updated');
        }

        return $result;
    }

}
