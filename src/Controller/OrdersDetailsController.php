<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * OrdersDetails Controller
 *
 * @property \App\Model\Table\OrdersDetailsTable $OrdersDetails
 * @method \App\Model\Entity\OrdersDetail[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class OrdersDetailsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Orders'],
        ];
        $ordersDetails = $this->paginate($this->OrdersDetails);

        $this->set(compact('ordersDetails'));
    }

    /**
     * View method
     *
     * @param string|null $id Orders Detail id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $ordersDetail = $this->OrdersDetails->get($id, [
            'contain' => ['Orders'],
        ]);

        $this->set(compact('ordersDetail'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $ordersDetail = $this->OrdersDetails->newEmptyEntity();
        if ($this->request->is('post')) {
            $ordersDetail = $this->OrdersDetails->patchEntity($ordersDetail, $this->request->getData());
            if ($this->OrdersDetails->save($ordersDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Orders Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Orders Detail'));
        }
        $orders = $this->OrdersDetails->Orders->find('list', ['limit' => 200]);
        $this->set(compact('ordersDetail', 'orders'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Orders Detail id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $ordersDetail = $this->OrdersDetails->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $ordersDetail = $this->OrdersDetails->patchEntity($ordersDetail, $this->request->getData());
            if ($this->OrdersDetails->save($ordersDetail)) {
                $this->Flash->success(__('The {0} has been saved.', 'Orders Detail'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Orders Detail'));
        }
        $orders = $this->OrdersDetails->Orders->find('list', ['limit' => 200]);
        $this->set(compact('ordersDetail', 'orders'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Orders Detail id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $ordersDetail = $this->OrdersDetails->get($id);
        if ($this->OrdersDetails->delete($ordersDetail)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Orders Detail'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Orders Detail'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
