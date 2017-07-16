<?php
namespace App\Controller;

use App\Controller\AppController;

/**
 * CustomerTable Controller
 *
 * @property \App\Model\Table\CustomerTableTable $CustomerTable
 */
class CustomerTableController extends AppController
{

    /**
     * Index method
     *
     * @return \Cake\Network\Response|null
     */
    public function index()
    {
        $customerTable = $this->paginate($this->CustomerTable);

        $this->set(compact('customerTable'));
        $this->set('_serialize', ['customerTable']);
    }

    /**
     * View method
     *
     * @param string|null $id Customer Table id.
     * @return \Cake\Network\Response|null
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $customerTable = $this->CustomerTable->get($id, [
            'contain' => []
        ]);

        $this->set('customerTable', $customerTable);
        $this->set('_serialize', ['customerTable']);
    }

    /**
     * Add method
     *
     * @return \Cake\Network\Response|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $customerTable = $this->CustomerTable->newEntity();
        if ($this->request->is('post')) {
            $customerTable = $this->CustomerTable->patchEntity($customerTable, $this->request->data);
            if ($this->CustomerTable->save($customerTable)) {
                $this->Flash->success(__('The customer table has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer table could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('customerTable'));
        $this->set('_serialize', ['customerTable']);
    }

    /**
     * Edit method
     *
     * @param string|null $id Customer Table id.
     * @return \Cake\Network\Response|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $customerTable = $this->CustomerTable->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $customerTable = $this->CustomerTable->patchEntity($customerTable, $this->request->data);
            if ($this->CustomerTable->save($customerTable)) {
                $this->Flash->success(__('The customer table has been saved.'));

                return $this->redirect(['action' => 'index']);
            } else {
                $this->Flash->error(__('The customer table could not be saved. Please, try again.'));
            }
        }
        $this->set(compact('customerTable'));
        $this->set('_serialize', ['customerTable']);
    }

    /**
     * Delete method
     *
     * @param string|null $id Customer Table id.
     * @return \Cake\Network\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $customerTable = $this->CustomerTable->get($id);
        if ($this->CustomerTable->delete($customerTable)) {
            $this->Flash->success(__('The customer table has been deleted.'));
        } else {
            $this->Flash->error(__('The customer table could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
