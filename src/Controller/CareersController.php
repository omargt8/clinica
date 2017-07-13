<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Careers Controller
 *
 * @property \App\Model\Table\CareersTable $Careers
 */
class CareersController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
     
    public function index()
    {
        $careers = $this->Careers->find('all')->where(['careers.hid' => true]);
        $this->set('careers', $this->paginate($careers, array('contain' => 'Faculties')));

        $this->set(compact('careers'));
        $this->set('_serialize', ['careers']);
    }
     
    public function indexrecycle()
    {
        $careers = $this->Careers->find('all')->where(['careers.hid' => false]);
        $this->set('careers', $this->paginate($careers, array('contain' => 'Faculties')));

        $this->set(compact('careers'));
        $this->set('_serialize', ['careers']);
    }

    /**
     * View method
     *
     * @param string|null $id Career id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $career = $this->Careers->get($id, [
            'contain' => []
        ]);

        $this->set('career', $career);
        $this->set('_serialize', ['career']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add($id)
    {
        $career = $this->Careers->newEntity();
        //Para obtener el id que se esta mandando al momento de guardar
        $faculty = $this->Careers->Faculties->get($id);
        //Para guardar el id de la facultad como llave foranea en esta tabla
        $career->faculty_id = $faculty->id;
        $career->hid = true;


        if ($this->request->is('post')) {
            $career = $this->Careers->patchEntity($career, $this->request->getData());
            if ($this->Careers->save($career)) {
                $this->Flash->success('La carrera ha sido creada!');

                return $this->redirect(['controller' => 'Faculties', 'action' => 'index']);
            }
            $this->Flash->error('No se pudo crear la carrera, por favor intente de nuevo');
        }
        $this->set(compact('career'));
        $this->set('_serialize', ['career']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Career id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $career = $this->Careers->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $career = $this->Careers->patchEntity($career, $this->request->getData());
            if ($this->Careers->save($career)) {
                $this->Flash->success('La carrera ha sido editada!');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('No se pudo crear la carrera, por favor intente de nuevo');
        }
        $this->set(compact('career'));
        $this->set('_serialize', ['career']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Career id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $career = $this->Careers->get($id);
        if ($this->Careers->delete($career)) {
            $this->Flash->success('La carrera ha sido eliminada!');
        } else {
            $this->Flash->error('La carrera no puso ser borrada, intente de nuevo');
        }

        return $this->redirect(['controller' => 'Faculties' ,'action' => 'index']);
    }

    public function preview($id)
    {
        $careers = $this->Careers->find('all', array('contain' => 'Faculties'))
        ->where(['faculty_id' => $id])
        ->where(['careers.hid' =>  true]);
        foreach ($careers as $fac)
        {
        }

        $this->set(compact('careers', 'careers', 'fac'));
    }


    //Falso eliminar
    public function trash($id = null)
    {
        $career = $this->Careers->get($id);
        if($this->Careers->save($career))
        {
            $query = $this->Careers->query();
                $query->update()
                ->set(['careers.hid' => false])
                ->where(['id' => $id])
                ->execute();
            $this->Flash->success('La Carrera ha sido borrada');
        }
        else
        {
            $this->Flash->error('Intente de nuevo por favor');
        }
        return $this->redirect(['action' => 'index']);
    }

    //Falso eliminar
    public function untrash($id = null)
    {
        $career = $this->Careers->get($id);
        $faculty_id = $career->faculty_id;

        if($this->Careers->save($career))
        {
            $query = $this->Careers->query();
                $query->update()
                ->set(['careers.hid' => true])
                ->where(['id' => $id])
                ->execute();
            $query = $this->Careers->Faculties->query();
                $query->update()
                ->set(['hid' => true])
                ->where(['id' => $faculty_id])
                ->execute();
            $this->Flash->success('La Carrera ha sido restaurada');
        }
        else
        {
            $this->Flash->error('Intente de nuevo por favor');
        }
        return $this->redirect(['action' => 'indexrecycle']);
    }
}
