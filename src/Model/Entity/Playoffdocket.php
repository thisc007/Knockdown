<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Playoffdocket Entity
 *
 * @property int $id
 * @property int $users_id
 * @property int $playoffs_id
 * @property bool $fighter
 * @property string $Comment
 *
 * @property \App\Model\Entity\User $user
 * @property \App\Model\Entity\Playoff $playoff
 */
class Playoffdocket extends Entity
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
        'playoffs_id' => true,
        'fighter' => true,
        'Comment' => true,
        'user' => true,
        'playoff' => true
    ];
}
