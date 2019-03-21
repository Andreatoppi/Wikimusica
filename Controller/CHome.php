<?php

/**
 * @access public
 * @package Controller
 */

class CHome{

	/**
	 * Si occupa di impostare la home a seconda del tipo di utente che ne fa richiesta
	 * 
	 * @return mixed
	 */
	
	public function getHome(){
		$sess = USingleton::getInstance ( "USession" );
		$vhome = USingleton::getInstance ( "VHome" );
		$cscheda = USingleton::getInstance ( "CScheda" );
		$escheda = USingleton::getInstance ( "EScheda" );
		
		if (isset($_SESSION["username"])){
			
			$utente = $sess->leggi_valore("username");
			if ($utente=="admin"){
				$this->getHomeAdmin();
			}
			else 
				$vhome->impostaPaginaRegistrato($_SESSION["username"]);
		}
		else {
			$vhome->impostaPaginaOspite();
		}
		
		$vhome->display("header_footer.tpl");
	}
	
	/**
	 * Compone la home dell'amministratore con la tabella delle richieste di pubblicazione
	 * 
	 * @return mixed
	 */
	
	public function getHomeAdmin(){
		$cscheda = USingleton::getInstance("CScheda");
		$escheda = USingleton::getInstance("EScheda");
		$vhome = USingleton::getInstance("VHome");
		
		$arr_pending = $cscheda->getSchedePending();
		if ($arr_pending){
			foreach ($arr_pending as $scheda_pending){
				$arr_schede_pend[] = $escheda->setFromObject($scheda_pending);
			}
			$vhome->impostaPaginaAdmin($arr_schede_pend);
		}
		else
			$vhome->impostaPaginaAdmin();
	}	

	/**
	 * Smista le richieste ai vari controller
	 *
	 * @return mixed
	 */
	public function smista() {
		$view=USingleton::getInstance('VHome');
		switch ($view->getController()) {
			case 'registrazione':
				$CRegistrazione=USingleton::getInstance('CRegistrazione');
				return $CRegistrazione->smista();
			case 'login':
				$CRegistrazione=USingleton::getInstance('CRegistrazione');
				return $CRegistrazione->smista();
			case 'scheda':
				$CScheda=USingleton::getInstance('CScheda');
				return $CScheda->smista();
			case 'artista':{
				$CArtista=USingleton::getInstance('CArtista');
				return $CArtista->smista();}
			case 'utente':{
				$CUtente=USingleton::getInstance('CUtente');
				return $CUtente->smista();
			}

			default:
				$this->getHome();
		}
	}
}
?>