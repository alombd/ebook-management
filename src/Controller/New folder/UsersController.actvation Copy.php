<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
        $this->set('_serialize', ['users']);
       //$this->Auth->allow(['index','services']);
    }

    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);

        $this->set('user', $user);
        $this->set('_serialize', ['user']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEntity();
        if ($this->request->is('post')) {
             //pr( $this->request->data);
            $user = $this->Users->patchEntity($user, $this->request->data);
            
            
           /* $confrimPassword = $this->request->data['confirm_password'];
            $userprofile['confirm_password'] = ($confrimPassword);*/
            //pr( $this->request->data); die();
            //
            //
            //pr($user);
             //pr( $this->request->data);die;
             
            // pr($user->errors());//die;
            
            
            if ($this->Users->save($user)) {
                
                $id = $user->id;
                $act_key = $this->generateRandomString(20);
                
                $usersTable = TableRegistry::get('Users');
                $user = $usersTable->get($id); // Return article with id 12

                $user->activation_key = $act_key;
                $usersTable->save($user);

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'login']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        
        $act_key = $this->generateRandomString();
        $this->set(compact('user','act_key'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->data);
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('user'));
        $this->set('_serialize', ['user']);
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    //login method
   
    public function beforeFilter(Event $event) {
        parent::beforeFilter($event);
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout','activate');
    }

    public function login(){
  
        if ( $this->request->is('post') ){

            $user= $this->Auth->Identify();
            //pr( $user );
           // pr( $this->request->data );
            if ($user){
                //pr($user); die();
                $this->Auth->SetUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            } else {
                 $this->Flash->error(__('Invalid Username Or Password'));
            }
        
    }
 }

    public function logout() {
        return $this->redirect($this->Auth->logout());
    }

    public function activate( $user_id =null , $activation_key =null ) {
        $Users = TableRegistry::get('Users');
          
        $hasUser = $Users->find()
           ->where(['Users.id' => $user_id ,'Users.activation_key' => $activation_key])           
           ->first();     
        //pr( $hasUser );
        if ( !empty( $hasUser ) ) {
            $id = $hasUser->id;
            // Update activation and activation_key field
                $hasUser->activation = 1;
               $hasUser->activation_key= null;         
            $this->Flash->success(__('User Activated!'));
        } else {
            $this->Flash->error(__('User already activated or no activation period passed '));
        }
    }

    //my profile method
    public function myprofile()
    {

         $userId = $this->request->session()->read('Auth.User.id');
        $this->loadModel('users');
        $users = $this->Users->get($userId, [
            'contain' => []
        ]);
        //pr($users);

       /* $this->set('users', $this->paginate($users));

        $users = $this->paginate($this->Users);*/

         $this->set(compact('users'));
         $this->set('_serialize', ['users']);
       //$this->Auth->allow(['index','services']);
    }
}
