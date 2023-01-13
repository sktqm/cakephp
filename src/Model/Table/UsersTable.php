<?php
declare(strict_types=1);

namespace App\Model\Table;

use Cake\ORM\Query;
use Cake\ORM\RulesChecker;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\ORM\Locator\LocatorAwareTrait;
use Cake\ORM\TableRegistry;

/**
 * Users Model
 *
 * @method \App\Model\Entity\User newEmptyEntity()
 * @method \App\Model\Entity\User newEntity(array $data, array $options = [])
 * @method \App\Model\Entity\User[] newEntities(array $data, array $options = [])
 * @method \App\Model\Entity\User get($primaryKey, $options = [])
 * @method \App\Model\Entity\User findOrCreate($search, ?callable $callback = null, $options = [])
 * @method \App\Model\Entity\User patchEntity(\Cake\Datasource\EntityInterface $entity, array $data, array $options = [])
 * @method \App\Model\Entity\User[] patchEntities(iterable $entities, array $data, array $options = [])
 * @method \App\Model\Entity\User|false save(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User saveOrFail(\Cake\Datasource\EntityInterface $entity, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false saveMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface saveManyOrFail(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface|false deleteMany(iterable $entities, $options = [])
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface deleteManyOrFail(iterable $entities, $options = [])
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
    public function initialize(array $config): void
    {
        parent::initialize($config);

        $this->setTable('users');
        $this->setDisplayField('id');
        $this->setPrimaryKey('id');

        $this->addBehavior('Timestamp');
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
            ->scalar('firstname')
            ->maxLength('firstname', 50)
            ->requirePresence('firstname', 'create')
            ->add('firstname', [
                'notBlank' => [
                    'rule' => ['notBlank'],
                    'message' => 'Please enter your firstname',
                    'last' => true
                ],
                'characters' => [
                    'rule' => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'Please Enter characters only.'
                ],
                'length' => [
                    'rule' => ['minLength', 2],
                    'last' => true,
                    'message' => 'Firstname should be least 2 characters long',
                ],
            ]);

        $validator
            ->scalar('lastname')
            ->maxLength('lastname', 100)
            ->requirePresence('lastname', 'create')
            ->notEmptyString('lastname', "!!please enter your last name")
            ->add('lastname', [
                'length' => [
                    'rule' => ['minLength', 2],
                    'message' => 'lastname should be at least 2 characters',
                ],
                'character' => [
                    'rule' => ['custom', '/^[A-Z]+$/i'],
                    'allowEmpty' => false,
                    'last' => true,
                    'message' => 'please enter character only'
                ],
                'notBlank' => [
                    'rule' => ['notBlank'],
                    'last' => false,
                    'message' => 'please enter your lastname'
                ],

            ]);

        $validator
            ->email('email')
            ->requirePresence('email', 'create')
            ->notEmptyString('email', "!!please enter your email")
            ->add('email', 'unique', [
                'rule' => 'validateUnique',
                'provider' => 'table',
                'message' => 'Email already exist/taken please enter another email',
            ]);


        $validator
            ->scalar('phonenumber')
            ->maxLength('phonenumber', 10, )
            ->requirePresence('phonenumber', 'create')
            ->notEmptyString('phonenumber', "please enter your phonenumber")
            ->add('phonenumber', [
                'numeric' => [
                    'rule' => 'numeric',
                    'message' => 'Please enter numeric only',
                    'last' => true,
                ],
                'minLength' => [
                    'rule' => ['minLength', 10],
                    'last' => true,
                    'message' => 'Phonenumber should be of 10 characters long',
                ],
                'maxLength' => [
                    'rule' => ['maxLength', 10],
                    'last' => true,
                    'message' => 'Phonenumber should be of 10 characters',
                ]
            ]);


        // $validator
        //     ->scalar('password')
        //     ->maxLength('password', 255)
        //     ->requirePresence('password', 'create')
        //     ->notEmptyString('password',"!!please enter your passsword")
        //     ->add('password', [
        //         'password' => [
        //             'rule' => array('minLength', '8'),
        //             'message' => 'Password should be Minimum 8 characters long'
        //         ]
        //     ]);

        $validator
            ->scalar('gender')
            ->maxLength('gender', 10)
            ->requirePresence('gender', 'create')
            ->notEmptyString('gender', "please choose  your gender");



            $validator
            ->scalar('password')
            ->maxLength('password', 255)
            ->requirePresence('password', 'create')
            ->add('password', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your password',
                ],
                'upperCase' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^A-Z]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one uppercase',
                ],
                'lowerCase' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^a-z]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one lowercase',
                ],
                'numeric' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^0-9]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one numeric',
                ],
                'special' => [
                    'rule' => function ($value) {
                        $count = mb_strlen(preg_replace('![^@#*]+!', '', $value));
                        if ($count > 0) {
                            return true;
                        } else {
                            return false;
                        }
                    },
                    'message' => 'Please enter at least one special character',
                ],
                'minLength' => [
                    'rule' => ['minLength', 8],
                    'message' => 'Password need to be 8 characters long',
                ],
            ]);

        
       $validator
            ->scalar('confirmpassword')
            ->maxLength('confirmpassword', 255)
            ->requirePresence('confirmpassword', 'create')
            ->add('confirmpassword', [
                'notBlank' => [
                    'rule'    => ['notBlank'],
                    'message' => 'Please enter your confirmpassword',
                    'last' => true,
                ],
                'match' => [
                    'rule' => array('compareWith', 'password'),
                    'last' => true,
                    'message' => 'Password should not match with the previous password'
                ]
            ]);
            $validator
            ->scalar('file')
            ->requirePresence('file', 'create')
            ->notEmptyString('file', 'Please select your file')
            ->add('file', [
                'validExtension' => [
                    'rule' => ['extension', ['gif', 'jpeg', 'png', 'jpg']], // default  ['gif', 'jpeg', 'png', 'jpg']
                    'message' => 'These files extension are allowed: png ,jpeg, png, jpg'
                ],
            ]);
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
        $rules->add($rules->isUnique(['email']), ['errorField' => 'email']);

        return $rules;
    }
    public function getdata($id)
    {
        $result = $this->find('all')->where(['id' => $id])->first();
        return $result;
    }
    public function login($email, $password)
    {
        $result = $this->find('all')->where(['email' => $email, 'password' => $password])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    public function checkEmailExist($email)
    {
        $result = $this->find('all')->where(['email' => $email])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function resetPassword($token, $password)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['password' => $password, 'token' => ''])
            ->where(['token' => $token])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function checktokenexist($token)
    {
        $result = $this->find('all')->where(['token' => $token])->first();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    public function insertToken($email, $token)
    {
        $users = TableRegistry::get("Users");
        $query = $users->query();
        $result = $query->update()
            ->set(['token' => $token])
            ->where(['email' => $email])
            ->execute();
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    
}

