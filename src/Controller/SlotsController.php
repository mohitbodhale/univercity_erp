<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Slots Controller
 *
 * @property \App\Model\Table\SlotsTable $Slots
 * @method \App\Model\Entity\Slot[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class SlotsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $slots = $this->paginate($this->Slots);

        $this->set(compact('slots'));
    }

    /**
     * View method
     *
     * @param string|null $id Slot id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $slot = $this->Slots->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('slot'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $slot = $this->Slots->newEmptyEntity();
        if ($this->request->is('post')) {
            $slot = $this->Slots->patchEntity($slot, $this->request->getData());
            if ($this->Slots->save($slot)) {
                $this->Flash->success(__('The {0} has been saved.', 'Slot'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Slot'));
        }
        $this->set(compact('slot'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Slot id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $slot = $this->Slots->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $slot = $this->Slots->patchEntity($slot, $this->request->getData());
            if ($this->Slots->save($slot)) {
                $this->Flash->success(__('The {0} has been saved.', 'Slot'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Slot'));
        }
        $this->set(compact('slot'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Slot id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $slot = $this->Slots->get($id);
        if ($this->Slots->delete($slot)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Slot'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Slot'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
