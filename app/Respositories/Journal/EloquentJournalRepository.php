<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\;

use Drstock\Commade_achat;
///use Drstock\Commade_vente;
use Drstock\Repositories\EloquentRepository;
use Auth;
use Carbon\Carbon;

class EloquentJournalRepository extends EloquentRepository implements JournalRepository {

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
        $this->model1 = $model1;
       // $this->model2 = $model2;
    }

 
     
   
}
  
