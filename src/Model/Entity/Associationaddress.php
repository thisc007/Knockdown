<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Associationaddress Entity
 *
 * @property int $id
 * @property int $associations_id
 * @property string $address
 * @property int|null $number
 * @property string|null $complement
 * @property string $zipcode
 * @property string|null $observations
 *
 * @property \App\Model\Entity\Association $association
 */
class Associationaddress extends Entity
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
        'associations_id' => true,
        'address' => true,
        'number' => true,
        'complement' => true,
        'zipcode' => true,
        'observations' => true,
        'association' => true
    ];
}
