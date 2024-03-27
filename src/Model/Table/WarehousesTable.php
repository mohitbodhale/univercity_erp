<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Warehouses Model
 *
 * @method \App\Model\Entity\Warehouse newEmptyEntity()
 * @method \App\Model\Entity\Warehouse newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse get($primaryKey, $options = [])
 * @method \App\Model\Entity\Warehouse findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Warehouse patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Warehouse|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warehouse saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Warehouse[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class WarehousesTable extends Table
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

        $this->setTable('warehouses');
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
            ->scalar('warehouse_name')
            ->maxLength('warehouse_name', 255)
            ->requirePresence('warehouse_name', 'create')
            ->notEmptyString('warehouse_name');

        return $validator;
    }
}
