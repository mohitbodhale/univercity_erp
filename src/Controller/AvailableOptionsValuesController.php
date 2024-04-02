<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * AvailableOptionsValues Controller
 *
 * @property \App\Model\Table\AvailableOptionsValuesTable $AvailableOptionsValues
 * @method \App\Model\Entity\AvailableOptionsValue[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class AvailableOptionsValuesController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $availableOptionsValues = $this->paginate($this->AvailableOptionsValues);

        $this->set(compact('availableOptionsValues'));
    }

    /**
     * View method
     *
     * @param string|null $id Available Options Value id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $availableOptionsValue = $this->AvailableOptionsValues->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('availableOptionsValue'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $availableOptionsValue = $this->AvailableOptionsValues->newEmptyEntity();
        if ($this->request->is('post')) {
            $availableOptionsValue = $this->AvailableOptionsValues->patchEntity($availableOptionsValue, $this->request->getData());
            if ($this->AvailableOptionsValues->save($availableOptionsValue)) {
                $this->Flash->success(__('The {0} has been saved.', 'Available Options Value'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Available Options Value'));
        }
        $this->set(compact('availableOptionsValue'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Available Options Value id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $availableOptionsValue = $this->AvailableOptionsValues->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $availableOptionsValue = $this->AvailableOptionsValues->patchEntity($availableOptionsValue, $this->request->getData());
            if ($this->AvailableOptionsValues->save($availableOptionsValue)) {
                $this->Flash->success(__('The {0} has been saved.', 'Available Options Value'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Available Options Value'));
        }
        $this->set(compact('availableOptionsValue'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Available Options Value id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $availableOptionsValue = $this->AvailableOptionsValues->get($id);
        if ($this->AvailableOptionsValues->delete($availableOptionsValue)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Available Options Value'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Available Options Value'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
