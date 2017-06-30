<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Inheritance Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property bool $hypertension
 * @property bool $mellitusdiabetes
 * @property bool $cardiopathies
 * @property bool $nephropathy
 * @property bool $epilpsy
 * @property bool $bronchialasthma
 * @property bool $cancer
 * @property string $typecancer
 * @property string $others
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Inheritance extends Entity
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
