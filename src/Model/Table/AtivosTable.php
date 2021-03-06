<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;

/**
 * Ativos Model
 *
 * @property \App\Model\Table\TitulosTable|\Cake\ORM\Association\BelongsTo $Titulos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property |\Cake\ORM\Association\HasMany $Cotacaos
 *
 * @method \App\Model\Entity\Ativo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Ativo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Ativo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Ativo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ativo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Ativo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Ativo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Ativo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class AtivosTable extends Table
{
    use SoftDeleteTrait;

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        parent::initialize($config);

        $this->setTable('ativos');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('Titulos', [
            'foreignKey' => 'titulo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Carteiras');
        $this->hasMany('Cotacaos', [
            'foreignKey' => 'ativo_id'
        ]);
        $this->hasMany('Proventos', [
            'foreignKey' => 'ativo_id'
        ]);
        $this->hasMany('Operacaos', [
            'foreignKey' => 'ativo_id'
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
            ->dateTime('dt_compra')
            ->requirePresence('dt_compra', 'create')
            ->notEmpty('dt_compra');

        $validator
            ->dateTime('dt_venda')
            ->allowEmpty('dt_venda');

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
        $rules->add($rules->existsIn(['titulo_id'], 'Titulos'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
}
