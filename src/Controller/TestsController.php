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
            'contain' => ['Slots', 'QuizsDetails'],
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
            'contain' => ['Slots', 'QuizsDetails'],
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
        $this->set(compact('test', 'slots', 'quizsDetails'));
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
        $this->set(compact('test', 'slots', 'quizsDetails'));
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
                'TestsDetails'=>[
                    'Quetions'],
                //'QuizsDetails'
            ],
        ]);
        
        $this->loadModel('QuetionsDetails');
        foreach($test['tests_details'] as $ktd=>$vtd){ 
            $quetionsDetails = $this->QuetionsDetails->find('list',[
                'keyField'=>'id','valueField'=>'answers_options_value'
            ])->where(['QuetionsDetails.quetions_id'=>$vtd->quetions_id])->toArray();
            //debug($quetionsDetails);
            $test['tests_details'][$ktd]['options_value'] = $quetionsDetails;
        }

        $this->set(compact('test','quetionsDetails'));
    }

    public function endTest($id = null){
        if ($this->request->is(['patch', 'post', 'put'])) {
            $user_answers = $this->request->getData();
        }    
    
        $this->loadModel('Answers');
        $answers = $this->Answers->find('list', [
            'keyField' => 'quetions_id', // The field to use as keys
            'valueField' => 'quetions_details_id', // The field to use as values
        ])->toArray();

        // $commonKeys will contain the common keys between the 'answers' and 'user_answers' arrays
        $commonKeys = array_intersect_key($answers, $user_answers);
        //print_r($commonKeys);
        $comparisons = [];
        foreach ($commonKeys as $key => $value) {
            if ($answers[$key] ===  $user_answers[$key]['selected']) {
                // Values match for the current key
                $comparisons[$key] = 1;
            } else {
                // Values don't match for the current key
                $comparisons[$key] = 0;
            }
        }

        $this->set(compact('answers','user_answers','comparisons'));
    }

}
