<?php

/**
 * @access public
 * @package Utility
 */

class USession {
	/**
	 * @return mixed
	 */
    public function __construct() {
        session_start();
        debug($_SESSION);
    }
    /**
     * Imposta nell'array globale $_SESSION la chiave e il valore passati come parametri
     * 
     * @param string $chiave
     * @param string $valore
     */
    function imposta_valore($chiave,$valore) {
        $_SESSION[$chiave]=$valore;
    }
    /**
     * Canclla nell'array globale $_SESSION il valore assegnato alla chiave passata come parametro
     * 
     * @param string $chiave
     */
    function cancella_valore($chiave) {
        unset($_SESSION[$chiave]);
    }
    /**
     * Legge nell'array globale $_SESSION il valore assegnato alla chiave passata come parametro
     * 
     * @param string $chiave
     * @return string | boolean
     */
    function leggi_valore($chiave) {
        if (isset($_SESSION[$chiave]))
            return $_SESSION[$chiave];
        else
            return false;
    }
}
?>