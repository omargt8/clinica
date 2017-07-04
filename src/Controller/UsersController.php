<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Users Controller
 *
 * @property \App\Model\Table\UsersTable $Users
 */
class UsersController extends AppController
{

    public function beforeFilter(\Cake\Event\Event $event)
    {
        parent::beforeFilter($event);
        $this->Auth->allow([]);
    }

    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'views')
        {
            if(in_array($this->request->action, ['home', 'logout', 'view']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }

    

    public function login()
    {
        if($this->request->is('post'))
        {
            $user = $this->Auth->identify();
            if($user)
            {
                $this->Auth->setUser($user);
                return $this->redirect($this->Auth->redirectUrl());
            }
            else
            {
                $this->Flash->error('Usuario o contraseña incorrecta, por favor intente de nuevo', ['key' => 'auth']);
            }
        }

        if($this->Auth->user())
        {
            return $this->redirect(['controller' => 'Users', 'action' => 'home']);
        }
    }

    public function logout()
    {
        return $this->redirect($this->Auth->logout());
    }

    public function home()
    {
        $this->render();
    }

    public function index2()
    {
        $users = $this->paginate($this->Users);
        $this->set('users', $users);
    }

    public function view($id)
    {
        $user = $this->Users->get($id);
        $this->set('user', $user);
    }

    public function edit($id = null)
    {
        $user = $this->Users->get($id);
        $user->active = true;

        if($this->request->is(['patch', 'post', 'put']))
        {
                $user = $this->Users->patchEntity($user, $this->request->data);
            
                if($this->Users->save($user))
                {
                    $this->Flash->success('El usuario ha sido modificado');
                    return $this->redirect(['action' => 'index2']);
                }
                else
                {
                    $this->Flash->error('El usuario no pudo ser modificado');
                }
        }

        $this->set(compact('user'));
    }


    public function add()
    {
        $user = $this->Users->newEntity();

        if($this->request->is('post'))
        {
            $user = $this->Users->patchEntity($user, $this->request->data);
            $user->active = true;

            if($this->Users->save($user))
            {
                $this->Flash->success('El usuario ha sido creado correctamente');
                return $this->redirect(['controller' => 'Users', 'action' => 'add']);
            }
            else
            {
                $this->Flash->error('El usuario no pudo ser creado');
            }
        }

        $this->set(compact('user'));
    }

    public function delete($id =null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $user = $this->Users->get($id);

        if($this->Users->delete($user))
        {
            $this->Flash->success('El usuario ha sido eliminado');
        }
        else
        {
            $this->Flash->error('El usuario no pudo ser eliminado');
        }
        return $this->redirect(['action' => 'index2']);
    }


    public function block()
    {
        $query = $this->Users->query();
        $query->update()
            ->set(['active' => false])
            ->where(['role' => 'views'])
            ->execute();
            $this->Flash->success('Los Usuarios han sido bloqueados!');

        $this->autoRender = false;
        return $this->redirect(['controller' => 'Patients' ,'action' => 'menu']);
    }
    
    public function unblock()
    {
        $query = $this->Users->query();
        $query->update()
            ->set(['active' => true])
            ->where(['role' => 'views'])
            ->execute();
            $this->Flash->success('Los Usuarios han sido habilitados!');

        $this->autoRender = false;
        return $this->redirect(['controller' => 'Patients' ,'action' => 'menu']);
    }
}
