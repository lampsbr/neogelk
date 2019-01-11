<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Proventos Model
 *
 * @property \App\Model\Table\AtivosTable|\Cake\ORM\Association\BelongsTo $Ativos
 *
 * @method \App\Model\Entity\Provento get($primaryKey, $options = [])
 * @method \App\Model\Entity\Provento newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Provento[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Provento|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provento|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Provento patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Provento[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Provento findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class ProventosTable extends Table
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

        $this->setTable('proventos');
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
            ->decimal('valor_total')
            ->requirePresence('valor_total', 'create')
            ->notEmpty('valor_total');

        $validator
            ->scalar('descricao')
            ->maxLength('descricao', 45)
            ->allowEmpty('descricao');

        $validator
            ->decimal('valor_individual')
            ->allowEmpty('valor_individual');

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
