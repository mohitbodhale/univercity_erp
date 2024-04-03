<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * TestsDetails Controller
 *
 * @property \App\Model\Table\TestsDetailsTable $TestsDetails
 * @method \App\Model\Entity\TestsDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestsDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => [//'Quetions', 'Tests', 'Answers'
            ],
        ];
        $testsDetails = $this->paginate($this->TestsDetails);

        $this->set(compact('testsDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Tests Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $testsDetail = $this->TestsDetails->get($id, [
            'contain' => [
                //'Quetions', 'Tests', 'Answers'
                ],
        ]);

        $this->set(compact('testsDetail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $testsDetail = $this->TestsDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $testsDetail = $this->TestsDetails->patchEntity($testsDetail, $this->request->getData());
            if ($this->TestsDetails->save($testsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tests Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tests Detail'));
        }
        $quetions = $this->TestsDetails->Quetions->find('list', ['keyField' => 'id',
            'valueField' => 'tittle','limit' => 200]);
        $tests = $this->TestsDetails->Tests->find('list', ['limit' => 200]);
        $this->loadModel('AvailableOptionsValues');
        $available_options_list = $this->AvailableOptionsValues->find('list', [
            'keyField' => 'id',
            'valueField' => 'description'
        ])->toArray();
        $this->set(compact('testsDetail', 'quetions', 'tests', 'available_options_list'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Tests Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $testsDetail = $this->TestsDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $testsDetail = $this->TestsDetails->patchEntity($testsDetail, $this->request->getData());
            if ($this->TestsDetails->save($testsDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Tests Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Tests Detail'));
        }
        $quetions = $this->TestsDetails->Quetions->find('list', ['limit' => 200]);
        $tests = $this->TestsDetails->Tests->find('list', ['limit' => 200]);
        $answers = $this->TestsDetails->Answers->find('list', ['limit' => 200]);
        $this->set(compact('testsDetail', 'quetions', 'tests', 'answers'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Tests Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $testsDetail = $this->TestsDetails->get($id);
        if ($this->TestsDetails->delete($testsDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Tests Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Tests Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
