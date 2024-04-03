<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * TestsDetails Model
 *
 * @property \App\Model\Table\QuetionsTable&\Cake\ORM\Association\BelongsTo $Quetions
 * @property \App\Model\Table\TestsTable&\Cake\ORM\Association\BelongsTo $Tests
 *
 * @method \App\Model\Entity\TestsDetail newEmptyEntity()
 * @method \App\Model\Entity\TestsDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\TestsDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\TestsDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\TestsDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\TestsDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\TestsDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\TestsDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestsDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\TestsDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TestsDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\TestsDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\TestsDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class TestsDetailsTable extends Table
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

        $this->setTable('tests_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quetions', [
            'foreignKey' => 'quetions_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Tests', [
            'foreignKey' => 'tests_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('AvailableOptionsValues', [
            'foreignKey' => 'available_options_values_id',
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
            ->integer('quetions_id')
            ->notEmptyString('quetions_id');

        $validator
            ->integer('tests_id')
            ->notEmptyString('tests_id');

        $validator
            ->integer('available_options_values_id')
            ->notEmptyString('available_options_values_id');

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
        $rules->add($rules->existsIn('quetions_id', 'Quetions'), ['errorField' => 'quetions_id']);
        $rules->add($rules->existsIn('tests_id', 'Tests'), ['errorField' => 'tests_id']);
        $rules->add($rules->existsIn('available_options_values_id', 'AvailableOptionsValues'), ['errorField' => 'available_options_values_id']);

        return $rules;
    }
}
