<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Obstetrics Controller
 *
 * @property \App\Model\Table\ObstetricsTable $Obstetrics
 */
class ObstetricsController extends AppController
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
        $obstetrics = $this->paginate($this->Obstetrics);

        $this->set(compact('obstetrics'));
        $this->set('_serialize', ['obstetrics']);
    }

    /**
     * View method
     *
     * @param string|null $id Obstetric id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $obstetric = $this->Obstetrics->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('obstetric', $obstetric);
        $this->set('_serialize', ['obstetric']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $obstetric = $this->Obstetrics->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Obstetrics->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $obstetric->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $obstetric = $this->Obstetrics->patchEntity($obstetric, $this->request->getData());
            if ($this->Obstetrics->save($obstetric)) {
                $this->Flash->success('Los datos obstetricos han sido guardados!');

                return $this->redirect(['controller' => 'Pathologicals', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudieron guardar los dato obstetricos, por favor intente de nuevo');
        }
        $patients = $this->Obstetrics->Patients->find('list', ['limit' => 200]);
        $this->set(compact('obstetric', 'patients'));
        $this->set('_serialize', ['obstetric']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Obstetric id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $obstetric = $this->Obstetrics->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $obstetric = $this->Obstetrics->patchEntity($obstetric, $this->request->getData());
            if ($this->Obstetrics->save($obstetric)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The obstetric could not be saved. Please, try again.'));
        }
        $patients = $this->Obstetrics->Patients->find('list', ['limit' => 200]);
        $this->set(compact('obstetric', 'patients'));
        $this->set('_serialize', ['obstetric']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Obstetric id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $obstetric = $this->Obstetrics->get($id);
        if ($this->Obstetrics->delete($obstetric)) {
            $this->Flash->success(__('The obstetric has been deleted.'));
        } else {
            $this->Flash->error(__('The obstetric could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
