<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Post;

use Drstock\Post;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentPostRepository extends EloquentRepository implements PostRepository {

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
    public function __construct(Post $model) {
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
    public function create($morphic, $userId, array $data, $publishDate = false) {




        $post = new $this->model;

        $post->content = e($data['content']);
        $post->type_name = e($data['type_name']);
        $post->type_value = e($data['type_value']);
        if ($publishDate) {
            $post->created_at = $publishDate;
        }
        $post->user_id = $userId;
        $post->save();

        $morphic->posts()->save($post);

        return $post;
    }

    /**
     * Update a model by id.
     *
     * @param int   $id
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public function update($id, array $data) {

        $Post = $this->model->findOrFail($id);

        $comment->content = e($data['content']);


        $comment->save();


        return $comment;
    }

    public function lastPosts($perPage, $from = null) {
        if (is_null($from)) {
            return $this->model
                            ->where('active', 1)
                            ->orderBy('created_at', 'DESC')
                            ->take($perPage)
                            ->get();
        } else {
            return $this->model
                            ->where('active', 1)
                            ->orderBy('created_at', 'DESC')
                            ->skip($from)
                            ->take($perPage)
                            ->get();
        }
    }

}
