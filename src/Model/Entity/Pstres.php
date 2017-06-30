<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pstres Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property string $studyhours
 * @property string $studydays
 * @property bool $pstress
 * @property bool $beforeevaluations
 * @property bool $duringevaluations
 * @property bool $supportunit
 * @property int $created
 * @property int $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Pstres extends Entity
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
