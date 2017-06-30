<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Immunizations Controller
 *
 * @property \App\Model\Table\ImmunizationsTable $Immunizations
 */
class ImmunizationsController extends AppController
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
        $immunizations = $this->paginate($this->Immunizations);

        $this->set(compact('immunizations'));
        $this->set('_serialize', ['immunizations']);
    }

    /**
     * View method
     *
     * @param string|null $id Immunization id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $immunization = $this->Immunizations->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('immunization', $immunization);
        $this->set('_serialize', ['immunization']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $immunization = $this->Immunizations->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Immunizations->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $immunization->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $immunization = $this->Immunizations->patchEntity($immunization, $this->request->getData());
            if ($this->Immunizations->save($immunization)) {
                $this->Flash->success('El apartado de inmunizaciones ha sido llenado exitosamente!');

                return $this->redirect(['controller' => 'Inheritances', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudo guardar la immunizacion, por favor intente de nuevo');
        }
        $patients = $this->Immunizations->Patients->find('list', ['limit' => 200]);
        $this->set(compact('immunization', 'patients'));
        $this->set('_serialize', ['immunization']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Immunization id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $immunization = $this->Immunizations->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $immunization = $this->Immunizations->patchEntity($immunization, $this->request->getData());
            if ($this->Immunizations->save($immunization)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The immunization could not be saved. Please, try again.'));
        }
        $patients = $this->Immunizations->Patients->find('list', ['limit' => 200]);
        $this->set(compact('immunization', 'patients'));
        $this->set('_serialize', ['immunization']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Immunization id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $immunization = $this->Immunizations->get($id);
        if ($this->Immunizations->delete($immunization)) {
            $this->Flash->success(__('The immunization has been deleted.'));
        } else {
            $this->Flash->error(__('The immunization could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
