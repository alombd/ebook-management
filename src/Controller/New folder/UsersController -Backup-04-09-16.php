<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
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
                            
                /*-----[ Send Activation Link to User --------*/
                $user_id = $user->id;
                $act_key = $this->request->data['activation_key'];
                $first_name = $this->request->data['first_name'];
                $last_name = $this->request->data['last_name'];
                $last_name = $this->request->data['last_name'];
                $email = $this->request->data['email'];

                $root_path = $this->webroot;
                
                $message = "Hello, {$first_name} {$last_name}
                    Activate your account through clicking bellow link
                    <a href='http://localhost/project_app/users/activate/{$user_id}/{$act_key}'>Activate</a>";
                $sendFrom = "alombd.bd@gmail.com";
                $subject =" Activate your account";
                $this->sendEmail($sendFrom,$email,$subject,$message);
                //pr($this->request->data); die();
                /*-----[ End Send Activation Link to User --------*/


            
            if ($this->Users->save($user)) {

                $this->Flash->success(__('The user has been saved.'));
                echo $message;
                die();
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
    
    /**-----------------edit method-------------------------*/
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->newEntity();
            if ( !empty( $this->request->data ) ) 
                {
                //pr(error( $this->request->data));
                //pr($_FILES["profile_photo"]);
                //pr( $this->request->data );die ();
                $file = $this->request->data['profile_photo'];
                $user['profile_photo'] = ($file);
                $ext = substr(strtolower(strrchr($file['type'], '.')), 1);
                //pr($ext) ; 
                $arr_ext = array('image/jpeg', 'jpeg', 'gif'); //set allowed extensions
                $temp_file_name =  WWW_ROOT . 'uploads_profile/' . $this->request->data['profile_photo']['name'];
                //pr( $temp_file_name );
                //only process if the extension is valid
                    if( $this->request->data['profile_photo']['type'])
                    {
                        move_uploaded_file($this->request->data['profile_photo']['tmp_name'], $temp_file_name);
                       // $this->data['BookMenus']['bookmenu'] = $temp_file_name;
                    }
                    
                }
            $user = $this->Users->patchEntity($user, $this->request->data);
            // pr($user);die;
            //$this->Users->id = $id; 
            pr($user->errors());
              $userprofile_photo = $this->request->data['profile_photo']['name'];
                $userprofile['profile_photo'] = ($userprofile_photo);

            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'myprofile']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
         $this->request->data =$user;
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
        //$this->Auth->allow('add', 'logout','activate');
        $this->Auth->allow(['add','activate']);
    }

    public function login()
    {
        
        if ( $this->request->is('post') ) { 
           //pr($this->request->is('post'));           
            $user = $this->Auth->identify();  
            //pr($user);      
            if ( $user ) {
                if( $user['activation'] == 1 ) {
                    $this->Auth->setUser($user);
                    return $this->redirect(['controller' => 'homes','action' => 'index']);
                } else {
                    $this->Flash->error(__('User not activated, try again'));
                }                            
            } else {
                $this->Flash->error(__('Invalid username or password, try again'));
            }            
        }

    }
    //login end

    //logout method
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

               $this->Users->save($hasUser);

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
