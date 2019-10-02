<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Playoff Entity
 *
 * @property int $id
 * @property int $competitions_id
 * @property int $users_id
 * @property int|null $users2_id
 * @property bool $result
 *
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Users2 $users2
 */
class Playoff extends Entity
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
        'users2_id' => true,
        'result' => true,
        'competition' => true,
        'user' => true,
        'users2' => true
    ];
}
