<?php

/*
 * This file is part of Cachet.
 *
 * (c) Cachet HQ <support@cachethq.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Drstock\Repositories\ligneachat;

use Drstock\Ligne_achat;
use Drstock\Repositories\EloquentRepository;
use Auth;

class EloquentligneachatRepository extends EloquentRepository implements LigneachatRepository {

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
    public function __construct(Ligne_achat $model) {
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
  public function create(array $data,$id,$commande_achat) {
        $ligneachat = new $this->model;
        $ligneachat->achat_lignes_commande_id = e($id);
        $ligneachat->id_article = e($data['id_article']);
        $ligneachat->qnt_cmd = e($data['qnt_cmd']);
        $ligneachat->prix_unitaire = e($data['prix_unitaire']);
        $ligneachat->TVA = e($data['TVA']);
        $ligneachat->T_HT = e($data['prix_unitaire']*$data['qnt_cmd']);
        $ligneachat->T_TTC = e($data['prix_unitaire']*$data['qnt_cmd']*(1+$data['TVA']/100));
        $commande_achat->total= e(($commande_achat->total)+($ligneachat->T_TTC));
      
        $save = $ligneachat->save();
        $save = $commande_achat->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-created');
        } else {
            $result['id'] = $ligneachat->id;
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
   public function update(array $data,$commande_achat,$ligneachat,$total_old) {

        
        
        
        $ligneachat->qnt_cmd = e($data['qnt_cmd']);
        $ligneachat->prix_unitaire = e($data['prix_unitaire']);
        $ligneachat->TVA = e($data['TVA']);
        $ligneachat->T_HT = e($data['prix_unitaire']*$data['qnt_cmd']);
        $ligneachat->T_TTC = e(($data['prix_unitaire']*$data['qnt_cmd'])*(1+$data['TVA']/100));
        $commande_achat->total= e(($commande_achat->total)-($total_old)+($ligneachat->T_TTC));
        
      
        $save = $ligneachat->save();
        $save = $commande_achat->save();
        
        if (!$save) {
            $result['success'] = false;
            $result['message'] = trans('text.card-not-updated');
        } else {
            $result['id'] = $ligneachat->id;
            $result['success'] = true;
            $result['message'] = trans('text.card-updated');
        }

        return $result;
    }

}
