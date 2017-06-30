<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Addiction Entity
 *
 * @property int $id
 * @property int $patient_id
 * @property bool $smoking
 * @property string $quantityconsumed
 * @property bool $parientssmoke
 * @property string $timeinhalnicotine
 * @property bool $passivesmoker
 * @property bool $alcoholism
 * @property string $timeintake
 * @property string $quantity
 * @property bool $coalcoholic
 * @property bool $drugaddiction
 * @property string $type
 * @property bool $violence
 * @property string $typeviolence
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Patient $patient
 */
class Addiction extends Entity
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
