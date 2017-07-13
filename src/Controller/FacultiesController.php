<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Faculties Controller
 *
 * @property \App\Model\Table\FacultiesTable $Faculties
 */
class FacultiesController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public $paginate = [
    // Other keys here.
    'maxLimit' => 15
    ];
    
    public function index()
    {
        $faculties = $this->Faculties->find('all')->where(['hid' => true]);
        $this->set('faculties', $this->paginate($faculties));
        

        $this->set(compact('faculties', 'faculty'));
        $this->set('_serialize', ['faculties']);
    }
    
    public function indexrecycle()
    {
        $faculties = $this->Faculties->find('all')->where(['hid' => false]);
        $this->set('faculties', $this->paginate($faculties));
        

        $this->set(compact('faculties', 'faculty'));
        $this->set('_serialize', ['faculties']);
    }

    /**
     * View method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $faculty = $this->Faculties->newEntity();
        $faculty->hid = true;
        if ($this->request->is('post')) {
            $faculty = $this->Faculties->patchEntity($faculty, $this->request->getData());
            if ($this->Faculties->save($faculty)) {
                $this->Flash->success('La facultad ha sido creada, si quieres agregar carreras da clic en la opcion de la facultad');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('La facultad no pudo ser creada, intenta de nuevo');
        }
        $this->set(compact('faculty'));
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $faculty = $this->Faculties->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $faculty = $this->Faculties->patchEntity($faculty, $this->request->getData());
            if ($this->Faculties->save($faculty)) {
                $this->Flash->success('La facultad ha sido editada correctamente!');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Por favor intente de nuevo');
        }
        $this->set(compact('faculty'));
        $this->set('_serialize', ['faculty']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Faculty id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $faculty = $this->Faculties->get($id);
        if ($this->Faculties->delete($faculty)) {
            $this->Flash->success('La facultad ha sido eliminada');
        } else {
            $this->Flash->error('Intente de nuevo por favor');
        }

        return $this->redirect(['action' => 'index']);
    }

    //Falso eliminar
    public function trash($id = null)
    {
        $faculty = $this->Faculties->get($id);
        if($this->Faculties->save($faculty))
        {
            $query = $this->Faculties->query();
                $query->update()
                ->set(['hid' => false])
                ->where(['id' => $id])
                ->execute();

            $query = $this->Faculties->Careers->query();
                $query->update()
                ->set(['hid' => false])
                ->where(['faculty_id' => $id])
                ->execute();
                $this->Flash->success('La Facultad y sus carreras han sido borradas');
            
        }
        else
        {
            $this->Flash->error('Intente de nuevo por favor');
        }
        return $this->redirect(['action' => 'index']);
    }

    //Restaurar
    public function untrash($id = null)
    {
        $faculty = $this->Faculties->get($id);
        if($this->Faculties->save($faculty))
        {
            $query = $this->Faculties->query();
                $query->update()
                ->set(['hid' => true])
                ->where(['id' => $id])
                ->execute();

            $query = $this->Faculties->Careers->query();
                $query->update()
                ->set(['hid' => true])
                ->where(['faculty_id' => $id])
                ->execute();
                $this->Flash->success('La Facultad y las carreras han sido restauradas');
        }
        else
        {
            $this->Flash->error('Intente de nuevo por favor');
        }
        return $this->redirect(['action' => 'indexrecycle']);
    }

}
