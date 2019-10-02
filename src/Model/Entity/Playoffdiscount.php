<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Playoffdiscount Entity
 *
 * @property int $id
 * @property int $users_id
 * @property bool $fighter
 * @property int $rules_id
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Rule $rule
 */
class Playoffdiscount extends Entity
{
    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'users_id' => true,
        'fighter' => true,
        'rules_id' => true,
        'user' => true,
        'rule' => true
    ];
}
