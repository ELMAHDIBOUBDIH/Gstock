<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Paymentvente;

use Drstock\Payment_vente;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentPaymentventeRepository extends EloquentRepository implements PaymentventeRepository {

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
    public function __construct(Payment_vente $model) {
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
   public function create(array $data,$Invoicevente) {


        $Paymentvente = new $this->model;
         
        $Paymentvente->Invoice_id = e($data['Invoice_id']);
        $Paymentvente->date = e($data['date']);
        $Paymentvente->description = e($data['description']);
        $Paymentvente->montant = e($data['total']);
        $Paymentvente->payer = e($data['payer']);
        $Paymentvente->rest_pay = e($data['rest']-$data['payer']);
        $Paymentvente->type = e($data['type']);
        $Invoicevente->credit= $Paymentvente->rest_pay;

        $save = $Paymentvente->save();
        $save = $Invoicevente->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $Paymentvente->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-created');
        }

        return $result;
    }


}
