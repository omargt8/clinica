<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Obstetric Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property string $menarche
 * @property bool $menstrualrhit
 * @property \Cake\I18n\Time $fum
 * @property bool $children
 * @property string $cantchildren
 * @property \Cake\I18n\Time $fpp
 * @property \Cake\I18n\Time $fup
 * @property bool $pregnant
 * @property bool $treatment
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Obstetric extends Entity
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
