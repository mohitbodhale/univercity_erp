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
        $this->loadModel('Quetions');
        $this->loadModel('AvailableOptionsValues');
        $quetion = $this->Quetions->find('all',['contain' => ['QuetionsDetails']] );
        $available_options_list = $this->AvailableOptionsValues->find('list', [
            'keyField' => 'id',
            'valueField' => 'description'
        ])->toArray();
        
        if ($this->request->is(['post'])) {
            $savedata = $this->request->getData();
            foreach($savedata as $savedatak=>$savedatav){
                foreach($savedatav as $savedatavr=>$savedatavr_v){
                    foreach($savedatavr_v as $savedatavr_kmul=>$savedatavr_vmul){
                        if(isset($savedatavr_vmul['id'])){
                            $this->edit($savedatavr_vmul['id'],$savedatavr_vmul);
                        }else{
                            $this->add($savedatavr_vmul);
                        }
                    }
                }
            }
        }
        $this->set(compact(['quetionsDetails','quetion','available_options_list']));
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
    public function add($savedatavr_vmul = null)
    {
        //debug($this->request->getData());
        $quetionsDetail = $this->QuetionsDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            if($savedatavr_vmul){
                $savedatavr_vmul=$savedatavr_vmul;
            }
            else{
                $savedatavr_vmul=$this->request->getData();
            }
            $quetionsDetail = $this->QuetionsDetails->patchEntity($quetionsDetail, $savedatavr_vmul);
            //debug($savedatavr_vmul);die;
            if ($this->QuetionsDetails->save($quetionsDetail)) {
                if(!$savedata){
                $this->Flash->success(__('The {0} has been saved.', 'Quetions Detail'));
                }
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
    public function edit($id = null,$savedata= null)
    {
        $quetionsDetail = $this->QuetionsDetails->get($id, [
            'contain' => []
        ]);
        
        if ($this->request->is(['patch', 'post', 'put'])) {
            if($savedata){$savedata=$savedata;}else{$savedata= $this->request->getData();}
            
            $quetionsDetail = $this->QuetionsDetails->patchEntity($quetionsDetail, $savedata);
            if ($this->QuetionsDetails->save($quetionsDetail)) {
                if(!$savedata){
                    $this->Flash->success(__('The {0} has been saved.', 'Quetions Detail'));
                }
            }
            //$this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Quetions Detail'));
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
