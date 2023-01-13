<?php
declare(strict_types=1);

namespace App\Controller;

use Cake\Datasource\ConnectionManager;
use Cake\Http\Middleware\CsrfProtectionMiddleware;
use Cake\Mailer\Transport\MailTransport;
use Cake\ORM\TableRegistry;
use Cake\Mailer\Email;
use Cake\Mailer\Mailer;
use Cake\Mailer\TransportFactory;
use Cake\View\View;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class UsersController extends AppController
{
    public $connection;
    public function initialize(): void
    {
        parent::initialize();
        $this->connection = ConnectionManager::get('default');
    }

    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
    public function register(){
  
    $this->viewBuilder()->setLayout('mydefault');
    $user = $this->Users->newEmptyEntity();
    if ($this->request->is('post')) {


        $data = $this->request->getData();
        $productImage = $this->request->getData("file");
        $fileName = $productImage->getClientFilename();
        $data["file"] = $fileName;
        $user = $this->Users->patchEntity($user, $data);
            // print_r( $user);
            // die;
        // print_r($data);die;
        
        // echo '<pre>';
        // print_r($this->request->getData('file'));
        // die;
        if ($this->Users->save($user)) {
            $hasFileError = $productImage->getError();

            if ($hasFileError > 0) {
                // no file uploaded
                $data["file"] = "";
            } else {
                // file uploaded
                $fileType = $productImage->getClientMediaType();

                if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                    $imagePath = WWW_ROOT . "img/" . $fileName;
                    $productImage->moveTo($imagePath);
                    $data["file"] = $fileName;
                }
            }
            $this->Flash->success(__('The user has been saved.'));

            return $this->redirect(['action' => 'list']);
        }
        $this->Flash->error(__('The user could not be saved. Please, try again.'));
    }
    $this->set(compact('user'));
}
    public function login()
    {
        // $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            $password = $this->request->getData('password'); //get data is used to get data from database

            $result = $this->Users->login($email, $password);
            if ($result) {
                $session = $this->getRequest()->getSession();
                $session->write('email', $email);
                $this->Flash->success(__('The user has been successfully logined.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user')); //creating array from variable and their value
    }

    public function logout()
    {
        $session = $this->request->getSession();
        $session->destroy();
        return $this->redirect(['action' => 'login']);
    }

    // public function listingg()//userlist
// {
//     $session = $this->request->getSession(); 
//     if ($session->read('email') != null) {
//     } else {
//         $this->redirect(['action' => 'login']);
//     }

    //     $this->viewBuilder()->setLayout('mydefault');
//     $users = $this->paginate($this->Users);

    //     $this->set(compact('users'));
//}
    public function list()
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }

        $this->viewBuilder()->setLayout('mydefault');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }

    public function home() //homepage

    {
        $this->viewBuilder()->setLayout('mydefault');
        $users = $this->paginate($this->Users);

        $this->set(compact('users'));
    }
    public function myview($id = null)
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }
    public function editdata($id = null)
    {
        $session = $this->request->getSession(); //read session data
        if ($session->read('email') != null) {
        } else {
            $this->redirect(['action' => 'login']);
        }
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        $fileName2 = $user['file'];
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            $data = $this->request->getData();
            $productImage = $this->request->getData("file");
            $fileName = $productImage->getClientFilename();
            // print_r($fileName);die();

            if($fileName == ''){
                $fileName = $fileName2;
            }

            // print_r($file);die();
            $data["file"] = $fileName;
            $user = $this->Users->patchEntity($user, $data);


            // $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {

                $hasFileError = $productImage->getError();
    
                if ($hasFileError > 0) {
                    // no file uploaded
                    $data["file"] = "";
                } else {
                    // file uploaded
                    $fileType = $productImage->getClientMediaType();
    
                    if ($fileType == "image/png" || $fileType == "image/jpeg" || $fileType == "image/jpg") {
                        $imagePath = WWW_ROOT . "img/" . $fileName;
                        $productImage->moveTo($imagePath);
                        $data["file"] = $fileName;
                    }
                }

                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'list']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }
    /**
     * View method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('user'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Edit method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $user = $this->Users->get($id, [
            'contain' => [],
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user = $this->Users->patchEntity($user, $this->request->getData());
            if ($this->Users->save($user)) {
                $this->Flash->success(__('The user has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The user could not be saved. Please, try again.'));
        }
        $this->set(compact('user'));
    }

    /**
     * Delete method
     *
     * @param string|null $id User id.
     * @return \Cake\Http\Response|null|void Redirects to index.
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

        return $this->redirect(['action' => 'list']);
    }
    public function deletedata($id = null)
    {
        $this->request->allowMethod(['post', 'mydelete']);
        $user = $this->Users->get($id);
        if ($this->Users->delete($user)) {
            $this->Flash->success(__('The user has been deleted.'));
        } else {
            $this->Flash->error(__('The user could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'list']);
    }

    public function forgotpassword()
    {
        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        if ($this->request->is('post')) {
            $email = $this->request->getData('email');
            // die($email);
            $result1 = $this->Users->checkEmailExist($email);
            if ($result1) {
                $token = rand(10000, 100000);

                $result = $this->Users->insertToken($email, $token);
                if ($result) {

                    $user->email = $email;
                    $mailer = new Mailer('default');
                    $mailer->setTransport('gmail'); //your email configuration name
                    $mailer->setFrom(['sktqm53@gmail.com' => 'kshubham']);
                    $mailer->setTo($email);
                    $mailer->setEmailFormat('html');
                    $mailer->setSubject('Verify New Account');
                    // $mailer->deliver("<a href='http://localhost:8765/users/reset?token=$token'>Click here</a>");
                    $mailer->deliver('<a href="http://localhost:8765/users/reset?token=' . $token . '">Click here</a>');

                    $this->Flash->success(__('email send successfully to reset password.'));

                    return $this->redirect(['action' => 'login']);
                }
            }
            $this->Flash->error(__('Please enter valid credential..'));
        }
        $this->set(compact('user'));
    }
    public function reset()
    {

        $this->viewBuilder()->setLayout('mydefault');
        $user = $this->Users->newEmptyEntity();
        $token = $_REQUEST['token'];
        $result = $this->Users->checktokenexist($token);
        if ($result) {
            if ($this->request->is('post')) {
                $password = $this->request->getData('password');
                $res = $this->Users->resetPassword($token, $password);
                // die($res);
                if ($res) {
                    $this->Flash->success(__('Password updated successfully.'));
                    return $this->redirect(['action' => 'login']);
                }
                $this->Flash->error(__('Please enter valid password'));
            }
        } else {
            return $this->redirect(['action' => 'login']);
        }

        $this->set(compact('user'));
    }

    // public function function1(){
    //     echo "this is function 1 ";
    // }

    // public function function2(){
    //     echo "this is function 2";
    // }

    public $paginate = [
        'limit' => 10
    ];
}