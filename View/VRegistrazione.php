<?php
/**
 * File VRegistrazione.php contenente la classe VRegistrazione
 *
 * @package view
 */
/**
 * Classe VRegistrazione, estende la classe view e gestisce la visualizzazione e formattazione del sito
 * 
 * @package View
 */
class VRegistrazione extends View {
    /**
     * Utilizzato per impostare il nome del file .tpl da visualizzare
     * 
     * @var string $_layout
     */
    private $_layout='default';
    /**
     * Fa il set del layout
     * 
     * @param string $layout
     */
    public function setLayout($layout){
    	$this->_layout=$layout;
    }
    /**
     * Compone la schermata per tutti i template che riguardano la registrazione di un utente
     * 
     */
	public function processaTemplate() {
        $this->assign('main_content', $this->fetch('registrazione_'.$this->_layout.'.tpl'));
    }
    /**
     * Compone la schermata per tutti i template che riguarda il login di un utente
     * 
     * @param string $username  parametro utilizzato per visualizzare la username dell'utente una volta loggato
     */
    
    public function processaTemplateLogin($username=null) {
    	
    	if ($username){
    		$this->assign("username", $username);
    	}    	
    	$this->assign('login', $this->fetch('login_'.$this->_layout.'.tpl'));
    }
}
?>
