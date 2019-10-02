<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;
use Cake\Auth\DefaultPasswordHasher;

/**
 * User Entity
 *
 * @property int $id
 * @property string $firstname
 * @property string|null $nickname
 * @property string $lastname
 * @property string $email
 * @property int $gender
 * @property string $licensenumber
 * @property string $licensediv
 * @property int $academies_id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime $modified
 * @property \Cake\I18n\FrozenDate|null $borndate
 * @property float|null $weight
 * @property float|null $height
 * @property \Cake\I18n\FrozenDate $enrollment_date
 * @property bool $active
 * @property bool $annuity
 * @property string $password
 * @property string|null $borncity
 * @property int|null $states_id
 * @property string|null $token
 *
 * @property \App\Model\Entity\Academy $academy
 * @property \App\Model\Entity\State $state
 */
class User extends Entity
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
        'firstname' => true,
        'nickname' => true,
        'lastname' => true,
        'email' => true,
        'gender' => true,        
        'academies_id' => true,
        'created' => true,
        'modified' => true,
        'borndate' => true,
        'weight' => true,
        'height' => true,
        'enrollment_date' => true,
        'active' => true,
        'annuity' => true,
        'password' => true,
        'borncity' => true,
        'states_id' => true,
        'token' => true,
        'academy' => true,
        'association' => true,
        'state' => true,
        'country' => true
    ];

    /**
     * Fields that are excluded from JSON versions of the entity.
     *
     * @var array
     */
    protected $_hidden = [
        'password',
        'token'
    ];
    
    protected function _setPassword($password)
    {
        $hasher = new DefaultPasswordHasher();
        return $hasher->hash($password);
    }
}
