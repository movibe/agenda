<?php
/**
 * ContatoFixture
 *
 */
class ContatoFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'grupo_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'telefone_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'genero_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'title' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 65, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'sobrenome' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'apelido' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 45, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'nascimento' => array('type' => 'date', 'null' => true, 'default' => null),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => array('id', 'grupo_id', 'telefone_id', 'genero_id'), 'unique' => 1),
			'fk_contatos_grupos_idx' => array('column' => 'grupo_id', 'unique' => 0),
			'fk_contatos_telefones_idx' => array('column' => 'telefone_id', 'unique' => 0),
			'fk_contatos_generos_idx' => array('column' => 'genero_id', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'grupo_id' => 1,
			'telefone_id' => 1,
			'genero_id' => 1,
			'title' => 'Lorem ipsum dolor sit amet',
			'sobrenome' => 'Lorem ipsum dolor sit amet',
			'apelido' => 'Lorem ipsum dolor sit amet',
			'nascimento' => '2013-12-23',
			'created' => '2013-12-23 14:49:21',
			'modified' => '2013-12-23 14:49:21'
		),
	);

}
