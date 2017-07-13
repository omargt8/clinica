<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * Zoonosis Controller
 *
 * @property \App\Model\Table\ZoonosisTable $Zoonosis
 */
class ZoonosisController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $zoonosis = $this->paginate($this->Zoonosis);

        $this->set(compact('zoonosis'));
        $this->set('_serialize', ['zoonosis']);
    }

    /**
     * View method
     *
     * @param string|null $id Zoonosi id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $zoonosi = $this->Zoonosis->get($id, [
            'contain' => ['Pathologicals']
        ]);

        $this->set('zoonosi', $zoonosi);
        $this->set('_serialize', ['zoonosi']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $zoonosi = $this->Zoonosis->newEntity();
        if ($this->request->is('post')) {
            $zoonosi = $this->Zoonosis->patchEntity($zoonosi, $this->request->getData());
            if ($this->Zoonosis->save($zoonosi)) {
                $this->Flash->success('La nueva Zoonosis ha sido guardada');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Intente de nuevo por favor!');
        }
        $this->set(compact('zoonosi'));
        $this->set('_serialize', ['zoonosi']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Zoonosi id.
     * @return \Cake\Network\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $zoonosi = $this->Zoonosis->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $zoonosi = $this->Zoonosis->patchEntity($zoonosi, $this->request->getData());
            if ($this->Zoonosis->save($zoonosi)) {
                $this->Flash->success('La Zoonosis ha sido modificada');

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error('Intente de nuevo por favor');
        }
        $this->set(compact('zoonosi'));
        $this->set('_serialize', ['zoonosi']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Zoonosi id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $zoonosi = $this->Zoonosis->get($id);
        if ($this->Zoonosis->delete($zoonosi)) {
            $this->Flash->success('La zoonosis ha sido eliminada');
        } else {
            $this->Flash->error('Por favor intente de nuevo');
        }

        return $this->redirect(['action' => 'index']);
    }
}
