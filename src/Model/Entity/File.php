<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * File Entity
 *
 * @property int $id
 * @property string $name
 * @property string $mimetype
 * @property string $extension
 * @property string $content
 * @property int $size
 * @property string $description
 * @property string $controller
 * @property int $controllerid
 */
class File extends Entity
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
        'mimetype' => true,
        'extension' => true,
        'content' => true,
        'size' => true,
        'description' => true,
        'controller' => true,
        'controllerid' => true
    ];
}
