<?php
/**
 * @access public
 * @package Foundation
 */

class FUtente extends Fdb{
	
	/**
	 *Esegue l'override del costruttore padre, impostando gli attributi di classe in modo opportuno
	 */
	
    public function __construct() {
        $this->_table='utente';
        $this->_key='username';
        $this->_return_class='EUtente';
        USingleton::getInstance('Fdb');
    }
}
?>
