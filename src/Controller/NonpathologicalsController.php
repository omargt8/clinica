<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Nonpathologicals Controller
 *
 * @property \App\Model\Table\NonpathologicalsTable $Nonpathologicals
 */
class NonpathologicalsController extends AppController
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
        $nonpathologicals = $this->paginate($this->Nonpathologicals);

        $this->set(compact('nonpathologicals'));
        $this->set('_serialize', ['nonpathologicals']);
    }

    /**
     * View method
     *
     * @param string|null $id Nonpathological id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $nonpathological = $this->Nonpathologicals->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('nonpathological', $nonpathological);
        $this->set('_serialize', ['nonpathological']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $nonpathological = $this->Nonpathologicals->newEntity();

        $nonpathologicals = $this->Nonpathologicals;

        $query = $nonpathologicals->find()
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
        $patient = $this->Nonpathologicals->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $nonpathological->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $nonpathological = $this->Nonpathologicals->patchEntity($nonpathological, $this->request->getData());
            if ($this->Nonpathologicals->save($nonpathological)) {
                if($patient->gender == 'female')
                {
                    $this->Flash->success('Los datos no patológicos han sido guardados!');
                    return $this->redirect(['controller' => 'Obstetrics', 'action' => 'add', $patient->id]);
                }
                else
                {
                    $this->Flash->success('Los datos no patológicos han sido guardados!');
                    return $this->redirect(['controller' => 'Pathologicals', 'action' => 'add', $patient->id]);
                }
               
            }
            $this->Flash->error('Algo salió mal, intente de nuevo por favor');
        }
        $this->set(compact('nonpathological', 'patients', 'search'));
        $this->set('_serialize', ['nonpathological']);
    }
    public function add2($id)
    {
        $nonpathological = $this->Nonpathologicals->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Nonpathologicals->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $nonpathological->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $nonpathological = $this->Nonpathologicals->patchEntity($nonpathological, $this->request->getData());
            if ($this->Nonpathologicals->save($nonpathological)) {
                if($patient->gender == 'female')
                {
                    $this->Flash->success('Los datos no patológicos han sido guardados!');
                    return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
                }
                else
                {
                    $this->Flash->success('Los datos no patológicos han sido guardados!');
                    return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
                }
               
            }
            $this->Flash->error('Algo salió mal, intente de nuevo por favor');
        }
        $patients = $this->Nonpathologicals->Patients->find('list', ['limit' => 200]);
        $this->set(compact('nonpathological', 'patients'));
        $this->set('_serialize', ['nonpathological']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Nonpathological id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $nonpathological = $this->Nonpathologicals->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $nonpathological = $this->Nonpathologicals->patchEntity($nonpathological, $this->request->getData());
            if ($this->Nonpathologicals->save($nonpathological)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The nonpathological could not be saved. Please, try again.'));
        }
        $patients = $this->Nonpathologicals->Patients->find('list', ['limit' => 200]);
        $this->set(compact('nonpathological', 'patients'));
        $this->set('_serialize', ['nonpathological']);
    }
    

    /**
     * Delete method
     *
     * @param string|null $id Nonpathological id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $nonpathological = $this->Nonpathologicals->get($id);
        if ($this->Nonpathologicals->delete($nonpathological)) {
            $this->Flash->success(__('The nonpathological has been deleted.'));
        } else {
            $this->Flash->error(__('The nonpathological could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
