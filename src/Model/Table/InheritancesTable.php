<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Inheritances Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Inheritance get($primaryKey, $options = [])
 * @method \App\Model\Entity\Inheritance newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Inheritance[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Inheritance|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Inheritance patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Inheritance[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Inheritance findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class InheritancesTable extends Table
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

        $this->setTable('inheritances');
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
            ->boolean('hypertension')
            ->requirePresence('hypertension', 'create')
            ->notEmpty('hypertension');

        $validator
            ->boolean('mellitusdiabetes')
            ->requirePresence('mellitusdiabetes', 'create')
            ->notEmpty('mellitusdiabetes');

        $validator
            ->boolean('cardiopathies')
            ->requirePresence('cardiopathies', 'create')
            ->notEmpty('cardiopathies');

        $validator
            ->boolean('nephropathy')
            ->requirePresence('nephropathy', 'create')
            ->notEmpty('nephropathy');

        $validator
            ->boolean('epilpsy')
            ->requirePresence('epilpsy', 'create')
            ->notEmpty('epilpsy');

        $validator
            ->boolean('bronchialasthma')
            ->requirePresence('bronchialasthma', 'create')
            ->notEmpty('bronchialasthma');

        $validator
            ->boolean('cancer')
            ->requirePresence('cancer', 'create')
            ->notEmpty('cancer');

        $validator
            ->allowEmpty('typecancer');

        $validator
            ->allowEmpty('others');

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
