<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Quetions Controller
 *
 * @property \App\Model\Table\QuetionsTable $Quetions
 * @method \App\Model\Entity\Quetion[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class QuetionsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $quetions = $this->paginate($this->Quetions);

        $this->set(compact('quetions'));
    }

    /**
     * View method
     *
     * @param string|null $id Quetion id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $quetion = $this->Quetions->get($id, [
            'contain' => [],
        ]);

        $this->set(compact('quetion'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $quetion = $this->Quetions->newEmptyEntity();
        if ($this->request->is('post')) {
            $quetion = $this->Quetions->patchEntity($quetion, $this->request->getData());
            if ($this->Quetions->save($quetion)) {
                $this->Flash->success(__('The {0} has been saved.', 'Quetion'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quetion'));
        }
        $this->set(compact('quetion'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Quetion id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $quetion = $this->Quetions->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $quetion = $this->Quetions->patchEntity($quetion, $this->request->getData());
            if ($this->Quetions->save($quetion)) {
                $this->Flash->success(__('The {0} has been saved.', 'Quetion'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quetion'));
        }
        $this->set(compact('quetion'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Quetion id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $quetion = $this->Quetions->get($id);
        if ($this->Quetions->delete($quetion)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Quetion'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Quetion'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
