<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Patient Entity
 *
 * @property int $id
 * @property int $carnet
 * @property string $first_name
 * @property string $last_name
 * @property int $age
 * @property string $gender
 * @property string $income
 * @property string $faculty
 * @property string $career
 * @property string $marital_status
 * @property string $occupation
 * @property string $department
 * @property string $town
 * @property bool $children
 * @property string $transport
 * @property float $money
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 */
class Patient extends Entity
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
        '*' => true,
        'id' => false
    ];
}
