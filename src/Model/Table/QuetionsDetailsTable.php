<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * QuetionsDetails Model
 *
 * @property \App\Model\Table\QuetionsTable&\Cake\ORM\Association\BelongsTo $Quetions
 *
 * @method \App\Model\Entity\QuetionsDetail newEmptyEntity()
 * @method \App\Model\Entity\QuetionsDetail newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\QuetionsDetail[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\QuetionsDetail get($primaryKey, $options = [])
 * @method \App\Model\Entity\QuetionsDetail findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\QuetionsDetail patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\QuetionsDetail[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\QuetionsDetail|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuetionsDetail saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\QuetionsDetail[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuetionsDetail[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuetionsDetail[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\QuetionsDetail[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class QuetionsDetailsTable extends Table
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

        $this->setTable('quetions_details');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Quetions', [
            'foreignKey' => 'quetions_id',
            'joinType' => 'INNER',
        ]);
        
        // Define the association with AvailableOptionsValues
        $this->belongsTo('AvailableOptionsValues', [
            //'className' => 'AvailableOptionsValues', // Name of the related model class
            'foreignKey' => 'available_options_values_id', // Foreign key in this table
            'joinType' => 'INNER',
            // Other options as needed
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

//         $validator
//             ->scalar('answers_options_key')
//             ->maxLength('answers_options_key', 10)
//             ->requirePresence('answers_options_key', 'create')
//             ->notEmptyString('answers_options_key');

//         $validator
//             ->scalar('answers_options_value')
//             ->requirePresence('answers_options_value', 'create')
//             ->notEmptyString('answers_options_value');

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

        return $rules;
    }
}
