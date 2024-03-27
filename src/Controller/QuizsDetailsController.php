<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * QuizsDetails Controller
 *
 * @property \App\Model\Table\QuizsDetailsTable $QuizsDetails
 * @method \App\Model\Entity\QuizsDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuizsDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Quizs', 'Slots'],
        ];
        $quizsDetails = $this->paginate($this->QuizsDetails);

        $this->set(compact('quizsDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Quizs Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quizsDetail = $this->QuizsDetails->get($id, [
            'contain' => ['Quizs', 'Slots'],
        ]);

        $this->set(compact('quizsDetail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quizsDetail = $this->QuizsDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $quizsDetail = $this->QuizsDetails->patchEntity($quizsDetail, $this->request->getData());
            if ($this->QuizsDetails->save($quizsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Quizs Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quizs Detail'));
        }
        $quizs = $this->QuizsDetails->Quizs->find('list', ['limit' => 200]);
        $slots = $this->QuizsDetails->Slots->find('list', ['limit' => 200]);
        $this->set(compact('quizsDetail', 'quizs', 'slots'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Quizs Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quizsDetail = $this->QuizsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quizsDetail = $this->QuizsDetails->patchEntity($quizsDetail, $this->request->getData());
            if ($this->QuizsDetails->save($quizsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Quizs Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quizs Detail'));
        }
        $quizs = $this->QuizsDetails->Quizs->find('list', ['limit' => 200]);
        $slots = $this->QuizsDetails->Slots->find('list', ['limit' => 200]);
        $this->set(compact('quizsDetail', 'quizs', 'slots'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Quizs Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quizsDetail = $this->QuizsDetails->get($id);
        if ($this->QuizsDetails->delete($quizsDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Quizs Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Quizs Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
