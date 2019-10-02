<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Suspension Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int $days
 * @property string $description
 * @property \Cake\I18n\FrozenDate $startdate
 * @property bool $baned
 *
 * @property \App\Model\Entity\User $user
 */
class Suspension extends Entity
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
        'days' => true,
        'description' => true,
        'startdate' => true,
        'baned' => true,
        'user' => true
    ];
}
