<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Phone Entity
 *
 * @property int $id
 * @property int $countrycode
 * @property int $areacode
 * @property int $number
 * @property int|null $extension
 * @property int $type
 * @property string $controller
 * @property int $controllerid
 */
class Phone extends Entity
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
        'countrycode' => true,
        'areacode' => true,
        'number' => true,
        'extension' => true,
        'type' => true,
        'controller' => true,
        'controllerid' => true
    ];
}
