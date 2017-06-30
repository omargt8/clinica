<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Addictions Controller
 *
 * @property \App\Model\Table\AddictionsTable $Addictions
 */
class AddictionsController extends AppController
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
        $addictions = $this->paginate($this->Addictions);

        $this->set(compact('addictions'));
        $this->set('_serialize', ['addictions']);
    }

    /**
     * View method
     *
     * @param string|null $id Addiction id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $addiction = $this->Addictions->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('addiction', $addiction);
        $this->set('_serialize', ['addiction']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $addiction = $this->Addictions->newEntity();
        if ($this->request->is('post')) {
            $addiction = $this->Addictions->patchEntity($addiction, $this->request->getData());

            //Para obtener el id que se esta mandando al momento de guardar
            $patient = $this->Addictions->Patients->get($id);
            //Para guardar el id del paciente como llave foranea en esta tabla
            $addiction->patient_id = $patient->id;

            $addiction->quantityconsumed = $addiction->quantityconsumed1 . ' ' . $addiction->quantityconsumed2;

            if ($this->Addictions->save($addiction)) {
                $this->Flash->success('Las adicciones han sido guardadas!');

                return $this->redirect(['controller' => 'Pstress', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudieron guardar las adicciones, por favor intente nuevamente');
        }
        $patients = $this->Addictions->Patients->find('list', ['limit' => 200]);
        $this->set(compact('addiction', 'patients'));
        $this->set('_serialize', ['addiction']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Addiction id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $addiction = $this->Addictions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $addiction = $this->Addictions->patchEntity($addiction, $this->request->getData());

            $addiction->quantityconsumed = $addiction->quantityconsumed1 . ' ' . $addiction->quantityconsumed2;

            if ($this->Addictions->save($addiction)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The addiction could not be saved. Please, try again.'));
        }
        $patients = $this->Addictions->Patients->find('list', ['limit' => 200]);
        $this->set(compact('addiction', 'patients'));
        $this->set('_serialize', ['addiction']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Addiction id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $addiction = $this->Addictions->get($id);
        if ($this->Addictions->delete($addiction)) {
            $this->Flash->success(__('The addiction has been deleted.'));
        } else {
            $this->Flash->error(__('The addiction could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
