<?php
App::uses('AppModel', 'Model');
/**
 * Operadora Model
 *
 * @property Telefone $Telefone
 */
class Operadora extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Telefone' => array(
			'className' => 'Telefone',
			'foreignKey' => 'operadora_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);

}
