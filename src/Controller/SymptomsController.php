<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Symptoms Controller
 *
 * @property \App\Model\Table\SymptomsTable $Symptoms
 */
class SymptomsController extends AppController
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
        $symptoms = $this->paginate($this->Symptoms);

        $this->set(compact('symptoms'));
        $this->set('_serialize', ['symptoms']);
    }

    /**
     * View method
     *
     * @param string|null $id Symptom id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $symptom = $this->Symptoms->get($id, [
            'contain' => ['Patients']
        ]);

        $this->set('symptom', $symptom);
        $this->set('_serialize', ['symptom']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $symptom = $this->Symptoms->newEntity();

        $symptoms = $this->Symptoms;

        $query = $symptoms->find()
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
            $patient = $this->Symptoms->Patients->get($id);
            //Para guardar el id del paciente como llave foranea en esta tabla
            $symptom->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $symptom = $this->Symptoms->patchEntity($symptom, $this->request->getData());
            
            if ($this->Symptoms->save($symptom)) {
                $this->Flash->success('Los sintomas han sido guardados!');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error('Los sintomas no se guardaron, por favor intente de nuevo');
        }
        $this->set(compact('symptom', 'patients', 'search'));
        $this->set('_serialize', ['symptom']);
    }
    public function add2($id)
    {
        $symptom = $this->Symptoms->newEntity();

            //Para obtener el id que se esta mandando al momento de guardar
            $patient = $this->Symptoms->Patients->get($id);
            //Para guardar el id del paciente como llave foranea en esta tabla
            $symptom->patient_id = $patient->id;

        if ($this->request->is('post')) {
            $symptom = $this->Symptoms->patchEntity($symptom, $this->request->getData());
            
            if ($this->Symptoms->save($symptom)) {
                $this->Flash->success('Los sintomas han sido guardados!');

                return $this->redirect(['controller' => 'Patients', 'action' => 'preview', $patient->id]);
            }
            $this->Flash->error('Los sintomas no se guardaron, por favor intente de nuevo');
        }
        $patients = $this->Symptoms->Patients->find('list', ['limit' => 200]);
        $this->set(compact('symptom', 'patients'));
        $this->set('_serialize', ['symptom']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Symptom id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $symptom = $this->Symptoms->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $symptom = $this->Symptoms->patchEntity($symptom, $this->request->getData());

            //Calcular el imc
            $symptom->imc = $symptom->weight / ($symptom->csize * $symptom->csize);

            if ($this->Symptoms->save($symptom)) {
                $this->Flash->success('Los datos han sido guardados.');

                return $this->redirect(['controller' => 'Patients', 'action' => 'index']);
            }
            $this->Flash->error('Por favor intente de nuevo');
        }
        $patients = $this->Symptoms->Patients->find('list', ['limit' => 200]);
        $this->set(compact('symptom', 'patients'));
        $this->set('_serialize', ['symptom']);
    }
    

    /**
     * Delete method
     *
     * @param string|null $id Symptom id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $symptom = $this->Symptoms->get($id);
        if ($this->Symptoms->delete($symptom)) {
            $this->Flash->success(__('The symptom has been deleted.'));
        } else {
            $this->Flash->error(__('The symptom could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function stats()
    {
        $symptoms = $this->Symptoms;

//Delgadez Severa Count
        $query = $symptoms->find()
            ->where(['imc <' => 16]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total)
        {
        }
//Delgadez Severa
        $pat = $symptoms->find()
            ->where(['imc <' => 16.00]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);
        

//Delgadez Moderada Count
        $query = $symptoms->find()
            ->where(['imc >=' => 16.00])
            ->andWhere(['imc <=' => 16.99]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total2)
        {
        }
//Delgadez Moderada
        $pat2 = $symptoms->find()
            ->where(['imc >=' => 16.00])
            ->andWhere(['imc <=' => 16.99]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);


//Delgadez Aceptable Count
        $query = $symptoms->find()
            ->where(['imc >=' => 17.00])
            ->andWhere(['imc <=' => 18.49]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total3)
        {
        }
//Delgadez Aceptable
        $pat3 = $symptoms->find()
            ->where(['imc >=' => 17.00])
            ->andWhere(['imc <=' => 18.49]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);

//Peso Normal Count
        $query = $symptoms->find()
            ->where(['imc >=' => 18.50])
            ->andWhere(['imc <=' => 24.99]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total4)
        {
        }
//Peso Normal
        $pat4 = $symptoms->find()
            ->where(['imc >=' => 18.50])
            ->andWhere(['imc <=' => 24.99]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);

//Sobrepeso Count
        $query = $symptoms->find()
            ->where(['imc >=' => 25.00])
            ->andWhere(['imc <=' => 29.99]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total5)
        {
        }
//Sobrepeso
        $pat5 = $symptoms->find()
            ->where(['imc >=' => 25.00])
            ->andWhere(['imc <=' => 29.99]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);

//Obeso Count
        $query = $symptoms->find()
            ->where(['imc >=' => 30.00])
            ->andWhere(['imc <=' => 34.99]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total6)
        {
        }
//Obeso
        $pat6 = $symptoms->find()
            ->where(['imc >=' => 30.00])
            ->andWhere(['imc <=' => 34.99]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);

//Obeso 2 Count
        $query = $symptoms->find()
            ->where(['imc >=' => 35.00])
            ->andWhere(['imc <=' => 40.00]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total7)
        {
        }
//Obeso 2
        $pat7 = $symptoms->find()
            ->where(['imc >=' => 35.00])
            ->andWhere(['imc <=' => 40.00]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);

//Obeso 3 Count
        $query = $symptoms->find()
            ->where(['imc >' => 40.00]);
        $query->select(['count' => $query->func()->count('*')]);
        foreach ($query as $total8)
        {
        }
//Obeso 2
        $pat8 = $symptoms->find()
            ->where(['imc >=' => 40.00]);
        $query->select(['fc', 'ta', 'fr', 'temperature', 'weight', 'csize', 'imc', 'patient_id']);



        $this->set(compact('total', 'pat', 'total2', 'pat2', 'total3', 'pat3', 'total4', 'pat4',
         'total5', 'pat5', 'total6', 'pat6', 'total7', 'pat7', 'total8', 'pat8'));
    }


}
