<?php

/**
 * Classe VHome, estende la classe view e gestisce la visualizzazione e formattazione del sito 
 */

class VHome extends View {

	/**
	 * Assegna alla pagina dell'utente registrato i rispettivi template
	 * 
	 * @param string $username
	 */
	
	public function impostaPaginaRegistrato($username){

		$this->assign("main_content",$this->fetch("home_default.tpl"));
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign("username", "Benvenuto ".$username);
		$this->assign("login", $this->fetch("login_autentica.tpl"));
	}
	/**
	 * Assegna alla pagina dell'utente non registrato (ospite) i rispettivi template
	 * 
	 * @return mixed
	 */
	public function impostaPaginaOspite(){
			
		$this->assign("main_content",$this->fetch("home_default.tpl"));
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign("login", $this->fetch("login_default.tpl"));
	}
	
	/**
	 * Assegna alla pagina dell'utente amministratore i rispettivi template
	 * 
	 * @param array
	 */
	public function impostaPaginaAdmin($pending=null){
		$this->assign("bentornato_admin", "Bentornato Amministratore");
		if ($pending){
			$this->assign("pending", $pending);
			$this->assign("main_content",$this->fetch("admin_default.tpl"));
		}
		else {
			$this->assign("no_pending","Al momento non ci sono richieste di pubblicazione");
			$this->assign("main_content",$this->fetch("admin_default.tpl"));			
		
		}
		
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign("login", $this->fetch("login_autentica.tpl"));
	}

}
?>
