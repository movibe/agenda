<?php
App::uses('AppController', 'Controller');
/**
 * Telefones Controller
 *
 * @property Telefone $Telefone
 * @property PaginatorComponent $Paginator
 */
class TelefonesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Telefone->recursive = 0;
		$this->set('telefones', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Telefone->exists($id)) {
			throw new NotFoundException(__('Invalid telefone'));
		}
		$options = array('conditions' => array('Telefone.' . $this->Telefone->primaryKey => $id));
		$this->set('telefone', $this->Telefone->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Telefone->create();
			if ($this->Telefone->save($this->request->data)) {
				$this->Session->setFlash(__('The telefone has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telefone could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
		$operadoras = $this->Telefone->Operadora->find('list');
		$this->set(compact('operadoras'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Telefone->exists($id)) {
			throw new NotFoundException(__('Invalid telefone'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Telefone->save($this->request->data)) {
				$this->Session->setFlash(__('The telefone has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The telefone could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Telefone.' . $this->Telefone->primaryKey => $id));
			$this->request->data = $this->Telefone->find('first', $options);
		}
		$operadoras = $this->Telefone->Operadora->find('list');
		$this->set(compact('operadoras'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Telefone->id = $id;
		if (!$this->Telefone->exists()) {
			throw new NotFoundException(__('Invalid telefone'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Telefone->delete()) {
			$this->Session->setFlash(__('The telefone has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The telefone could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
