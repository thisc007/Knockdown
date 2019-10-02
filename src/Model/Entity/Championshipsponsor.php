<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Championshipsponsor Entity
 *
 * @property int $id
 * @property int $championships_id
 * @property int $sponsors_id
 * @property int $type
 *
 * @property \App\Model\Entity\Championship $championship
 * @property \App\Model\Entity\Sponsor $sponsor
 */
class Championshipsponsor extends Entity
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
        'sponsors_id' => true,
        'type' => true,
        'championship' => true,
        'sponsor' => true
    ];
}
