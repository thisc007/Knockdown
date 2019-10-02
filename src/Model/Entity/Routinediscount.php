<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Routinediscount Entity
 *
 * @property int $id
 * @property int $routines_id
 * @property int $users_id
 * @property int $competitionrules_id
 *
 * @property \App\Model\Entity\Routine $routine
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Competitionrule $competitionrule
 */
class Routinediscount extends Entity
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
        'routines_id' => true,
        'users_id' => true,
        'competitionrules_id' => true,
        'routine' => true,
        'user' => true,
        'competitionrule' => true
    ];
}
