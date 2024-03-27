<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuizsDetails Model
 *
 * @property \App\Model\Table\QuizsTable&\Cake\ORM\Association\BelongsTo $Quizs
 * @property \App\Model\Table\SlotsTable&\Cake\ORM\Association\BelongsTo $Slots
 *
 * @method \App\Model\Entity\QuizsDetail newEmptyEntity()
 * @method \App\Model\Entity\QuizsDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuizsDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuizsDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuizsDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuizsDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuizsDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuizsDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuizsDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuizsDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuizsDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuizsDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuizsDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuizsDetailsTable extends Table
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

        $this->setTable('quizs_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Quizs', [
            'foreignKey' => 'quizs_id',
            'joinType' => 'INNER',
        ]);
        $this->belongsTo('Slots', [
            'foreignKey' => 'slots_id',
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
            ->integer('quizs_id')
            ->notEmptyString('quizs_id');

        $validator
            ->integer('slots_id')
            ->notEmptyString('slots_id');

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
        $rules->add($rules->existsIn('quizs_id', 'Quizs'), ['errorField' => 'quizs_id']);
        $rules->add($rules->existsIn('slots_id', 'Slots'), ['errorField' => 'slots_id']);

        return $rules;
    }
}
