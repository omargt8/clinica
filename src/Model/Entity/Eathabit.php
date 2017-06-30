<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Eathabit Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property string $mealtimes
 * @property string $refreshment
 * @property string $feedingtime
 * @property bool $vegetables
 * @property string $amountvegetables
 * @property bool $fruits
 * @property string $amountfruit
 * @property bool $energydrinks
 * @property string $typeoil
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Eathabit extends Entity
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
