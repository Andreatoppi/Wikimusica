<?php

/**
 * File VScheda.php contenente la classe VScheda
 *
 * @package view
 */
/**
 * Classe VScheda, estende la classe view e gestisce la visualizzazione e formattazione del sito
 *
 * @package View
 */

class VScheda extends View {
	
	/**
	 * In base ai parametri passati imposta il profilo utente (admin compreso).
	 * Visualizza le schede create da un utente e quelle da lui cancellate.
	 * 
	 * @param array $schede
	 * @param array $schede_d
	 *
	 */

	public function impostaProfilo($schede=null, $schede_d=null){
		$session = USingleton::getInstance("USession");
		$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		
		if ($schede){
			$this->assign("schede", $schede);
			$this->assign("main_content",$this->fetch("schede_profilo.tpl"));
		}
		else {
			$this->assign("no_schede","Non hai creato schede fino a questo momento");
			$this->assign("main_content",$this->fetch("schede_profilo.tpl"));
	
		}
		
		if ($schede_d){
			$this->assign("schede_d", $schede_d);
			$this->assign("main_content",$this->fetch("schede_profilo.tpl"));
		}
		else {
			$this->assign("no_schede_d","Non ci sono schede cancellate");
			$this->assign("main_content",$this->fetch("schede_profilo.tpl"));
		
		}
		
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign("login", $this->fetch("login_autentica.tpl"));
		$this->display ( "header_footer.tpl" );
	}
	
	/**
	 * imposta e visualizza la form per l'inserimento e successiva verifica dell'esistenza di un artista
	 */
	public function inserisciArtista() {
		$session = USingleton::getInstance("USession");
		$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		
		$this->assign ( "main_content", $this->fetch ( "artista_inserisci.tpl" ) );
		$this->display ( "header_footer.tpl" );
	}
	
	/**
	 *Notifica all'utente, con una schermata, la corretta creazione di una scheda
	 */
	public function schedaSalvata(){
	
		$session = USingleton::getInstance("USession");
		$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
	
		$this->assign("main_content", $this->fetch("artista_salvato.tpl"));
		$this->display("header_footer.tpl");
	}
	
	/**
	 * Imposta e visualizza la schermata per la creazione di una scheda, solo per gli utenti loggati
	 */
	public function getModuloCreazione() {
		
		$session = USingleton::getInstance("USession");
		$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		$this->assign("nome_artista", $this->getArtista());
		$this->assign ( "main_content", $this->fetch ( "artista_form.tpl" ) );
		$this->display ( "header_footer.tpl" );
	}
	
	/**
	 * Se l'artista che l'utente vuole creare esiste gia' tramite questa funzione viene restituito il form 
	 * precompilato con i dati ottenuti dal DB.
	 * 
	 * @param EScheda $scheda
	 */
	public function getModuloModifica(EScheda $scheda) {
		
		$session = USingleton::getInstance("USession");
		$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		
		$this->assign ( "nome_artista", $scheda->nome_artista );
		$this->assign ( "genere", $scheda->genere );
		$this->assign ( "descrizione", $scheda->descrizione );
		$this->assign ( "foto", $scheda->foto );
		
		$this->assign ( "main_content", $this->fetch ( "artista_form.tpl" ) );
		$this->display ( "header_footer.tpl" );
	}
}
?>