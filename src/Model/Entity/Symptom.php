<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Symptom Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property bool $asthenia
 * @property bool $adynamia
 * @property bool $anorexy
 * @property bool $fever
 * @property bool $headache
 * @property string $consultation
 * @property string $ccondition
 * @property string $fc
 * @property string $ta
 * @property string $fr
 * @property int $temperature
 * @property float $weight
 * @property float $csize
 * @property float $imc
 * @property string $blood
 * @property string $exploration
 * @property string $diagnostic
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Symptom extends Entity
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
