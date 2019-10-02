<?php

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     0.2.9
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */

namespace App\Controller;

use Cake\Controller\Controller;
use Cake\Event\Event;
use Cake\Network\Session;
use Cake\Database\Type;
use Cake\ORM\TableRegistry;
use Cake\Core\Configure;

// Habilita o parseamento de datas localizadas
Type::build('date')
        ->useLocaleParser()
        ->setLocaleFormat('dd/MM/yyyy');
Type::build('datetime')
        ->useLocaleParser()
        ->setLocaleFormat('dd/MM/yyyy HH:mm:ss');
Type::build('timestamp')
        ->useLocaleParser()
        ->setLocaleFormat('dd/MM/yyyy HH:mm:ss');

// Habilita o parseamento de decimal localizaddos
Type::build('decimal')
        ->useLocaleParser();
Type::build('float')
        ->useLocaleParser();

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @link https://book.cakephp.org/3.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

    /**
     * Initialization hook method.
     *
     * Use this method to add common initialization code like loading components.
     *
     * e.g. `$this->loadComponent('Security');`
     *
     * @return void
     */
    public $components = ['Flash', 'Auth'];

    public function initialize() {
        parent::initialize();
       

        $this->loadComponent('Flash');
        $this->loadComponent('Auth', [
            'authenticate' => [
                'Form' => [
                    'userModel' => 'Users',
                    'scope' => ['users.active' => true],
                    'fields' => [
                        'username' => 'email',
                        'password' => 'password'
                    ]
                ]
            ],
            'logoutRedirect' => [
                'controller' => 'Users',
                'action' => 'login'
            ],
            'authError' => 'Você não tem autorização para ver este módulo, envie um email para seu supervisor caso você precise de autorização',
            'loginRedirect' => [
                'controller' => 'Dashboards',
                'action' => 'check'
            ]
        ]);
        $this->loadComponent('RequestHandler', [
            'enableBeforeRedirect' => false,
        ]);
        $this->loadComponent('Flash');
        
        /*$rsu = TableRegistry::get('users')
                ->find()
                ->where('id = ' . $this->request->Session()->read('Auth.User.id'));
        
        $this->set('rsu',$rsu);*/
        
        $utype = $this->request->Session()->read('Auth.User.type');
        
        $this->set('utype',$utype);
        
        $uacademies = $this->request->Session()->read('Auth.User.academies');
        
        $this->set('uacademies',$uacademies);
        
        
        $uid = $this->request->Session()->read('Auth.User.id');
        
        $this->set('uid',$uid);
        
        $rs3 = TableRegistry::get('files')
                    ->find()
                    ->where('controller=\'users\'')
                    ->andWhere('controllerId=' . $this->request->Session()->read('Auth.User.id'));
            $this->set('picx', $rs3);
        

        /*
         * Enable the following component for recommended CakePHP security settings.
         * see https://book.cakephp.org/3.0/en/controllers/components/security.html
         */
        //$this->loadComponent('Security');
    }
    
     public function beforeFilter(Event $event)
    {
        $this->Auth->allow(['newuser','newacademy','newassociation']);
    }
    
    public function beforeRender(Event $event)
    {

        parent::beforeRender($event);
    }

}
