<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Eathabits Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Eathabit get($primaryKey, $options = [])
 * @method \App\Model\Entity\Eathabit newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Eathabit[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Eathabit|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Eathabit patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Eathabit[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Eathabit findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class EathabitsTable extends Table
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

        $this->setTable('eathabits');
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
            ->requirePresence('mealtimes', 'create')
            ->notEmpty('mealtimes', 'Llene este campo');

        $validator
            ->requirePresence('refreshment', 'create')
            ->notEmpty('refreshment', 'Llene este campo');

        $validator
            ->requirePresence('feedingtime', 'create')
            ->notEmpty('feedingtime', 'Llene este campo');

        $validator
            ->boolean('vegetables')
            ->requirePresence('vegetables', 'create')
            ->notEmpty('vegetables');

        $validator
            ->allowEmpty('amountvegetables');

        $validator
            ->boolean('fruits')
            ->requirePresence('fruits', 'create')
            ->notEmpty('fruits');

        $validator
            ->allowEmpty('amountfruit');

        $validator
            ->boolean('energydrinks')
            ->requirePresence('energydrinks', 'create')
            ->notEmpty('energydrinks');

        $validator
            ->requirePresence('typeoil', 'create')
            ->notEmpty('typeoil', 'Llene este campo');

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
