<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Subscription Entity
 *
 * @property int $id
 * @property int $championshipcompetitions_id
 * @property int $users_id
 * @property bool $payed
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Competition $competition
 */
class Subscription extends Entity
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
        'championshipcompetitions_id' => true,
        'users_id' => true,
        'payed' => true,
        'user' => true,
        'competition' => true
    ];
}
