<?php
App::uses('Operadora', 'Model');

/**
 * Operadora Test Case
 *
 */
class OperadoraTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.operadora',
		'app.telefone',
		'app.contato',
		'app.grupo'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Operadora = ClassRegistry::init('Operadora');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Operadora);

		parent::tearDown();
	}

}
