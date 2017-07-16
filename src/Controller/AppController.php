<?php
/**
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link      http://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Mailer\Email;

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link http://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public function initialize()
    {
        parent::initialize();

        $this->loadComponent('RequestHandler');
        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
         'loginRedirect' => [
                 'controller' => 'Homes',
               'action' => 'index'
            ],

            'logoutRedirect' => [
                 'controller' => 'Homes',
                 'action' => 'index',
                 
             ],

              'authenticate' => [
            'Form' => [
                'fields' => ['username' => 'user_name', 'password' => 'password']
            ]
        ]
         ]);
    }
   
    public function beforeFilter(Event $event) {
        $this->Auth->allow('view','Users.activate');
        $this->set('id', $this->Auth->user('id'));
        $this->set('role', $this->Auth->user('role'));
        //pr( $this->Auth->user('role')); 
    }

    /**
     * Before render callback.
     *
     * @param \Cake\Event\Event $event The beforeRender event.
     * @return void
     */
    
    public function beforeRender(Event $event)
    {
        $this->Auth->allow(['index', 'view', 'display','activate']);
        if (!array_key_exists('_serialize', $this->viewVars) &&
            in_array($this->response->type(), ['application/json', 'application/xml'])
        ) {
            $this->set('_serialize', true);
        }
        
    }

    //Activation 

    function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    //email mathod 
    public function sendEmail($sendFrom =null ,$sendTo =null,$subject=null,$message =null ) {
        try {
            $email = new Email();
            $email->transport('default');
            
            $res = $email->from($sendFrom)
                ->to($sendTo)
                ->subject($subject)                   
                ->send($message);
            if ( $res ) {
                return false;
            } else {
                return false;
            }
            
         } catch (Exception $e) {
            
            return false;
         }
    }
    
}
