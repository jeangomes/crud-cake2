<?php
/**
 * Created by PhpStorm.
 * User: jean
 * Date: 13/08/18
 * Time: 20:47
 */

class CollaboratorsController extends AppController
{
    public $helpers = array('Html', 'Form');
    public $components = array('Flash');

    public function index()
    {
        $this->set('collaborators', $this->Collaborator->find('all'));
        if (isset($this->request->query['active'])) {
            $this->set('collaborators', $this->Collaborator->find('all', array(
                'conditions' => array('Collaborator.active' => $this->request->query['active'])
            )));
        }

    }

    public function add()
    {
        if ($this->request->is('post')) {
            $this->Collaborator->create();
            if ($this->Collaborator->save($this->request->data)) {
                $this->Flash->success(__('Colaborador cadastrado com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível cadastrar o colaborador.'));
        }
    }

    public function edit($id = null)
    {
        if (!$id) {
            throw new NotFoundException(__('Colaborador inválido'));
        }

        $post = $this->Collaborator->findById($id);
        if (!$post) {
            throw new NotFoundException(__('Colaborador inválido'));
        }

        if ($this->request->is(array('post', 'put'))) {
            $this->Collaborator->id = $id;
            if ($this->Collaborator->save($this->request->data)) {
                $this->Flash->success(__('Colaborador alterado com sucesso.'));
                return $this->redirect(array('action' => 'index'));
            }
            $this->Flash->error(__('Não foi possível alterar o colaborador.'));
        }

        if (!$this->request->data) {
            $this->request->data = $post;
        }
    }

    public function delete($id)
    {
        if ($this->request->is('get')) {
            throw new MethodNotAllowedException();
        }

        if ($this->Collaborator->delete($id)) {
            $this->Flash->success(
                __('O colaborador com o id: %s foi deletado.', h($id))
            );
        } else {
            $this->Flash->error(
                __('O colaborador com o id: %s não pode ser deletado.', h($id))
            );
        }

        return $this->redirect(array('action' => 'index'));
    }
}