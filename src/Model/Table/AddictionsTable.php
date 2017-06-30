<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Addictions Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 *
 * @method \App\Model\Entity\Addiction get($primaryKey, $options = [])
 * @method \App\Model\Entity\Addiction newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Addiction[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Addiction|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Addiction patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Addiction[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Addiction findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AddictionsTable extends Table
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

        $this->setTable('addictions');
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
            ->boolean('smoking')
            ->requirePresence('smoking', 'create')
            ->notEmpty('smoking');

        $validator
            ->allowEmpty('quantityconsumed');

        $validator
            ->boolean('parientssmoke')
            ->requirePresence('parientssmoke', 'create')
            ->notEmpty('parientssmoke');

        $validator
            ->allowEmpty('timeinhalnicotine');

        $validator
            ->boolean('passivesmoker')
            ->requirePresence('passivesmoker', 'create')
            ->notEmpty('passivesmoker');

        $validator
            ->boolean('alcoholism')
            ->requirePresence('alcoholism', 'create')
            ->notEmpty('alcoholism');

        $validator
            ->allowEmpty('timeintake');

        $validator
            ->allowEmpty('quantity');

        $validator
            ->boolean('coalcoholic')
            ->requirePresence('coalcoholic', 'create')
            ->notEmpty('coalcoholic');

        $validator
            ->boolean('drugaddiction')
            ->requirePresence('drugaddiction', 'create')
            ->notEmpty('drugaddiction');

        $validator
            ->boolean('violence')
            ->requirePresence('violence', 'create')
            ->notEmpty('violence');

        $validator
            ->allowEmpty('typeviolence');

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
