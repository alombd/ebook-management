<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\Event\Event;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UserProfilesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {  
      $this->loadModel('UserProfiles');
        //$this->set('UserProfiles', $this->userprofiles->userprofiles());
    	$userprofiles = $this->UserProfiles->find('all');
        //pr($userprofiles); die();
        $userprofiles = $this->paginate($this->UserProfiles);
        //pr($userprofiles); die();
        $this->set(compact('userprofiles'));
        $this->set('_serialize', ['userprofiles']);
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
        $this->loadModel('UserProfiles');
        $userprofile = $this->UserProfiles->get($id, [
            'contain' => []
        ]);

        $this->set('userprofile', $userprofile);
        $this->set('_serialize', ['userprofile']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()

    {
	//PLease close unnescessery tabs
        $this->loadModel('UserProfiles'); 
        $userprofile = $this->UserProfiles->newEntity();
        //Check if image has been uploaded
        if( !empty( $this->request->data ) ) 
        {
        	//pr( $this->request->data );die
            $file = $this->request->data['profile_photo'];
             $userprofile['profile_photo'] = ($file);
            $ext = substr(strtolower(strrchr($file['type'], '.')), 1); 
            $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
            $temp_file_name =  WWW_ROOT . 'uploads_profile/' . $this->request->data['profile_photo']['name'];
            //pr( $temp_file_name );
            //only process if the extension is valid
    	        if( $this->request->data['profile_photo']['type'] == "image/jpeg")
    	        {
    	            move_uploaded_file($this->request->data['profile_photo']['tmp_name'], $temp_file_name);
    	           // $this->data['BookMenus']['bookmenu'] = $temp_file_name;
    	        }
            
        }

            if ($this->request->is('post')) {
                $userprofile = $this->UserProfiles->patchEntity($userprofile, $this->request->data);
                $dob= $this->request->data['date_of_birth'];
                $userprofile['date_of_birth'] = date('Y-m-d',strtotime($dob));
                
                $userprofile_photo = $this->request->data['profile_photo']['name'];
                $userprofile['profile_photo'] = ($userprofile_photo);
                //pr($userprofile_photo); die();
               // pr($userprofile); die();
                if ($this->UserProfiles->save($userprofile)) {
                    $this->Flash->success(__('The userprofile has been saved.'));

                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error(__('The user profile could not be saved. Please, try again.'));
                }
            }
        $this->set(compact('userprofile'));
        $this->set('_serialize', ['userprofile']);
    }

    //edit method
     public function edit($id = null)
    {
        $this->loadModel('UserProfiles');
        $userprofile = $this->UserProfiles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $userprofile = $this->UserProfiles->patchEntity($userprofile, $this->request->data);
            if ($this->UserProfiles->save($userprofile)) {
                $this->Flash->success(__('The user profile data update saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The user could not be saved. Please, try again.'));
            }
        }
        $this->request->data =$userprofile;
        $this->set(compact('userprofile'));
        $this->set('_serialize', ['userprofile']);
    }

    //delete method 
    public function delete($id = null)
    {
        $this->loadModel('UserProfiles');
       $this->request->allowMethod(['post','delete']);
       $userprofile = $this->UserProfiles->get($id);
       if ($this->UserProfiles->delete($userprofile)) {
          $this->Flash->success(__('The user profile has been deleted.'));
       } else {
         $this->Flash->error(__('The user could not be deleted. Please, try again.'));
       }
       return $this->redirect(['action' => 'index']);
    }


    //editprofile photo save
    public function editprofile($id = null)
    {
        $this->loadModel('Users');
        $this->loadModel('UserProfiles');
        $user = $this->Users->get($id, [
            'contain' => []
        ]);
        //pr($user);
        if ($this->request->is(['patch', 'post', 'put'])) {
           //pr( $this->request->data ); 
            $userprofile = $this->UserProfiles->newEntity();
            if ( !empty( $this->request->data ) ) 
                {
                //pr( $this->request->data );die
                $file = $this->request->data['profile_photo'];
                $userprofile['profile_photo'] = ($file);
                $ext = substr(strtolower(strrchr($file['type'], '.')), 1); 
                $arr_ext = array('jpg', 'jpeg', 'gif'); //set allowed extensions
                $temp_file_name =  WWW_ROOT . 'uploads_profile/' . $this->request->data['profile_photo']['name'];
                //pr( $temp_file_name );
                //only process if the extension is valid
                    if( $this->request->data['profile_photo']['type'] == "image/jpeg")
                    {
                        move_uploaded_file($this->request->data['profile_photo']['tmp_name'], $temp_file_name);
                       // $this->data['BookMenus']['bookmenu'] = $temp_file_name;
                    }
                    
                }

                     $userprofile = $this->UserProfiles->patchEntity($userprofile, 
                     $this->request->data);
                    //pr($userprofile); die;
               
                    $userprofile = $this->UserProfiles->patchEntity($userprofile, 
                    $this->request->data);
                    $dob= $this->request->data['date_of_birth'];
                    $userprofile['date_of_birth'] = date('Y-m-d',strtotime($dob));
                    
                    $userprofile_photo = $this->request->data['profile_photo']['name'];
                    $userprofile['profile_photo'] = ($userprofile_photo);
                //pr($userprofile); 
                if ($this->UserProfiles->save($userprofile)) 
                {

                    $this->Flash->success(__('The user has been saved.'));

                        return $this->redirect(['action' => 'index']);
                    } else {
                        $this->Flash->error(__('The user could not be saved. Please, try again.'));
                    }
                }
            
            $this->request->data =$user;
            $this->set(compact('user'));
            $this->set('_serialize', ['user']);

    }
}    