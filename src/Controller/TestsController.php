<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Tests Controller
 *
 * @property \App\Model\Table\TestsTable $Tests
 * @method \App\Model\Entity\Test[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class TestsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Slots','Quizs'],
        ];
        $tests = $this->paginate($this->Tests);

        $this->set(compact('tests'));
    }

    /**
     * View method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => ['Slots','Quizs'],
        ]);

        $this->set(compact('test'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $test = $this->Tests->newEmptyEntity();
        if ($this->request->is('post')) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The {0} has been saved.', 'Test'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Test'));
        }
        $slots = $this->Tests->Slots->find('list', ['limit' => 200]);
        $quizsDetails = $this->Tests->QuizsDetails->find('list', ['limit' => 200]);
        $this->set(compact('test', 'slots', 'quizs'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $test = $this->Tests->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $test = $this->Tests->patchEntity($test, $this->request->getData());
            if ($this->Tests->save($test)) {
                $this->Flash->success(__('The {0} has been saved.', 'Test'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Test'));
        }
        $slots = $this->Tests->Slots->find('list', ['limit' => 200]);
        $quizsDetails = $this->Tests->QuizsDetails->find('list', ['limit' => 200]);
        $this->set(compact('test', 'slots', 'quizs'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Test id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $test = $this->Tests->get($id);
        if ($this->Tests->delete($test)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Test'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Test'));
        }

        return $this->redirect(['action' => 'index']);
    }

    public function start($id = null){
        $test = $this->Tests->get($id, [
            'contain' => [
                'TestsDetails'=>['Quetions'=>['QuetionsDetails'=>['AvailableOptionsValues']]],
            ],
        ]);
        $this->set(compact('test'));
    }

    public function endTest($id = null){
        $test = $this->Tests->get($id, [
            'contain' => [
                'Quizs',
                'TestsDetails',
            ],
        ])->toArray();

        if ($this->request->is(['patch', 'post', 'put'])) {
            $user_answers = $this->request->getData();
            //debug($user_answers);
        }    
        $this->loadModel('TestsDetails');
        $answers = $this->TestsDetails->find('list', [
            'keyField' => 'quetions_id', // The field to use as keys
            'valueField' => 'available_options_values_id', // The field to use as values
        ])->toArray();
        //debug($answers);    
        //die;
        // $commonKeys will contain the common keys between the 'answers' and 'user_answers' arrays
        $commonKeys = array_intersect_key($answers, $user_answers);
        //print_r($commonKeys);
        $comparisons = [];
        $countNotAttempt = $countAttempt = 0;
        foreach ($commonKeys as $key => $value) {
            if (empty($user_answers[$key]['selected'])) {
                $countNotAttempt++;
            }else{
                $countAttempt++;
                if ($answers[$key] ===  (int)$user_answers[$key]['selected']) {
                    // Values match for the current key
                    $comparisons[$key] = 1;
                }else {
                    // Values don't match for the current key
                    $comparisons[$key] = 0;
                }
            }
        }
        $comparisons['countNotAttempt'] = $countNotAttempt;
        $comparisons['countAttempt'] = $countAttempt;
        
        $this->set(compact('answers','user_answers','comparisons','test'));
    }

}
