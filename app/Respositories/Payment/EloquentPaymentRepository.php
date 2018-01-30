<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Payment;

use Drstock\Payment;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentPaymentRepository extends EloquentRepository implements PaymentRepository {

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
    public function __construct(Payment $model) {
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
   public function create(array $data,$Invoice) {


        $Payment = new $this->model;
        $Payment->invoice_id = e($data['invoice_id']);
        $Payment->date = e($data['date']);
        $Payment->description = e($data['description']);
        $Payment->montant = e($data['total']);
        $Payment->payer = e($data['payer']);
        $Payment->rest_pay = e($data['rest']-$data['payer']);
        $Payment->type = e($data['type']);
        $Invoice->credit= $Payment->rest_pay;

        $save = $Payment->save();
        $save = $Invoice->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $Payment->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }

    

}
