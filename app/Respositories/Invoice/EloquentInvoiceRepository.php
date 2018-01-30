<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Invoice;

use Drstock\Invoice;
use Drstock\Repositories\EloquentRepository;
use Auth;
use Carbon\Carbon;

class EloquentInvoiceRepository extends EloquentRepository implements InvoiceRepository {

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
    public function __construct(Invoice $model) {
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
  public function create($idcmd,$commande_achat) {
        $dt = Carbon::now();
     
       $Invoice = new $this->model;
        $Invoice->reference_cmd = e($idcmd);
        $Invoice->invoice_type = e("achat");
        $Invoice->credit = e($commande_achat->total);
        $Invoice->date= e($dt->toDateString());
       $commande_achat->etat= e("valide");
       $commande_achat->save();
       $save = $Invoice->save();
       
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $Invoice->id;
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
 public function update(array $data,$Invoice ) {

        $Invoice->date = e($data['date']);
        $save = $Invoice->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['id'] = $Invoice->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-updated');
        }

        return $result;
    }
    /**
     * Update stock qnt article.
     *
     * @param int   $id
     * @param array $data
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
public function updatestock($commande_achat)
{
      foreach ($commande_achat->achat_lignes as $a) {
$a->article->available_qnt =$a->article->available_qnt + $a->qnt_cmd ;
$a->article->prix_achat =$a->prix_unitaire;
$a->article->save();
}
}


}
