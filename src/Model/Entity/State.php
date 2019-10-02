<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * State Entity
 *
 * @property int $id
 * @property int $countries_id
 * @property string $name
 * @property string $abbreviation
 *
 * @property \App\Model\Entity\Country $country
 * @property \App\Model\Entity\Address[] $addresses
 * @property \App\Model\Entity\User[] $users
 */
class State extends Entity
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
        'countries_id' => true,
        'name' => true,
        'abbreviation' => true,
        'country' => true,
        'addresses' => true,
        'users' => true
    ];
}
