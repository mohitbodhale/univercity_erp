<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Tests Model
 *
 * @property \App\Model\Table\SlotsTable&\Cake\ORM\Association\BelongsTo $Slots
 * @property \App\Model\Table\QuizsDetailsTable&\Cake\ORM\Association\BelongsTo $QuizsDetails
 *
 * @method \App\Model\Entity\Test newEmptyEntity()
 * @method \App\Model\Entity\Test newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Test[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Test get($primaryKey, $options = [])
 * @method \App\Model\Entity\Test findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Test patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Test[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Test|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Test saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TestsTable extends Table
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

        $this->setTable('tests');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Slots', [
            'foreignKey' => 'slots_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('QuizsDetails', [
            'foreignKey' => 'quizs_details_id',
            'joinType' => 'INNER',
        ]);
        $this->hasMany('TestsDetails', [
            'foreignKey' => 'tests_id',
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
        // $validator
        //     ->scalar('test_name')
        //     ->maxLength('test_name', 255)
        //     ->requirePresence('test_name', 'create')
        //     ->notEmptyString('test_name');

        // $validator
        //     ->integer('slots_id')
        //     ->notEmptyString('slots_id');

        // $validator
        //     ->integer('quizs_details_id')
        //     ->notEmptyString('quizs_details_id');

        // $validator
        //     ->integer('status')
        //     ->requirePresence('status', 'create')
        //     ->notEmptyString('status');

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
        $rules->add($rules->existsIn('slots_id', 'Slots'), ['errorField' => 'slots_id']);
        $rules->add($rules->existsIn('quizs_details_id', 'QuizsDetails'), ['errorField' => 'quizs_details_id']);

        return $rules;
    }
}
