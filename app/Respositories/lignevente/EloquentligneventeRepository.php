<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\lignevente;

use Drstock\Ligne_vente;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentligneventeRepository extends EloquentRepository implements LigneventeRepository {

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
    public function __construct(Ligne_vente $model) {
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
  public function create(array $data,$id,$commande_vente) {
        $lignevente = new $this->model;
        $lignevente->vente_lignes_commande_id = e($id);
        $lignevente->id_article = e($data['id_article']);
        $lignevente->qnt_cmd = e($data['qnt_cmd']);
        $lignevente->prix_unitaire = e($data['prix_unitaire']);
        $lignevente->TVA = e($data['TVA']);
        $lignevente->T_HT = e($data['prix_unitaire']*$data['qnt_cmd']);
        $lignevente->T_TTC = e($data['prix_unitaire']*$data['qnt_cmd']*(1+$data['TVA']/100));
        $commande_vente->total= e(($commande_vente->total)+($lignevente->T_TTC));
      
        $save = $lignevente->save();
        $save = $commande_vente->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $lignevente->id;
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
   public function update(array $data,$commande_vente,$lignevente,$total_old) {

        
        
        
        $lignevente->qnt_cmd = e($data['qnt_cmd']);
        $lignevente->prix_unitaire = e($data['prix_unitaire']);
        $lignevente->TVA = e($data['TVA']);
        $lignevente->T_HT = e($data['prix_unitaire']*$data['qnt_cmd']);
        $lignevente->T_TTC = e(($data['prix_unitaire']*$data['qnt_cmd'])*(1+$data['TVA']/100));
        $commande_vente->total= e(($commande_vente->total)-($total_old)+($lignevente->T_TTC));
        
      
        $save = $lignevente->save();
        $save = $commande_vente->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['id'] = $lignevente->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-updated');
        }

        return $result;
    }

}
