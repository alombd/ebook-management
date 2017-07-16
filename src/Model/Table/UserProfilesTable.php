<?php
namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User newEntity($data = null, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User|bool save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities($entities, array $data, array $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, callable $callback = null)
 *
 * @mixin \Cake\ORM\Behavior\TimestampBehavior
 */
class UserProfilesTable extends Table
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

        $this->table('user_profiles');
        $this->displayField('id');
        $this->primaryKey('id');

        $this->addBehavior('Timestamp');
    }

    /**
     * Default validation rules.
     *
     * @param \Cake\Validation\Validator $validator Validator instance.
     * @return \Cake\Validation\Validator
     */

     public function validationDefault(Validator $validator )
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');

        $validator
            ->requirePresence('first_name', 'First name is required')
            ->notEmpty('first_name', 'A title is required');

        $validator
            ->requirePresence('last_name', 'create')
            ->notEmpty('last_name');
            
        $validator->add(
        'email', 
        ['unique' => [
            'rule' => 'validateUnique', 
            'provider' => 'table', 
            'message' => 'Not unique']
        ]
         );
            
        $validator
            ->notEmpty('email', 'A email is required')
            ->add('email', 'valid' , ['rule'=> 'email'])
            ->requirePresence('email','create');

         $validator
            ->integer('phone_number', 'Phone Number is required ')
            ->add('phone_number', ['length' => ['rule' => ['minLength', 11],'message' => 'Phone Number need to be 11 digit',]])
            ->notEmpty('phone_number');

        $validator
            ->requirePresence('present_address', 'create')
            ->notEmpty('present_address');

        $validator
            ->requirePresence('permanent_address', 'create')
            ->notEmpty('permanent_address');

         $validator
            ->requirePresence('date_of_birth', 'create')
            ->notEmpty('date_of_birth');

         $validator
            ->requirePresence('profile_photo', 'create')
            ->notEmpty('profile_photo');    

        return $validator;
    }

}