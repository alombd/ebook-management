<?php
namespace App\Controller;

use App\Controller\AppController;
use Cake\ORM\TableRegistry;

class BookMenusController extends AppController
{
	public function index()
	{	
		$bookmenus = $this->BookMenus->find('all');
        //pr($bookmenu); die(); 
		$bookmenus = $this->paginate($this->BookMenus);
        //pr('userprofiles'); die();
        $this->set(compact('bookmenus'));
        $this->set('_serialize', ['bookmenus']);
	}

	//add method

    public function add()
    {
        $bookmenu = $this->BookMenus->newEntity();
        //Check if image has been uploaded
        if(!empty($this->request->data)) 
        {
        	// pr( $this->request->data );die;
            $file = $this->request->data['ebook_pic'];
            $ext = substr(strtolower(strrchr($file['type'], '.')), 1); 
            $arr_ext = array("image/gif",  "image/jpeg","application/zip","application/vnd.openxmlformats-officedocument.wordprocessingml.documen","application/vnd.openxmlformats-officedocument.wordprocessingml.documen","application/pdf","application/pdf","application/msword","application/msword","application/vnd.ms-excel"); //set allowed extensions
            $temp_file_name =  WWW_ROOT . 'uploads/' . $this->request->data['ebook_pic']['name'];
            //pr( $temp_file_name );
            //only process if the extension is valid
                if( in_array($this->request->data['ebook_pic']['type'], $arr_ext))
                    //pr($arr_ext); die();
                {
                    move_uploaded_file($this->request->data['ebook_pic']['tmp_name'], $temp_file_name);
                   // $this->data['BookMenus']['bookmenu'] = $temp_file_name;
                }
            
        }

            if ($this->request->is('post')) 
            {
                $bookmenu = $this->BookMenus->patchEntity($bookmenu, $this->request->data);
                $bookmenu_photo = $this->request->data['ebook_pic']['name'];
                $bookmenu['ebook_pic'] = ($bookmenu_photo);
                //pr($bookmenu); die();
                if ($this->BookMenus->save($bookmenu)) {
                    $this->Flash->success('The new book has been saved.');
                    return $this->redirect(['action' => 'index']);
                } else {
                    $this->Flash->error('The book could not be saved. Please, try again.');
                }
            }
            $this->set(compact('bookmenu'));
            $this->set('_serialize', ['bookmenu']);
    }
	 /*public function add()
     {
     	if ($this->request->is('post')) 
     	{
     		$bookNumber = $this->request->data('book_number');
     		$bookName = $this->request->data('book_name');
     		$Category = $this->request->data('category');
     		$Summery = $this->request->data('summery');
     		$Upload = $this->request->data('upload');
     		//pr($this->request->data); die();
     		//Table Name set
     		$bookMenuTable = TableRegistry::get('book_menus');
			$BookMenu = $bookMenuTable->newEntity();
			$BookMenu->book_name = $bookNumber;
			$BookMenu->book_number = $bookName;
			$BookMenu->category = $Category;
			$BookMenu->summery = $Summery;
			$BookMenu->upload = $Upload;

			 if ($bookMenuTable->save($BookMenu)) {
			    // The $article entiy contains the id now
			    $id = $BookMenu->id;
			    $this->Flash->success('This new book have been save successfully');
				$this->redirect(['controller'=>'BookMenus','action'=>'index']);
			} else {
				$this->Flash->error(__('The new book could not be saved. Please, try again.'));
			}
				$BookMenu = TableRegistry::get('book_menus');
     			$query	  = $BookMenu->query();
     	}

     
     }*/

    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $bookmenu = $this->BookMenus->get($id);
        if ($this->BookMenus->delete($bookmenu)) {
            $this->Flash->success(__('The book has been deleted.'));
        } else {
            $this->Flash->error(__('The book could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
    //viwe method
    public function view($id = null)
    {   
        $this->loadModel('BookMenus');
        $bookmenu = $this->BookMenus->get($id, [
            'contain' => []
        ]);

        $this->set('bookmenu', $bookmenu);
        $this->set('_serialize', ['bookmenu']);
    }

}

