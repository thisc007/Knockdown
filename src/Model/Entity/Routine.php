<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Routine Entity
 *
 * @property int $id
 * @property int $competitions_id
 * @property int $users_id
 * @property float|null $average
 * @property int|null $position
 *
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\User $user
 */
class Routine extends Entity
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
        'competitions_id' => true,
        'users_id' => true,
        'average' => true,
        'position' => true,
        'competition' => true,
        'user' => true
    ];
}
