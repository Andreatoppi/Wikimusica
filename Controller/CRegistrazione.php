<?php
/**
 * @access public
 * @package Controller
 */
class CRegistrazione {

	/**
	 * Smista le richieste ai relativi metodi della classe
	 *
	 * @return mixed
	 */
	public function smista() {
		$view=USingleton::getInstance('VRegistrazione');
		switch ($view->getTask()) {
			case 'default':
				return $this->getModuloRegistrazione();
			case 'autentica':
				switch ($view->getController()){
					case "registrazione":
						return $this->salvaUtente();
					case "login":
						return $this->getUtenteRegistrato();
				}
			case 'logout':
				return $this->getUtenteRegistrato();
			case 'verificaUser':
				return $this->verificaUsername();
		}
	}
	
	public function verificaUsername(){
		$Fdb=USingleton::getInstance("Fdb");
		$username=$_POST['username'];
		$result=$Fdb->query("SELECT username FROM utente WHERE username='$username'");
		if($Fdb->getResultAssoc()>0){
			echo 'occupato';
		} else{
			echo 'disponibile';
			}
	}
	/**
	 * Gestisce la visualizzazione del modulo di registrazione
	 *
	 */
	public function getModuloRegistrazione() {
		$vreg=USingleton::getInstance('VRegistrazione');
		$vreg->setLayout($vreg->getTask());
		$vreg->processaTemplate();
		$vreg->display("header_footer.tpl");
	}
	
	/**
	 * Salva l'utente del database una volta che ha compilato il form di registrazione
	 * 
	 * @return mixed
	 */
	public function salvaUtente() {
	
		$utente=new EUtente();
		$FUtente=USingleton::getInstance("FUtente");
		$vreg = USingleton::getInstance("VRegistrazione");
	
		$dati_registrazione=$this->getDatiRegistrazione();
		$result = $FUtente->load($dati_registrazione['username']);
		if ($result==false) {//utente non esiste
			$keys=array_keys($dati_registrazione);
			$i=0;
			foreach ($dati_registrazione as $dato) {
				$utente->$keys[$i]=$dato;
				$i++;
			}
			$FUtente->store($utente);
			$vreg->setLayout($vreg->getTask());
			$vreg->processaTemplate();
		}
		else {//utente esistente
			$vreg->setLayout("errore");
			$vreg->processaTemplate();
		}
		$vreg->display("header_footer.tpl");	
	}
	
	/**
     * Controlla se l'utente e' registrato ed autenticato una volta effettuato il login.
     * Gestisce inoltre il logout e gli errori in fase di login.
     *
     * @return mixed
     */
    public function getUtenteRegistrato() {//prende user e pw dal form - confronta con il db- in caso affermativo restituisce tpl benvenuto-else tpl errore
    	
    	$session=USingleton::getInstance('USession');
    	$vreg= USingleton::getInstance('VRegistrazione');
    	$chome= USingleton::getInstance("CHome");
    	
    	$task=$vreg->getTask();    		
    	$username=$vreg->getUsername();
    	if ($task=="autentica"){

    		$futente = USingleton::getInstance("FUtente");
    		$password=$vreg->getPassword();
  
    		$utente_registrato = $futente->search( array (array ('username', '=', $username ),array ('password', '=', $password)));
    		if($utente_registrato){
    				 
    			$session->imposta_valore("username",$username);
    			$chome->getHome();
    		}
    		else {
    			$vreg->setLayout("errore");
    			$vreg->processaTemplateLogin();
    			$vreg->assign("main_content",$vreg->fetch("home_default.tpl"));
    			$vreg->assign("cerca", $vreg->fetch("ricerca_info.tpl"));
    			$vreg->display("header_footer.tpl");
    		}
    	}
    	elseif ($task=="logout"){
    		$session->cancella_valore("username");
    		$vreg->assign("login", $vreg->fetch("login_default.tpl"));
    		$vreg->assign("main_content",$vreg->fetch("home_default.tpl"));
    		$vreg->assign("cerca", $vreg->fetch("ricerca_info.tpl"));
    		$vreg->display("header_footer.tpl");
    	}
    }
	/**
	 * Imposta i dati nel template identificati da una chiave ed il relativo valore
	 *
	 * @return array
	 */
	public function getDatiRegistrazione() {
		$dati_richiesti=array('username','password','nome','cognome','email');
		$dati=array();
		foreach ($dati_richiesti as $dato) {
			if (isset($_REQUEST[$dato]))
				$dati[$dato]=$_REQUEST[$dato];
		}
		return $dati;
	}
        
}
