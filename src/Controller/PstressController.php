<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Pstress Controller
 *
 * @property \App\Model\Table\PstressTable $Pstress
 */
class PstressController extends AppController
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
        $pstress = $this->paginate($this->Pstress);

        $this->set(compact('pstress'));
        $this->set('_serialize', ['pstress']);
    }

    /**
     * View method
     *
     * @param string|null $id Pstres id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
public function initialize()
{
	parent::initialize();
	$this->loadComponent('RequestHandler');
    $this->_validViewOptions[] = 'pdfConfig';
}

    public function view($id = null)
    {
        $pstres = $this->Pstress->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('pstres', $pstres);
        $this->set('_serialize', ['pstres']);

        //Imprimir el PDF
        $this->viewBuilder()->options([
            'pdfConfig' => [
                'orientation' => 'portrait'
            ]
        ]);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $pstres = $this->Pstress->newEntity();


        $pstress = $this->Pstress;

        $query = $pstress->find()
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
            $patient = $this->Pstress->Patients->get($id);
            //Para guardar el id del paciente como llave foranea en esta tabla
            $pstres->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $pstres = $this->Pstress->patchEntity($pstres, $this->request->getData());
            if($pstres->studyhours == 0)
            {
                $pstres->studydays = 0;
            }
            elseif($pstres->studydays == 0)
            {
                $pstres->studyhours = 0;
            }
            if($pstres->stress == false)
            {
                $pstres->beforeevaluations = false;
                $pstres->duringevaluations = false;
            }
            if ($this->Pstress->save($pstres)) {
                $this->Flash->success('Los datos de stress han sido guardados!');

                return $this->redirect(['controller' => 'Symptoms', 'action' => 'add', $patient->id]);
            }
            $this->Flash->error('No se pudo guardar, por favor intente nuevamente');
        }
        $this->set(compact('pstres', 'patients', 'search'));
        $this->set('_serialize', ['pstres']);
    }
    public function add2($id)
    {
        $pstres = $this->Pstress->newEntity();

            //Para obtener el id que se esta mandando al momento de guardar
            $patient = $this->Pstress->Patients->get($id);
            //Para guardar el id del paciente como llave foranea en esta tabla
            $pstres->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $pstres = $this->Pstress->patchEntity($pstres, $this->request->getData());
            if($pstres->studyhours == 0)
            {
                $pstres->studydays = 0;
            }
            elseif($pstres->studydays == 0)
            {
                $pstres->studyhours = 0;
            }
            if($pstres->stress == false)
            {
                $pstres->beforeevaluations = false;
                $pstres->duringevaluations = false;
            }
            if ($this->Pstress->save($pstres)) {
                $this->Flash->success('Los datos de stress han sido guardados!');

                return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
            }
            $this->Flash->error('No se pudo guardar, por favor intente nuevamente');
        }
        $patients = $this->Pstress->Patients->find('list', ['limit' => 200]);
        $this->set(compact('pstres', 'patients'));
        $this->set('_serialize', ['pstres']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Pstres id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $pstres = $this->Pstress->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $pstres = $this->Pstress->patchEntity($pstres, $this->request->getData());
            if($pstres->studyhours == 0)
            {
                $pstres->studydays = 0;
            }
            elseif($pstres->studydays == 0)
            {
                $pstres->studyhours = 0;
            }
            if($pstres->stress == false)
            {
                $pstres->beforeevaluations = false;
                $pstres->duringevaluations = false;
            }
            if ($this->Pstress->save($pstres)) {
                $this->Flash->success('Los datos han sido modificados');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error(__('The pstres could not be saved. Please, try again.'));
        }
        $patients = $this->Pstress->Patients->find('list', ['limit' => 200]);
        $this->set(compact('pstres', 'patients'));
        $this->set('_serialize', ['pstres']);
    }
    

    /**
     * Delete method
     *
     * @param string|null $id Pstres id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $pstres = $this->Pstress->get($id);
        if ($this->Pstress->delete($pstres)) {
            $this->Flash->success(__('The pstres has been deleted.'));
        } else {
            $this->Flash->error(__('The pstres could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
