<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pstress Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Pstres get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pstres newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pstres[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pstres|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pstres patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pstres[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pstres findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PstressTable extends Table
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

        $this->setTable('pstress');
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
            ->requirePresence('studyhours', 'create')
            ->notEmpty('studyhours', 'Llene este campo');

        $validator
            ->requirePresence('studydays', 'create')
            ->notEmpty('studydays', 'Llene este campo');

        $validator
            ->boolean('stress')
            ->requirePresence('stress', 'create')
            ->notEmpty('stress');

        $validator
            ->boolean('beforeevaluations')
            ->requirePresence('beforeevaluations', 'create')
            ->notEmpty('beforeevaluations');

        $validator
            ->boolean('duringevaluations')
            ->requirePresence('duringevaluations', 'create')
            ->notEmpty('duringevaluations');

        $validator
            ->boolean('supportunit')
            ->requirePresence('supportunit', 'create')
            ->notEmpty('supportunit');

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
