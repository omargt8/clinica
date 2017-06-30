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
 * @property string $faculty_id
 * @property string $career_id
 * @property string $marital_status
 * @property string $occupation
 * @property string $department
 * @property string $town
 * @property bool $children
 * @property string $transport
 * @property float $money
 * @property \Cake\I18n\Time $created
 * @property \Cake\I18n\Time $modified
 *
 * @property \App\Model\Entity\Faculty $faculty
 * @property \App\Model\Entity\Career $career
 * @property \App\Model\Entity\Addiction[] $addictions
 * @property \App\Model\Entity\Allergy[] $allergys
 * @property \App\Model\Entity\Eathabit[] $eathabits
 * @property \App\Model\Entity\Immunization[] $immunizations
 * @property \App\Model\Entity\Inheritance[] $inheritances
 * @property \App\Model\Entity\Lifestyle[] $lifestyles
 * @property \App\Model\Entity\Nonpathological[] $nonpathologicals
 * @property \App\Model\Entity\Obstetric[] $obstetrics
 * @property \App\Model\Entity\Pathological[] $pathologicals
 * @property \App\Model\Entity\Pstres[] $pstress
 * @property \App\Model\Entity\Symptom[] $symptoms
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
