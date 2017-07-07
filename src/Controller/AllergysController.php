<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Allergys Controller
 *
 * @property \App\Model\Table\AllergysTable $Allergys
 */
class AllergysController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */

    /**
     * View method
     *
     * @param string|null $id Allergy id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
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

    public function view($id = null)
    {
        $allergy = $this->Allergys->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('allergy', $allergy);
        $this->set('_serialize', ['allergy']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $allergy = $this->Allergys->newEntity();

        $allergys = $this->Allergys;

        $query = $allergys->find()
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
        $patient = $this->Allergys->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $allergy->patient_id = $patient->id;

        if ($this->request->is('post')) {

            $allergy = $this->Allergys->patchEntity($allergy, $this->request->getData());

            if ($this->Allergys->save($allergy)) {
                $this->Flash->success('El apartado de alergias ha sido llenado exitosamente!');

                return $this->redirect(['controller' => 'Eathabits', 'action' => 'add', $allergy->patient_id ]);
            }
            $this->Flash->error('No se pudo crear el apartado de alergias, por favor intente nuevamente');
        }
        $this->set(compact('allergy', 'patients', 'search'));
        $this->set('_serialize', ['allergy']);
    }

    public function add2($id)
    {
        $allergy = $this->Allergys->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Allergys->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $allergy->patient_id = $patient->id;

        if ($this->request->is('post')) {

            $allergy = $this->Allergys->patchEntity($allergy, $this->request->getData());

            if ($this->Allergys->save($allergy)) {
                $this->Flash->success('El apartado de alergias ha sido llenado exitosamente!');

                return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $allergy->patient_id ]);
            }
            $this->Flash->error('No se pudo crear el apartado de alergias, por favor intente nuevamente');
        }
        $patients = $this->Allergys->Patients->find('list', ['limit' => 200]);
        $this->set(compact('allergy', 'patients'));
        $this->set('_serialize', ['allergy']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Allergy id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $allergy = $this->Allergys->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $allergy = $this->Allergys->patchEntity($allergy, $this->request->getData());
            if ($this->Allergys->save($allergy)) {
                $this->Flash->success('Las alergias han sido cambiadas exitosamente!');
                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error('Las alergias no pudieron ser guardadas, por favor intente nuevamente');
        }
        $this->set(compact('allergy', 'patients'));
        $this->set('_serialize', ['allergy']);
    }
   

    /**
     * Delete method
     *
     * @param string|null $id Allergy id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $allergy = $this->Allergys->get($id);
        if ($this->Allergys->delete($allergy)) {
            $this->Flash->success(__('The allergy has been deleted.'));
        } else {
            $this->Flash->error(__('The allergy could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
