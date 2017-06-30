<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Pathologicals Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Patients
 * @property \Cake\ORM\Association\BelongsTo $Zoonoses
 *
 * @method \App\Model\Entity\Pathological get($primaryKey, $options = [])
 * @method \App\Model\Entity\Pathological newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Pathological[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Pathological|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Pathological patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Pathological[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Pathological findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class PathologicalsTable extends Table
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

        $this->setTable('pathologicals');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Patients', [
            'foreignKey' => 'patient_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Zoonosis', [
            'foreignKey' => 'zoonosis_id',
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
            ->boolean('surgicalinterven')
            ->requirePresence('surgicalinterven', 'create')
            ->notEmpty('surgicalinterven');

        $validator
            ->allowEmpty('typeintervention');

        $validator
            ->boolean('venerealdiseases')
            ->requirePresence('venerealdiseases', 'create')
            ->notEmpty('venerealdiseases');

        $validator
            ->allowEmpty('typevenereal');

        $validator
            ->requirePresence('diasesjoint', 'create')
            ->notEmpty('diasesjoint', 'Seleccione una opcion');

        $validator
            ->boolean('tuberculosis')
            ->requirePresence('tuberculosis', 'create')
            ->notEmpty('tuberculosis');

        $validator
            ->requirePresence('diseasesrisk', 'create')
            ->notEmpty('diseasesrisk', 'Seleccione una opcion');

        $validator
            ->allowEmpty('othercardiopatia');

        $validator
            ->allowEmpty('treatment');

        $validator
            ->boolean('irritablecolon')
            ->requirePresence('irritablecolon', 'create')
            ->notEmpty('irritablecolon');

        $validator
            ->requirePresence('zoonosis_id', 'create')
            ->notEmpty('zoonosis_id', 'Seleccione una opcion');

        $validator
            ->boolean('peptica')
            ->requirePresence('peptica', 'create')
            ->notEmpty('peptica');

        $validator
            ->boolean('constipation')
            ->requirePresence('constipation', 'create')
            ->notEmpty('constipation');

        $validator
            ->boolean('signature')
            ->requirePresence('signature', 'create')
            ->notEmpty('signature');

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
        $rules->add($rules->existsIn(['zoonosis_id'], 'Zoonosis'));
        $rules->Add($rules->isUnique(['patient_id'], 'El Paciente ya tiene llenos estos datos'));

        return $rules;
    }
}
