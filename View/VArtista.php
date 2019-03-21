<?php
/**
 * File VArtista.php contenente la classe VArtista
 *
 * @package view
 */
/**
 * Classe VArtista, estende la classe view e gestisce la visualizzazione e formattazione del sito
 * @package View
 */

class VArtista extends View{
	
	public function artistaMultiplo($artisti){
		$session = USingleton::getInstance("USession");
		if (isset($_SESSION["username"]))
			$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		
		$this->assign("artisti", $artisti);
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign ( "main_content", $this->fetch("artista_multiplo.tpl" ));
		$this->display ( "header_footer.tpl" );
	}
	
	/**
	 * Assegna alle variabili di smarty i rispettivi valori, ottentuti dall'oggetto
	 * scheda passato come parametro.
	 * 
	 * @param object $scheda
	 */
	
	public function getPaginaArtista(EScheda $scheda){
		$session = USingleton::getInstance("USession");
		if (isset($_SESSION["username"]))
			$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		
		if ($session->leggi_valore("username")=="admin"){
			$this->assign("torna_indietro", "Torna indietro");
			$this->assign("applica_modifica", "Applica modifica");
		}
		$this->assign ( "id", $scheda->id );
		$this->assign ( "nome_artista", $scheda->nome_artista );
		$this->assign ( "genere", $scheda->genere );
		$this->assign ( "descrizione", $scheda->descrizione );
		$this->assign ( "foto", $scheda->foto );
		
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign ( "main_content", $this->fetch ( "artista_scheda.tpl" ) );
		$this->display ( "header_footer.tpl" );
	}
	
	/**
	 * Manda in output il template per notificare all'utente che la scheda relativa all'artista cercato
	 * non è ancora presente o accettata nel DB.
	 */
	
	public function artistaInesistente(){
		
		//tpl ARTISTA INESISTENTE con link a modulo di creazione(controllo utente loggato)
		$session = USingleton::getInstance("USession");
		if (isset($_SESSION["username"]))
			$this->assign("username", "Benvenuto ".$session->leggi_valore("username"));
		
		if (isset($_SESSION["username"])){
			$this->assign("crea_scheda", "Crea ora la scheda");
		}
		
		$this->assign("cerca", $this->fetch("ricerca_info.tpl"));
		$this->assign("main_content", $this->fetch("artista_inesistente.tpl"));
		$this->display("header_footer.tpl");
	}
}
?>
