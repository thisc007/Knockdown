<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Rolepayment Entity
 *
 * @property int $id
 * @property int $roles_id
 * @property int $timesinayear
 * @property float $value
 *
 * @property \App\Model\Entity\Role $role
 */
class Rolepayment extends Entity
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
        'roles_id' => true,
        'timesinayear' => true,
        'value' => true,
        'role' => true
    ];
}
