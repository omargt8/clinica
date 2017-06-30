<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Allergy Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property bool $pollen
 * @property bool $dust
 * @property bool $weather
 * @property bool $food
 * @property bool $drink
 * @property bool $medication
 * @property string $others
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Allergy extends Entity
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
