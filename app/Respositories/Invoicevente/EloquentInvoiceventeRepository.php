<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\Invoicevente;

use Drstock\Invoice_vente;
use Drstock\Repositories\EloquentRepository;
use Auth;
use Carbon\Carbon;

class EloquentInvoiceventeRepository extends EloquentRepository implements InvoiceventeRepository {

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
    public function __construct(Invoice_vente $model) {
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
  public function create($idcmd,$commande_vente) {
        $dt = Carbon::now();
       
       $Invoicevente = new $this->model;
        $Invoicevente->reference_cmd = e($idcmd);
        $Invoicevente->Invoice_type = e("vente");
        $Invoicevente->credit = e($commande_vente->total);
        $Invoicevente->date= e($dt->toDateString());
       $commande_vente->etat= e("valide");
       $commande_vente->save();
       $save = $Invoicevente->save();
       
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $Invoicevente->id;
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
 public function update(array $data,$Invoicevente ) {

        
        
        
        $Invoicevente->date = e($data['date']);
        $save = $Invoicevente->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['id'] = $Invoicevente->id;
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
public function updatestock($commande_vente)
{
      foreach ($commande_vente->vente_lignes as $a) {
$a->article->available_qnt =$a->article->available_qnt - $a->qnt_cmd ;
$a->article->prix_achat =$a->prix_unitaire;
$a->article->save();
}
}

}
