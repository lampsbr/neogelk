<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use SoftDelete\Model\Table\SoftDeleteTrait;
use Cake\Event\Event;
use ArrayObject;

/**
 * Titulos Model
 *
 * @property \App\Model\Table\TipoTitulosTable|\Cake\ORM\Association\BelongsTo $TipoTitulos
 * @property \App\Model\Table\UsersTable|\Cake\ORM\Association\BelongsTo $Users
 * @property \App\Model\Table\AtivosTable|\Cake\ORM\Association\HasMany $Ativos
 *
 * @method \App\Model\Entity\Titulo get($primaryKey, $options = [])
 * @method \App\Model\Entity\Titulo newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\Titulo[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\Titulo|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Titulo|bool saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\Titulo patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\Titulo[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\Titulo findOrCreate($search, callable $callback = null, $options = [])
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class TitulosTable extends Table
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

        $this->setTable('titulos');
        $this->setDisplayField('nome_completo');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');

        $this->belongsTo('TipoTitulos', [
            'foreignKey' => 'tipo_titulo_id',
            'joinType' => 'INNER'
        ]);
        $this->belongsTo('Users', [
            'foreignKey' => 'user_id'
        ]);
        $this->hasMany('Ativos', [
            'foreignKey' => 'titulo_id'
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
            ->scalar('nome')
            ->maxLength('nome', 100)
            ->requirePresence('nome', 'create')
            ->notEmpty('nome');

        $validator
            ->scalar('ticker')
            ->maxLength('ticker', 15)
            ->allowEmpty('ticker');

        $validator
            ->scalar('moeda')
            ->maxLength('moeda', 45)
            ->requirePresence('moeda', 'create')
            ->notEmpty('moeda');

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
        $rules->add($rules->existsIn(['tipo_titulo_id'], 'TipoTitulos'));
        $rules->add($rules->existsIn(['user_id'], 'Users'));

        return $rules;
    }
    
    //trimzao do mau
    public function beforeMarshal(Event $event, ArrayObject $data, ArrayObject $options){
        foreach($data as $key => $value){
            if (is_string($value)) {
                $data[$key] = trim($value);
            }
        }
    }
}
