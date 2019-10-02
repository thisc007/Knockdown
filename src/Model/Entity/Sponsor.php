<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Sponsor Entity
 *
 * @property int $id
 * @property string $name
 * @property string|null $alias
 * @property string $cnpj
 * @property string $email
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property int $associations_id
 * @property bool $active
 *
 * @property \App\Model\Entity\Association $association
 */
class Sponsor extends Entity
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
        'alias' => true,
        'cnpj' => true,
        'email' => true,
        'created' => true,
        'modified' => true,
        'associations_id' => true,
        'active' => true,
        'association' => true
    ];
}
