<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Competition Entity
 *
 * @property int $id
 * @property string $name
 * @property int $minage
 * @property int $maxage
 * @property float $minweight
 * @property float $maxweight
 * @property int $mintrainingage
 * @property int $maxtrainingage
 * @property float|null $value
 * @property bool $type
 * @property bool $thirdplace
 * @property bool $recap
 * @property int|null $roundnumbers
 * @property int $referees
 * @property int|null $area
 * @property int $associations_id
 *
 * @property \App\Model\Entity\Association $association
 */
class Competition extends Entity
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
        'name' => true,
        'minage' => true,
        'maxage' => true,
        'minweight' => true,
        'maxweight' => true,
        'mintrainingage' => true,
        'maxtrainingage' => true,
        'value' => true,
        'type' => true,
        'thirdplace' => true,
        'recap' => true,
        'roundnumbers' => true,
        'referees' => true,
        'area' => true,
        'associations_id' => true,
        'association' => true
    ];
}
