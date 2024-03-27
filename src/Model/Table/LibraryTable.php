<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Library Model
 *
 * @property \App\Model\Table\DepartmentsTable&\Cake\ORM\Association\BelongsTo $Departments
 *
 * @method \App\Model\Entity\Library newEmptyEntity()
 * @method \App\Model\Entity\Library newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Library[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Library get($primaryKey, $options = [])
 * @method \App\Model\Entity\Library findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Library patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Library[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Library|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Library saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Library[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Library[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Library[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Library[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class LibraryTable extends Table
{
    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('library');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Departments', [
            'foreignKey' => 'departments_id',
            'joinType' => 'INNER',
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator): Validator
    {
        $validator
            ->integer('departments_id')
            ->notEmptyString('departments_id');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules): RulesChecker
    {
        $rules->add($rules->existsIn('departments_id', 'Departments'), ['errorField' => 'departments_id']);

        return $rules;
    }
}
