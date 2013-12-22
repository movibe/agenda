<?php
App::uses('AppController', 'Controller');
/**
 * Operadoras Controller
 *
 * @property Operadora $Operadora
 * @property PaginatorComponent $Paginator
 */
class OperadorasController extends AppController {

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
		$this->Operadora->recursive = 0;
		$this->set('operadoras', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Operadora->exists($id)) {
			throw new NotFoundException(__('Invalid operadora'));
		}
		$options = array('conditions' => array('Operadora.' . $this->Operadora->primaryKey => $id));
		$this->set('operadora', $this->Operadora->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Operadora->create();
			if ($this->Operadora->save($this->request->data)) {
				$this->Session->setFlash(__('The operadora has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operadora could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		if (!$this->Operadora->exists($id)) {
			throw new NotFoundException(__('Invalid operadora'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Operadora->save($this->request->data)) {
				$this->Session->setFlash(__('The operadora has been saved.'), 'default', array('class' => 'alert alert-success'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The operadora could not be saved. Please, try again.'), 'default', array('class' => 'alert alert-error'));
			}
		} else {
			$options = array('conditions' => array('Operadora.' . $this->Operadora->primaryKey => $id));
			$this->request->data = $this->Operadora->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->Operadora->id = $id;
		if (!$this->Operadora->exists()) {
			throw new NotFoundException(__('Invalid operadora'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Operadora->delete()) {
			$this->Session->setFlash(__('The operadora has been deleted.'), 'default', array('class' => 'alert alert-success'));
		} else {
			$this->Session->setFlash(__('The operadora could not be deleted. Please, try again.'), 'default', array('class' => 'alert alert-error'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
