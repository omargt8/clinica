<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Lifestyles Controller
 *
 * @property \App\Model\Table\LifestylesTable $Lifestyles
 */
class LifestylesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function isAuthorized($user)
    {
        if(isset($user['role']) and $user['role'] === 'views')
        {
            if(in_array($this->request->action, [ 'view']))
            {
                return true;
            }
        }

        return parent::isAuthorized($user);
    }



    public function index()
    {
        $this->paginate = [
            'contain' => ['Patients']
        ];
        $lifestyles = $this->paginate($this->Lifestyles);

        $this->set(compact('lifestyles'));
        $this->set('_serialize', ['lifestyles']);
    }

    /**
     * View method
     *
     * @param string|null $id Lifestyle id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $lifestyle = $this->Lifestyles->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('lifestyle', $lifestyle);
        $this->set('_serialize', ['lifestyle']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $lifestyle = $this->Lifestyles->newEntity();

        $lifestyles = $this->Lifestyles;

        $query = $lifestyles->find()
            ->where(['patient_id =' => $id]);
        $query->select(['count' => $query->func()->count('*')]);   
        foreach ($query as $search)
        {
        }
        if($search->count == 1)
        {
            $this->Flash->error('Estos datos ya existen, si quieres editarlos ve al listado de pacientes');
        }

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Lifestyles->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $lifestyle->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $lifestyle = $this->Lifestyles->patchEntity($lifestyle, $this->request->getData());
            if($lifestyle->sport == false)
            {
                $lifestyle->type = '--------';
                $lifestyle->frequency = '--------';
            }
            if ($this->Lifestyles->save($lifestyle)) {
                $this->Flash->success('El apartado de estilo de vidas ha sido creado');

                return $this->redirect(['controller' => 'Nonpathologicals', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudo guardar el apartado estilo de vidas, por favor intente nuevamente');
        }
        $this->set(compact('lifestyle', 'patients', 'search'));
        $this->set('_serialize', ['lifestyle']);
    }
    public function add2($id)
    {
        $lifestyle = $this->Lifestyles->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Lifestyles->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $lifestyle->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $lifestyle = $this->Lifestyles->patchEntity($lifestyle, $this->request->getData());
            if($lifestyle->sport == false)
            {
                $lifestyle->type = '--------';
                $lifestyle->frequency = '--------';
            }
            if ($this->Lifestyles->save($lifestyle)) {
                $this->Flash->success('El apartado de estilo de vidas ha sido creado');

                return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
            }
            $this->Flash->error('No se pudo guardar el apartado estilo de vidas, por favor intente nuevamente');
        }
        $patients = $this->Lifestyles->Patients->find('list', ['limit' => 200]);
        $this->set(compact('lifestyle', 'patients'));
        $this->set('_serialize', ['lifestyle']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Lifestyle id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $lifestyle = $this->Lifestyles->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $lifestyle = $this->Lifestyles->patchEntity($lifestyle, $this->request->getData());
            if($lifestyle->sport == false)
            {
                $lifestyle->type = '--------';
                $lifestyle->frequency = '--------';
            }
            if ($this->Lifestyles->save($lifestyle)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The lifestyle could not be saved. Please, try again.'));
        }
        $patients = $this->Lifestyles->Patients->find('list', ['limit' => 200]);
        $this->set(compact('lifestyle', 'patients'));
        $this->set('_serialize', ['lifestyle']);
    }
   

    /**
     * Delete method
     *
     * @param string|null $id Lifestyle id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $lifestyle = $this->Lifestyles->get($id);
        if ($this->Lifestyles->delete($lifestyle)) {
            $this->Flash->success(__('The lifestyle has been deleted.'));
        } else {
            $this->Flash->error(__('The lifestyle could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
