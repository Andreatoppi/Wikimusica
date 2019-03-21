<?php
require('lib/smarty/Smarty.class.php');
/**
 * @access public
 * @package View
 */

class View extends Smarty {
    
	/**
	 * Nel costruttore di questa classe (che eredita smarty) andiamo solo a impostare i path delle directory
	 * con le quali lavora smarty.
	 * 
	 * Questi dati sono settati nel file di configurazione "config.inc.php".
	 * 
	 * @return mixed
	 */
	public function __construct() {
        $this->Smarty();
        global $config;
        $this->template_dir = $config['smarty']['template_dir'];
        $this->compile_dir = $config['smarty']['compile_dir'];
        $this->config_dir = $config['smarty']['config_dir'];
        $this->cache_dir = $config['smarty']['cache_dir'];
        $this->caching = false;
    }
    
    
    /**
     * restituisce la password passata tramite GET o POST
     *
     * @return string|boolean
     */
    public function getPassword() {
    	if (isset($_REQUEST['password']))
    		return $_REQUEST['password'];
    		else
    			return false;
    }
    /**
     * restituisce la username passata tramite GET o POST
     *
     * @return string|boolean
     */
    public function getUsername() {
    	if (isset($_REQUEST['username']))
    		return $_REQUEST['username'];
    		else
    			return false;
    }
    /**
     * restituisce la task passata tramite GET o POST
     * @return string|boolean
     */
    public function getTask() {
    	if (isset($_REQUEST['task']))
    		return $_REQUEST['task'];
    		else
    			return false;
    }
    /**
     * restituisce il controller passato tramite GET o POST
     * @return string|boolean
     */
    public function getController() {
    	if (isset($_REQUEST['controller']))
    		return $_REQUEST['controller'];
    		else
    			return false;
    }
    /**
     * restituisce l'id passato tramite GET o POST
     * @return string|boolean
     */
    
    public function getId(){
    	if (isset($_REQUEST['id']))
    		return $_REQUEST['id'];
    		else
    			return false;
    }
    /**
     * restituisce il nome dell'artista passato tramite GET o POST
     * @return string|boolean
     */
    public function getArtista(){
    	if (isset($_REQUEST["nome_artista"])){
    		return $_REQUEST["nome_artista"];
    	}
    	else
    		return false;
    }
    /**
     * restituisce il passo di ricerca passato tramite GET o POST
     *
     * @return string|boolean
     */
    public function getPasso() {
    	if (isset($_REQUEST['passo']))
    		return $_REQUEST['passo'];
    		else
    			return false;
    }
}
?>
