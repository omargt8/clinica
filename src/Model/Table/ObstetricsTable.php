<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Obstetrics Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Obstetric get($primaryKey, $options = [])
 * @method \App\Model\Entity\Obstetric newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Obstetric[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Obstetric|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Obstetric patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Obstetric[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Obstetric findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ObstetricsTable extends Table
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

        $this->setTable('obstetrics');
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
            ->requirePresence('menarche', 'create')
            ->notEmpty('menarche', 'Llene este campo');

        $validator
            ->boolean('menstrualrhit')
            ->requirePresence('menstrualrhit', 'create')
            ->notEmpty('menstrualrhit');

        $validator
            ->date('fum')
            ->requirePresence('fum', 'create')
            ->notEmpty('fum');

        $validator
            ->boolean('children')
            ->requirePresence('children', 'create')
            ->notEmpty('children');

        $validator
            ->allowEmpty('cantchildren');

        $validator
            ->date('fpp')
            ->allowEmpty('fpp');

        $validator
            ->date('fup')
            ->allowEmpty('fup');

        $validator
            ->boolean('pregnant')
            ->requirePresence('pregnant', 'create')
            ->notEmpty('pregnant');

        $validator
            ->boolean('treatment')
            ->allowEmpty('treatment');

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
