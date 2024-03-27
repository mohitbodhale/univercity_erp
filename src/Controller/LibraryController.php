<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Library Controller
 *
 * @property \App\Model\Table\LibraryTable $Library
 * @method \App\Model\Entity\Library[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class LibraryController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */
    public function index()
    {
        $this->paginate = [
            'contain' => ['Departments'],
        ];
        $library = $this->paginate($this->Library);

        $this->set(compact('library'));
    }

    /**
     * View method
     *
     * @param string|null $id Library id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $library = $this->Library->get($id, [
            'contain' => ['Departments'],
        ]);

        $this->set(compact('library'));
    }


    /**
     * Add method
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $library = $this->Library->newEmptyEntity();
        if ($this->request->is('post')) {
            $library = $this->Library->patchEntity($library, $this->request->getData());
            if ($this->Library->save($library)) {
                $this->Flash->success(__('The {0} has been saved.', 'Library'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Library'));
        }
        $departments = $this->Library->Departments->find('list', ['limit' => 200]);
        $this->set(compact('library', 'departments'));
    }


    /**
     * Edit method
     *
     * @param string|null $id Library id.
     * @return \Cake\Http\Response|null Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Network\Exception\NotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $library = $this->Library->get($id, [
            'contain' => []
        ]);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $library = $this->Library->patchEntity($library, $this->request->getData());
            if ($this->Library->save($library)) {
                $this->Flash->success(__('The {0} has been saved.', 'Library'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The {0} could not be saved. Please, try again.', 'Library'));
        }
        $departments = $this->Library->Departments->find('list', ['limit' => 200]);
        $this->set(compact('library', 'departments'));
    }


    /**
     * Delete method
     *
     * @param string|null $id Library id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $library = $this->Library->get($id);
        if ($this->Library->delete($library)) {
            $this->Flash->success(__('The {0} has been deleted.', 'Library'));
        } else {
            $this->Flash->error(__('The {0} could not be deleted. Please, try again.', 'Library'));
        }

        return $this->redirect(['action' => 'index']);
    }
}
