<?php
/**
 * @access public
 * @package Foundation
 */

class FArtista extends Fdb {
	
	/**
	 *Esegue l'override del costruttore padre, impostando gli attributi di classe in modo opportuno
	 */
	
	public function __construct() {
		$this->_table='artista';
		$this->_key='id';
		$this->_auto_increment=true;
		$this->_return_class='EArtista';
	    USingleton::getInstance('Fdb');
	}
	
}