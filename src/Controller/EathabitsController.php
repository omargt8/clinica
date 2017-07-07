<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Eathabits Controller
 *
 * @property \App\Model\Table\EathabitsTable $Eathabits
 */
class EathabitsController extends AppController
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
        $eathabits = $this->paginate($this->Eathabits);

        $this->set(compact('eathabits'));
        $this->set('_serialize', ['eathabits']);
    }

    /**
     * View method
     *
     * @param string|null $id Eathabit id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $eathabit = $this->Eathabits->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('eathabit', $eathabit);
        $this->set('_serialize', ['eathabit']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $eathabit = $this->Eathabits->newEntity();

        $eathabits = $this->Eathabits;

        $query = $eathabits->find()
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
        $patient = $this->Eathabits->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $eathabit->patient_id = $patient->id;


        if ($this->request->is('post'))
         {
            $eathabit = $this->Eathabits->patchEntity($eathabit, $this->request->getData());
            if($eathabit->vegetables == false)
            {
                $eathabit->amountvegetables = '--------';
            }
            if($eathabit->fruits == false)
            {
                $eathabit->amountfruit = '--------';
            }

            if ($this->Eathabits->save($eathabit))
            {
                $this->Flash->success('El apartado habitos alimenticios ha sido llenado exitosamente!');
                return $this->redirect(['controller' => 'Immunizations', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudieron guardar los datos intente nuevamente');
        }
        $this->set(compact('eathabit', 'patients', 'search'));
        $this->set('_serialize', ['eathabit']);
    }
    public function add2($id)
    {
        $eathabit = $this->Eathabits->newEntity();

        //Para obtener el id que se esta mandando al momento de guardar
        $patient = $this->Eathabits->Patients->get($id);
        //Para guardar el id del paciente como llave foranea en esta tabla
        $eathabit->patient_id = $patient->id;


        if ($this->request->is('post'))
         {
            $eathabit = $this->Eathabits->patchEntity($eathabit, $this->request->getData());
            if($eathabit->vegetables == false)
            {
                $eathabit->amountvegetables = '--------';
            }
            if($eathabit->fruits == false)
            {
                $eathabit->amountfruit = '--------';
            }

            if ($this->Eathabits->save($eathabit))
            {
                $this->Flash->success('El apartado habitos alimenticios ha sido llenado exitosamente!');
                return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
            }
            $this->Flash->error('No se pudieron guardar los datos intente nuevamente');
        }
        $patients = $this->Eathabits->Patients->find('list', ['limit' => 200]);
        $this->set(compact('eathabit', 'patients'));
        $this->set('_serialize', ['eathabit']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Eathabit id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $eathabit = $this->Eathabits->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $eathabit = $this->Eathabits->patchEntity($eathabit, $this->request->getData());
            if($eathabit->vegetables == false)
            {
                $eathabit->amountvegetables = '--------';
            }
            if($eathabit->fruits == false)
            {
                $eathabit->amountfruit = '--------';
            }
            if ($this->Eathabits->save($eathabit)) {
                $this->Flash->success('Los datos alimenticios han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error('Algo va mal, por favor intente de nuevo');
        }
        $patients = $this->Eathabits->Patients->find('list', ['limit' => 200]);
        $this->set(compact('eathabit', 'patients'));
        $this->set('_serialize', ['eathabit']);
    }
   

    /**
     * Delete method
     *
     * @param string|null $id Eathabit id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $eathabit = $this->Eathabits->get($id);
        if ($this->Eathabits->delete($eathabit)) {
            $this->Flash->success(__('The eathabit has been deleted.'));
        } else {
            $this->Flash->error(__('The eathabit could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
