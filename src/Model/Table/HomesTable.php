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
class HomesController extends Table
{

    /**
     * Initialize method
     *
     * @param array $config The configuration for the Table.
     * @return void
     */
    public function initialize(array $config)
    {
        
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
		   ->requirePresence('name')
		    ->notEmpty('name', 'Please fill this field')
		    ->add('name', [
		        'length' => [
		            'rule' => ['minLength', 4],
		            'message' => 'Titles need to be at least 4 characters long',
		        ]
		    ]);

		    $validator->
		     add('email', 'valid-email', 
		     	[
		     	'rule' => 'email'
		     	]);

		   $validator 
		    ->allowEmpty('subject')
		    ->add('subject', 'Please fill this required', [
		        'rule' => 'boolean'
		    ])
			    ->requirePresence('body')
			    ->add('body', 'length', [
			        'rule' => ['minLength', 5],
			        'message' => 'Articles must have a substantial body.'
			    ]);

			    
		    

		    return $validator;
		}


}