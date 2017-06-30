<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Immunizations Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Immunization get($primaryKey, $options = [])
 * @method \App\Model\Entity\Immunization newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Immunization[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Immunization|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Immunization patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Immunization[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Immunization findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ImmunizationsTable extends Table
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

        $this->setTable('immunizations');
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
            ->boolean('vaccines')
            ->requirePresence('vaccines', 'create')
            ->notEmpty('vaccines');

        $validator
            ->allowEmpty('pending');

        $validator
            ->boolean('sexualprevention')
            ->requirePresence('sexualprevention', 'create')
            ->notEmpty('sexualprevention');

        $validator
            ->boolean('condom')
            ->requirePresence('condom', 'create')
            ->notEmpty('condom');

        $validator
            ->allowEmpty('ageonset');

        $validator
            ->boolean('planning')
            ->requirePresence('planning', 'create')
            ->notEmpty('planning');

        $validator
            ->allowEmpty('injectionprotocol');

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
