<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Operacaos Model
 *
 * @property \App\Model\Table\AtivosTable|\Cake\ORM\Association\BelongsTo $Ativos
 *
 * @method \App\Model\Entity\Operacao get($primaryKey, $options = [])
 * @method \App\Model\Entity\Operacao newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Operacao[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Operacao|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operacao|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Operacao patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Operacao[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Operacao findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class OperacaosTable extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('operacaos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Ativos', [
            'foreignKey' => 'ativo_id',
            'joinType' => 'INNER'
        ]);
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */
    public function validationDefault(Validator $validator)
    {
        $validator
            ->uuid('id')
            ->allowEmpty('id', 'create');

        $validator
            ->dateTime('deleted')
            ->allowEmpty('deleted');

        $validator
            ->integer('tipo')
            ->requirePresence('tipo', 'create')
            ->notEmpty('tipo');

        $validator
            ->decimal('quantidade')
            ->requirePresence('quantidade', 'create')
            ->notEmpty('quantidade');

        return $validator;
    }

    /**
     * Returns a rules checker object that will be used for validating
     * application integrity.
     *
     * @param \Cake\ORM\RulesChecker $rules The rules object to be modified.
     * @return \Cake\ORM\RulesChecker
     */
    public function buildRules(RulesChecker $rules)
    {
        $rules->add($rules->existsIn(['ativo_id'], 'Ativos'));

        return $rules;
    }
}
