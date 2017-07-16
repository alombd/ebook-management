<?php
namespace App\Controller;
use App\Controller\AppController;
// use Cake\Network\Email\Email;
use Cake\Mailer\Email;
use Cake\Event\Event;

class HomesController extends AppController
{
	public function beforeFilter(Event $event) {
		parent::beforeFilter($event);
        $this->Auth->allow(['index','services','about','contact']);
    }
	
	//index method start
	public function index(){

	}

	//Services method start
	public function services(){

	}

	//Abaout us method start
	public function about(){

	}

	//Contact us method start
	
	public function contact(){

		if ( !empty($this->request->is('post')) ) {
			//pr($this->request->data); 
			$userName = $this->request->data['name'];
			$userMail = $this->request->data['email'];
			$userSubject = $this->request->data['subject'];
			$message = $this->request->data['body'];
			//pr($this->request->data); 
		/*pr($userName);
			pr($userMail);
			pr($userSubject);
			pr($message);
			die();*/
			$email = new Email();
			$email->transport('default');

			try {
				  /*$res = $email->from(['alombd.bd@gmail.com'])
                  ->to([$userMail => $userName])
                  ->subject($userSubject)                   
                  ->send($message);*/
                  $res = $email
                  ->from('alombd.bd@gmail.com')
                  ->to($userMail)
                  ->subject($userSubject)                   
                  ->send($message);
                  echo "<script>
                        alert('E-mail send Successfully !!!!!');
                        </script>";
			} catch (Exception $e) {
				echo $res."<br>".$e->getMessage(); 
			}
		}
	}

	public function menu(){
		
	}

	//admin panel 
	public function adminpanel(){
		
	}

	public function costompage(){
		
	}

}