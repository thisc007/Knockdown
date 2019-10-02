<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Championship Entity
 *
 * @property int $id
 * @property int $associations_id
 * @property string $title
 * @property string $description
 * @property \Cake\I18n\FrozenDate $subscriptiondateini
 * @property \Cake\I18n\FrozenDate $subscriptiondateend
 * @property \Cake\I18n\FrozenDate $championshipdate
 * @property float $value
 *
 * @property \App\Model\Entity\Association $association
 */
class Championship extends Entity
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
        'title' => true,
        'description' => true,
        'subscriptiondateini' => true,
        'subscriptiondateend' => true,
        'championshipdate' => true,
        'value' => true,
        'association' => true
    ];
}
