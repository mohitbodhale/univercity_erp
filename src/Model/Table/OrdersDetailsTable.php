<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * OrdersDetails Model
 *
 * @property \App\Model\Table\OrdersTable&\Cake\ORM\Association\BelongsTo $Orders
 *
 * @method \App\Model\Entity\OrdersDetail newEmptyEntity()
 * @method \App\Model\Entity\OrdersDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\OrdersDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\OrdersDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\OrdersDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\OrdersDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdersDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdersDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\OrdersDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class OrdersDetailsTable extends Table
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

        $this->setTable('orders_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->belongsTo('Orders', [
            'foreignKey' => 'orders_id',
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
            ->integer('type')
            ->allowEmptyString('type');

        $validator
            ->integer('orders_id')
            ->notEmptyString('orders_id');

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
        $rules->add($rules->existsIn('orders_id', 'Orders'), ['errorField' => 'orders_id']);

        return $rules;
    }
}
