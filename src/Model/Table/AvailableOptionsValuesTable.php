<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * AvailableOptionsValues Model
 *
 * @method \App\Model\Entity\AvailableOptionsValue newEmptyEntity()
 * @method \App\Model\Entity\AvailableOptionsValue newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue get($primaryKey, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\AvailableOptionsValue[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class AvailableOptionsValuesTable extends Table
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

        $this->setTable('available_options_values');
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
            ->scalar('description')
            ->requirePresence('description', 'create')
            ->notEmptyString('description')
            ->add('description', 'unique', ['rule' => 'validateUnique', 'provider' => 'table']);

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
        $rules->add($rules->isUnique(['description']), ['errorField' => 'description']);

        return $rules;
    }
}
