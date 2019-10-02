<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Address Entity
 *
 * @property int $id
 * @property string $address
 * @property string $number
 * @property string|null $complement
 * @property string|null $instructions
 * @property string $district
 * @property string $city
 * @property int $state_id
 * @property string $zipcode
 * @property string $controller
 * @property int $controllerid
 * @property int $countries_id
 *
 * @property \App\Model\Entity\State $state
 */
class Address extends Entity
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
        'address' => true,
        'number' => true,
        'complement' => true,
        'instructions' => true,
        'district' => true,
        'city' => true,
        'states_id' => true,
        'zipcode' => true,
        'controller' => true,
        'controllerid' => true,
        'countries_id' => true,
        'state' => true
    ];
}
