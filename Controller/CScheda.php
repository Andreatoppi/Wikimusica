<?php

/**
 * @access public
 * @package Controller
 */

class CScheda {
	/**
	 *Smista le richieste ai relativi metodi della classe.
	 *
	 *@return mixed
	 */
	public function smista(){
		$view=USingleton::getInstance('VScheda');
		$fscheda=USingleton::getInstance('FScheda');
		$vart=USingleton::getInstance('VArtista');
		
		switch ($view->getTask()) {
			case 'crea':
				return $view->inserisciArtista();
			case 'salva':
				return $this->salvaScheda();
			case 'accettata':
				return $this->autorizzaScheda($view->getId());
			case 'modifica':
				$arr_scheda=$fscheda->search(array(array("id", "=", $view->getId())));
				return $view->getModuloModifica($arr_scheda[0]);
			case 'rifiuta':
				return $this->autorizzaScheda($view->getId());
			case 'profilo':
				return $this->getProfilo($view->getUsername());
			case 'cancella':
				$this->cancellaScheda($view->getId());
				return $this->getProfilo($view->getUsername());
		}
		
	}
	
	/**
	 * Gestisce la cancellazione di una scheda.
	 * Imposta stato e stato_pubblicazione a delete e aggiorna lo stato dell'oggetto sul DB.
	 * 
	 * @param int $id
	 */
	
	public function cancellaScheda($id){
		$fscheda=USingleton::getInstance('FScheda');
		
		$scheda_db=$fscheda->search(array(array("id", "=", $id)));
		if($scheda_db){
			foreach ($scheda_db as $scheda){
				$scheda->stato='delete';
				$scheda->stato_pubblicazione='deleted';
				
			}
		}
		$fscheda->update($scheda);
		
	}
	
	/**
	 * Gestisce la visualizzazione del profilo di un utente.
	 * Prepara l'array delle schede di cui l'utente e' autore e le manda in visualizzazione.
	 * 
	 * @param string $username
	 * @return mixed
	 */
	
	public function getProfilo($username){
		$escheda = USingleton::getInstance("EScheda");
		$vscheda=USingleton::getInstance('VScheda');
		
		$schede_utente=$this->getSchedeAutore();
		$schede_delete=$this->getSchedeDelete();
		
		$arr_schede_utente=null;
		$arr_schede_delete=null;
		
		if ($schede_utente){
			foreach ($schede_utente as $schede){
				$arr_schede_utente[] = $escheda->setFromObject($schede);
			}
		}
		if($schede_delete){
				foreach ($schede_delete as $schede_d){
					$arr_schede_delete[] = $escheda->setFromObject($schede_d);
				}
			}
			
			$vscheda->impostaProfilo($arr_schede_utente, $arr_schede_delete);	
		}
	
	/**
	 * Permette all'admin di accettare o rifiutare una richiesta di pubblicazione di una scheda.
	 * In sostanza va a modificare lo stato di pubblicazione di una scheda
	 * per poi aggiornare lo stato nel DB.
	 * 
	 * @param int $id_scheda
	 * @return mixed
	 */

	public function autorizzaScheda($id_scheda){
		$chome=USingleton::getInstance("CHome");
		$fscheda=USingleton::getInstance("FScheda");
		$vscheda=USingleton::getInstance("VScheda");
		
		$scheda_db=$fscheda->search(array(array("id", "=", $id_scheda)));
		if ($vscheda->getTask()=="accettata"){
			$scheda_db[0]->stato_pubblicazione = "accepted";
			$scheda_db[0]->data = "".date("d/m/Y, g:i a",time())."";
		}
		else {
			$scheda_db[0]->stato_pubblicazione = "rejected";
			$scheda_db[0]->data = "".date("d/m/Y, g:i a",time())."";
		}
				
		$fscheda->update($scheda_db[0]);
		$chome->getHome();
	}
	
	/**
	 * Recupera dal DB tutte le schede dell'utente in sessione e le restituisce in un array di oggetti.
	 * Se l'utente non ha schede restituisce false.
	 * 
	 * @return array | boolean
	 */
	
	public function getSchedeAutore(){
	
		$fscheda = USingleton::getInstance("FScheda");
		$vscheda = USingleton::getInstance("VScheda");
		$session = USingleton::getInstance("USession");
		
		$username=$session->leggi_valore('username');
		$scheda_autore = $fscheda->search(array(array("autore", "=", $username),array("stato", "<>", 'delete')));
		if($scheda_autore){
			return $scheda_autore;
		}
		else
			return false;
	}
	
	/**
	 * Restituisce in un array di oggetti tutte le schede con stato = "delete".
	 * 
	 * @return array|boolean
	 */
	
	public function getSchedeDelete(){
	
		$fscheda = USingleton::getInstance("FScheda");
		$vscheda = USingleton::getInstance("VScheda");
		$session = USingleton::getInstance("USession");
	
		$username=$session->leggi_valore('username');
		$scheda_autore = $fscheda->search(array(array("autore", "=", $username),array("stato", "=", 'delete')));
		if($scheda_autore){
			return $scheda_autore;
		}
		else
			return false;
	}
	
	/**
	 *Recupera dal DB tutte le schede con stato di pubblicazione pending, e le restituisce in un array di oggetti.
	 *Se non ci sono schede pending restituisce false
	 *
	 *Usiamo questa funzione per la visualizzazione del pannello dell'amministratore.
	 *
	 *@return array|boolean
	 */
	
	public function getSchedePending(){
	
		$fscheda = USingleton::getInstance("FScheda");
		$vscheda = USingleton::getInstance("VScheda");
	
		$scheda_db = $fscheda->search(array(array("stato_pubblicazione", "=", "pending")));
		if($scheda_db){
			return $scheda_db;
		}
		else 
			return false;
	}

	/**
	 *Restituisce i dati dell'artista ottenuti dalla form di creazione/modifica di una scheda.
	 *
	 *@return array
	 */
	
	public function getDatiArtista(){
		
		$dati_richiesti=array('nome_artista','genere','foto','descrizione');
		$dati=array();
		foreach ($dati_richiesti as $dato) {
			if (isset($_REQUEST[$dato]))
				$dati[$dato]=$_REQUEST[$dato];
		}
		return $dati;
	}
	
	/**
	 *Ogni volta che un utente (admin compreso) invia una richiesta di pubblicazione di una scheda,
	 *essa viene inserita nel DB tramite questa funzione.
	 *
	 *Le schede vengono salvate indistintamente prestando attenzione allo stato di ognuna (le schede
	 *create dall'amministratore vengono direttamente accettate).
	 *
	 *L'artista viene salvato se non e' presente nel DB, altrimenti (nome artista esistente) 
	 *il suo stato viene aggiornato.
	 *
	 *@return mixed
	 */
	
	public function salvaScheda(){//get dati scheda (dalla form) - salva scheda nel db
		
		$vscheda=USingleton::getInstance('VScheda');
		$scheda = USingleton::getInstance("EScheda");
		$fscheda = USingleton::getInstance ("FScheda");
		$artista = USingleton::getInstance ("EArtista");
		$fart = USingleton::getInstance ("FArtista");		
		$sess = USingleton::getInstance ("USession");
		
		$arr_artist = $this->getDatiArtista();
		$artista->setFromArray($arr_artist);
		
		$artista_db=$fart->search(array(array("nome", "=", $artista->nome)));	
		
		if ($artista_db){
			
			$id=$artista_db[0]->id;
			$artista->id=$id;
			
			$fart->update($artista);
			$scheda->stato = "modified";
				
		}
		else{
			$id=$fart->store($artista);
			$scheda->stato = "new";
				
		}
		
		$username = $sess->leggi_valore("username");
		if ($username=="admin"){
			$scheda->stato_pubblicazione = "accepted";			
				
		}
		else {
			$scheda->stato_pubblicazione = "pending";				
		}	
		
		$scheda->setFromArray($this->getDatiArtista());
		$scheda->autore = $username;
		$scheda->id_artista = $id;
		$scheda->data = "".date("d/m/Y, g:i a",time())."";
		
		$fscheda->store($scheda);
		
		$vscheda->schedaSalvata();
		
		
	}
	
	/**
	 *Gestisce la visualizzazione dei form di modifica/creazione di una scheda
	 *a seconda del parametro passato alla funzione.
	 *
	 *@param int $id
	 *@return mixed
	 */
	
	public function getModuloScheda($id=null){//recuperare dal db tutti i campi precompilati - assegnarli ai placeholder del tpl - e visualizzare
		
		$vscheda=USingleton::getInstance("VScheda");
		$fscheda = USingleton::getInstance("FScheda");
		
		if($vscheda->getTask()=='visualizza'){
			$arr_scheda = $fscheda->search(array(array("id", "=", $id)));
			$vscheda->getModuloModifica($arr_scheda[0]);
		}
		else{
			if ($id){
					
				$arr_scheda = $fscheda->search(array(array("id", "=", $id)));
				$vscheda->getModuloModifica($arr_scheda[0]);
			}
			else{
				$vscheda->getModuloCreazione();
			}
		}
		
	}
	
}