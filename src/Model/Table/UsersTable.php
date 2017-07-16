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
class UsersTable extends Table
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

        $this->table('users');
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
    public function validationDefault(Validator $validator)
    {
        $validator
            ->integer('id')
            ->allowEmpty('id', 'create');
         $validator
            ->notEmpty('role', 'A role is required')
            ->add('role', 'inList', [
                'rule' => ['inList', [1, 2]],
                'message' => 'Please enter a valid role'
                ]);

        $validator
            ->requirePresence('user_name')
            ->requirePresence('user_name', 'create')
            ->notEmpty('user_name','User Name is required');

        $validator
            ->requirePresence('first_name', 'First Name is required')
            ->notEmpty('first_name');

        $validator
            ->requirePresence('last_name', 'Last Name is required')
            ->notEmpty('last_name');
        
            $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmpty('email');
     $validator->add(
        'email', 
        ['unique' => [
            'rule' => 'validateUnique', 
            'provider' => 'table', 
            'message' => 'Email already exit']
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
             ->notEmpty('password')
             ->add('password', ['length' => ['rule' => ['minLength', 8],'message' => 'Password need to be at least 8 characters long',]])
             ->add('confirm_password', 'passwordsEqual', [
                        'rule' => function($value, $context) {
                            return isset($context['data']['confirm_password']) &&
                             $context['data']['password'] === $value;      
                        },
                        'message' => 'The two password you typed do not match.',
                ]);
            
        /*$validator
            ->requirePresence('password')
            ->notEmpty('password', 'Please fill this field')
            ->add('password', [
                'password' => [
                    'rule' => ['minLength', 8],
                    'value'=>'', 'autocomplete'=>'off',
                    'message' => 'Password need to be at least 8 characters long',
                ]
            ]);*/

      /*  $validator
            ->requirePresence('confirm_password', 'create')
            ->notEmpty('confirm_password');*/

         /*   $validator->add('confirm_password', 'custom', [
        'rule' => function ($value, $context) {
            return false; // Its ment to go wrong ;)
        },
        'message' => 'Password not equal',
    ]);*/

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
        $rules->add($rules->isUnique(['email']));

        return $rules;
    }

    public function matchPasswords($data){
      if ($data['password']==$this->data['User']['confirm_password']){
            return true;
       }
       $this->invalidate('confirm_password','Your passwords do not match!');
        return false;
}

}


