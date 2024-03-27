<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QuetionsDetails Controller
 *
 * @property \App\Model\Table\QuetionsDetailsTable $QuetionsDetails
 * @method \App\Model\Entity\QuetionsDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuetionsDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quetions'],
        ];
        $quetionsDetails = $this->paginate($this->QuetionsDetails);

        $this->set(compact('quetionsDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Quetions Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quetionsDetail = $this->QuetionsDetails->get($id, [
            'contain' => ['Quetions'],
        ]);

        $this->set(compact('quetionsDetail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quetionsDetail = $this->QuetionsDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $quetionsDetail = $this->QuetionsDetails->patchEntity($quetionsDetail, $this->request->getData());
            if ($this->QuetionsDetails->save($quetionsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Quetions Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quetions Detail'));
        }
        $quetions = $this->QuetionsDetails->Quetions->find('list', ['limit' => 200]);
        $this->set(compact('quetionsDetail', 'quetions'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Quetions Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quetionsDetail = $this->QuetionsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quetionsDetail = $this->QuetionsDetails->patchEntity($quetionsDetail, $this->request->getData());
            if ($this->QuetionsDetails->save($quetionsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Quetions Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quetions Detail'));
        }
        $quetions = $this->QuetionsDetails->Quetions->find('list', ['limit' => 200]);
        $this->set(compact('quetionsDetail', 'quetions'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Quetions Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quetionsDetail = $this->QuetionsDetails->get($id);
        if ($this->QuetionsDetails->delete($quetionsDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Quetions Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Quetions Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
