<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Quetions Model
 *
 * @method \App\Model\Entity\Quetion newEmptyEntity()
 * @method \App\Model\Entity\Quetion newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\Quetion[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Quetion get($primaryKey, $options = [])
 * @method \App\Model\Entity\Quetion findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\Quetion patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Quetion[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\Quetion|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quetion saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Quetion[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quetion[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quetion[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\Quetion[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 */
class QuetionsTable extends Table
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

        $this->setTable('quetions');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');
        
        $this->hasMany('QuetionsDetails', [
            'foreignKey' => 'quetions_id',
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
//         $validator
//             ->scalar('tittle')
//             ->requirePresence('tittle', 'create')
//             ->notEmptyString('tittle');

//         $validator
//             ->integer('status')
//             ->requirePresence('status', 'create')
//             ->notEmptyString('status');

        return $validator;
    }
}
