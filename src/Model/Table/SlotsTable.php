<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Slots Model
 *
 * @method \App\Model\Entity\Slot newEmptyEntity()
 * @method \App\Model\Entity\Slot newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Slot[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Slot get($primaryKey, $options = [])
 * @method \App\Model\Entity\Slot findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Slot patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Slot[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Slot|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Slot saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Slot[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Slot[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Slot[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Slot[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class SlotsTable extends Table
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

        $this->setTable('slots');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
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
            ->scalar('slots_name')
            ->maxLength('slots_name', 255)
            ->requirePresence('slots_name', 'create')
            ->notEmptyString('slots_name');

        $validator
            ->dateTime('start_time')
            ->requirePresence('start_time', 'create')
            ->notEmptyDateTime('start_time');

        $validator
            ->dateTime('end_time')
            ->requirePresence('end_time', 'create')
            ->notEmptyDateTime('end_time');

        return $validator;
    }
}
