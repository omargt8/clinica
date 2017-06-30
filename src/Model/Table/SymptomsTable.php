<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Symptoms Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Symptom get($primaryKey, $options = [])
 * @method \App\Model\Entity\Symptom newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Symptom[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Symptom|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Symptom patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Symptom[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Symptom findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class SymptomsTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('symptoms');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->boolean('asthenia')
            ->requirePresence('asthenia', 'create')
            ->notEmpty('asthenia');

        $validator
            ->boolean('adynamia')
            ->requirePresence('adynamia', 'create')
            ->notEmpty('adynamia');

        $validator
            ->boolean('anorexy')
            ->requirePresence('anorexy', 'create')
            ->notEmpty('anorexy');

        $validator
            ->boolean('fever')
            ->requirePresence('fever', 'create')
            ->notEmpty('fever');

        $validator
            ->boolean('headache')
            ->requirePresence('headache', 'create')
            ->notEmpty('headache');

        $validator
            ->requirePresence('consultation', 'create')
            ->notEmpty('consultation');

        $validator
            ->requirePresence('ccondition', 'create')
            ->notEmpty('ccondition');

        $validator
            ->requirePresence('fc', 'create')
            ->notEmpty('fc');

        $validator
            ->requirePresence('ta', 'create')
            ->notEmpty('ta');

        $validator
            ->requirePresence('fr', 'create')
            ->notEmpty('fr');

        $validator
            ->integer('temperature')
            ->requirePresence('temperature', 'create')
            ->notEmpty('temperature');

        $validator
            ->numeric('weight')
            ->requirePresence('weight', 'create')
            ->notEmpty('weight');

        $validator
            ->numeric('csize')
            ->requirePresence('csize', 'create')
            ->notEmpty('csize');

        $validator
            ->numeric('imc')
            ->requirePresence('imc', 'create')
            ->notEmpty('imc');

        $validator
            ->allowEmpty('blood');

        $validator
            ->requirePresence('exploration', 'create')
            ->notEmpty('exploration');

        $validator
            ->requirePresence('diagnostic', 'create')
            ->notEmpty('diagnostic');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['patient_id'], 'Patients'));
        $rules->Add($rules->isUnique(['patient_id'], 'El Paciente ya tiene llenos estos datos'));

        return $rules;
    }
}
