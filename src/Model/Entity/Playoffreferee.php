<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Playoffreferee Entity
 *
 * @property int $id
 * @property int $playoffs_id
 * @property int $users_id
 * @property int $resultfighter1
 * @property int $resultfighter2
 * @property int|null $round
 *
 * @property \App\Model\Entity\Playoff $playoff
 * @property \App\Model\Entity\User $user
 */
class Playoffreferee extends Entity
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
        'playoffs_id' => true,
        'users_id' => true,
        'resultfighter1' => true,
        'resultfighter2' => true,
        'round' => true,
        'playoff' => true,
        'user' => true
    ];
}
