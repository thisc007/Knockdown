<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Academyphone Entity
 *
 * @property int $id
 * @property int $academies_id
 * @property int $countrycode
 * @property int $areacode
 * @property int $number
 * @property int|null $extension
 *
 * @property \App\Model\Entity\Academy $academy
 */
class Academyphone extends Entity
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
        'academies_id' => true,
        'countrycode' => true,
        'areacode' => true,
        'number' => true,
        'extension' => true,
        'academy' => true
    ];
}
