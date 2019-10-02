<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Championshipcompetition Entity
 *
 * @property int $id
 * @property int $championships_id
 * @property int $competitions_id
 *
 * @property \App\Model\Entity\Championship $championship
 * @property \App\Model\Entity\Competition $competition
 */
class Championshipcompetition extends Entity
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
        'championships_id' => true,
        'competitions_id' => true,
        'championship' => true,
        'competition' => true
    ];
}
