<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\TableRegistry;

/**
 * Patients Model
 *
 * @method \App\Model\Entity\Patient get($primaryKey, $options = [])
 * @method \App\Model\Entity\Patient newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Patient[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Patient|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Patient patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Patient[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Patient findOrCreate($search, callable $callback = null, $options = [])
 */
class PatientsTable extends Table
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

        $this->setTable('patients');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        //Relacionando la tabla Patients con la tablas
        $this->hasOne('Allergys')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Eathabits')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Immunizations')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Inheritances')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Lifestyles')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Nonpathologicals')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Obstetrics')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Pathologicals')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Addictions')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Pstress')
            ->setDependent(true)
            ->foreignKey('patient_id');
        
        $this->hasOne('Symptoms')
            ->setDependent(true)
            ->foreignKey('patient_id');
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
            ->allowEmpty('id', 'create')
            ->add('id', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

        $validator
            ->integer('carnet')
            ->requirePresence('carnet', 'create')
            ->notEmpty('carnet', 'Llene este campo');

        $validator
            ->requirePresence('first_name', 'create')
            ->notEmpty('first_name', 'Llene este campo');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name', 'Llene este campo');

        $validator
            ->integer('age')
            ->requirePresence('age', 'create')
            ->notEmpty('age', 'Llene este campo');

        $validator
            ->requirePresence('gender', 'create')
            ->notEmpty('gender', 'Llene este campo');

        $validator
            ->requirePresence('income', 'create')
            ->notEmpty('income', 'Llene este campo');

        $validator
            ->requirePresence('faculty', 'create')
            ->notEmpty('faculty', 'Llene este campo');

        $validator
            ->requirePresence('career', 'create')
            ->notEmpty('career', 'Llene este campo');

        $validator
            ->requirePresence('marital_status', 'create')
            ->notEmpty('marital_status', 'Llene este campo');

        $validator
            ->requirePresence('occupation', 'create')
            ->notEmpty('occupation', 'Llene este campo');

        $validator
            ->requirePresence('department', 'create')
            ->notEmpty('department', 'Llene este campo');

        $validator
            ->requirePresence('town', 'create')
            ->notEmpty('town', 'Llene este campo');

        $validator
            ->boolean('children')
            ->requirePresence('children', 'create')
            ->notEmpty('children', 'Llene este campo');

        $validator
            ->requirePresence('transport', 'create')
            ->notEmpty('transport', 'Llene este campo');

        $validator
            ->numeric('money')
            ->requirePresence('money', 'create')
            ->notEmpty('money', 'Llene este campo');

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
        $rules->add($rules->isUnique(['id']));
        $rules->add($rules->isUnique(['carnet'], 'Ya existe un paciente con este mismo Carnet'));

        return $rules;
    }

    public function findPatients(Query $query, array $options)
    {
        $patients = $this->find()
        ->select(['id', 'carnet', 'first_name', 'last_name']);
        return $patients->where(['Patients.carnet  IN' => $options['search']]);
        return $patients->group(['Patients.id']);
    }

}
