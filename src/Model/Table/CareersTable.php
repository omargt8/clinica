<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Careers Model
 *
 * @property \Cake\ORM\Association\BelongsTo $Faculties
 * @property \Cake\ORM\Association\HasMany $Patients
 *
 * @method \App\Model\Entity\Career get($primaryKey, $options = [])
 * @method \App\Model\Entity\Career newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Career[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Career|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Career patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Career[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Career findOrCreate($search, callable $callback = null, $options = [])
 */
class CareersTable extends Table
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

        $this->setTable('careers');
        $this->setDisplayField('name');
        $this->setPrimaryKey('id');

        $this->belongsTo('Faculties', [
            'foreignKey' => 'faculty_id',
            'joinType' => 'INNER'
        ]);
        $this->hasMany('Patients', [
            'foreignKey' => 'career_id'
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
            ->requirePresence('name', 'create')
            ->notEmpty('name', 'Este campo no puede ser dejado vacio');

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
        $rules->add($rules->existsIn(['faculty_id'], 'Faculties'));

        return $rules;
    }
}
