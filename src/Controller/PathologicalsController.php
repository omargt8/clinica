<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pathologicals Controller
 *
 * @property \App\Model\Table\PathologicalsTable $Pathologicals
 */
class PathologicalsController extends AppController
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
        $pathologicals = $this->paginate($this->Pathologicals);

        $this->set(compact('pathologicals'));
        $this->set('_serialize', ['pathologicals']);
    }

    /**
     * View method
     *
     * @param string|null $id Pathological id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $pathological = $this->Pathologicals->get($id, [
            'contain' => ['Patients', 'Zoonosis']
        ]);

        $this->set('pathological', $pathological);
        $this->set('_serialize', ['pathological']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $pathological = $this->Pathologicals->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Pathologicals->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $pathological->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $pathological = $this->Pathologicals->patchEntity($pathological, $this->request->getData());
            if ($this->Pathologicals->save($pathological)) {
                $this->Flash->success('Los datos han sido guardados!');

                return $this->redirect(['controller' => 'Addictions', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudo guardar, por favor intente de nuevo');
        }

        $patients = $this->Pathologicals->Patients->find('list', ['limit' => 200]);
        $zoonosis = $this->Pathologicals->Zoonosis->find('list', ['limit' => 200]);
        $this->set(compact('pathological', 'patients', 'zoonosis'));
        $this->set('_serialize', ['pathological']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pathological id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pathological = $this->Pathologicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pathological = $this->Pathologicals->patchEntity($pathological, $this->request->getData());
            if ($this->Pathologicals->save($pathological)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The pathological could not be saved. Please, try again.'));
        }
        $patients = $this->Pathologicals->Patients->find('list', ['limit' => 200]);
        $zoonosis = $this->Pathologicals->Zoonosis->find('list', ['limit' => 200]);
        $this->set(compact('pathological', 'patients', 'zoonosis'));
        $this->set('_serialize', ['pathological']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Pathological id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pathological = $this->Pathologicals->get($id);
        if ($this->Pathologicals->delete($pathological)) {
            $this->Flash->success(__('The pathological has been deleted.'));
        } else {
            $this->Flash->error(__('The pathological could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
