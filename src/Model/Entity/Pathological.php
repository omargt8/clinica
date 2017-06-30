<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pathological Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property bool $surgicalinterven
 * @property string $typeintervention
 * @property bool $venerealdiseases
 * @property string $typevenereal
 * @property string $diasesjoint
 * @property bool $tuberculosis
 * @property string $zoonosis_id
 * @property string $diseasesrisk
 * @property string $othercardiopatia
 * @property string $treatment
 * @property bool $irritablecolon
 * @property bool $peptica
 * @property bool $constipation
 * @property bool $signature
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 * @property \App\Model\Entity\Zoonose $zoonose
 */
class Pathological extends Entity
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
