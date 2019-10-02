<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Competitionrule Entity
 *
 * @property int $id
 * @property int $competitions_id
 * @property int $rules_id
 *
 * @property \App\Model\Entity\Competition $competition
 * @property \App\Model\Entity\Rule $rule
 */
class Competitionrule extends Entity
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
        'competitions_id' => true,
        'rules_id' => true,
        'competition' => true,
        'rule' => true
    ];
}
