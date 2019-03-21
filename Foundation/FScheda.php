<?php
/**
 * @access public
 * @package Foundation
 */

class FScheda extends Fdb{
	
	/**
	 *Esegue l'override del costruttore padre, impostando gli attributi di classe in modo opportuno
	 */
	
	public function __construct() {	
		$this->_table='scheda';
		$this->_key='id';
		$this->_auto_increment=true;
		$this->_return_class='EScheda';
		USingleton::getInstance('Fdb');
	}
}