<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Inheritances Controller
 *
 * @property \App\Model\Table\InheritancesTable $Inheritances
 */
class InheritancesController extends AppController
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
        $inheritances = $this->paginate($this->Inheritances);

        $this->set(compact('inheritances'));
        $this->set('_serialize', ['inheritances']);
    }

    /**
     * View method
     *
     * @param string|null $id Inheritance id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $inheritance = $this->Inheritances->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('inheritance', $inheritance);
        $this->set('_serialize', ['inheritance']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $inheritance = $this->Inheritances->newEntity();

        $inheritances = $this->Inheritances;

        $query = $inheritances->find()
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
        $patient = $this->Inheritances->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $inheritance->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $inheritance = $this->Inheritances->patchEntity($inheritance, $this->request->getData());
            if($inheritance->cancer == false)
            {
                $inheritance->typecancer = '------';
            }
            if ($this->Inheritances->save($inheritance)) {
                $this->Flash->success('Las enfermedades hereditarias han sido llenadas con éxito!');

                return $this->redirect(['controller' => 'Lifestyles', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('Algo salió mal, intente de nuevo por favor');
        }
        $this->set(compact('inheritance', 'patients', 'search'));
        $this->set('_serialize', ['inheritance']);
    }
    public function add2($id)
    {
        $inheritance = $this->Inheritances->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Inheritances->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $inheritance->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $inheritance = $this->Inheritances->patchEntity($inheritance, $this->request->getData());
            if($inheritance->cancer == false)
            {
                $inheritance->typecancer = '------';
            }
            if ($this->Inheritances->save($inheritance)) {
                $this->Flash->success('Las enfermedades hereditarias han sido llenadas con éxito!');

                return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
            }
            $this->Flash->error('Algo salió mal, intente de nuevo por favor');
        }
        $patients = $this->Inheritances->Patients->find('list', ['limit' => 200]);
        $this->set(compact('inheritance', 'patients'));
        $this->set('_serialize', ['inheritance']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Inheritance id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $inheritance = $this->Inheritances->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $inheritance = $this->Inheritances->patchEntity($inheritance, $this->request->getData());
            if($inheritance->cancer == false)
            {
                $inheritance->typecancer = '------';
            }
            if ($this->Inheritances->save($inheritance)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The inheritance could not be saved. Please, try again.'));
        }
        $patients = $this->Inheritances->Patients->find('list', ['limit' => 200]);
        $this->set(compact('inheritance', 'patients'));
        $this->set('_serialize', ['inheritance']);
    }
    

    /**
     * Delete method
     *
     * @param string|null $id Inheritance id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $inheritance = $this->Inheritances->get($id);
        if ($this->Inheritances->delete($inheritance)) {
            $this->Flash->success(__('The inheritance has been deleted.'));
        } else {
            $this->Flash->error(__('The inheritance could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
