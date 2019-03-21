<?php

/**
 * @access public
 * @package Controller
 */

class CArtista {
	public $k=0;
	/**
	 * Smista sulle task delle varie richieste
	 * @return mixed
	 */
	public function smista(){
	
		$fscheda=USingleton::getInstance("FScheda");
		$view=USingleton::getInstance('VArtista');
		switch ($view->getTask()) {
			case 'verifica':
				return $this->verificaArtista();
			case 'visualizza':
				$id=$view->getId();
				$arr_scheda=$fscheda->search(array(array("id", "=", $id)));
				return $view->getPaginaArtista($arr_scheda[0]);
			case 'ricerca':
				return $this->ricercaArtista();
			case 'ricercabis':
				return $this->ricercaArtistaBis();
			case 'veloce':
				return $this->ricercaVeloce();
		}	
	}
	
	public function ricercaVeloce(){
		$Fdb=USingleton::getInstance("Fdb");
		$nome=$_POST['data'];
		$a_json = array();
		if ($nome!=''){
			$result=$Fdb->query("SELECT nome FROM artista WHERE lower(nome) LIKE '%".$nome."%'");
			$arr=$Fdb->getResultAssoc();
			if($arr>0){
				foreach ($arr as $scheda){
					$name=htmlentities(stripcslashes($scheda['nome']));
					$a_json_row["value"]=$name;
					$a_json_row["label"]=$name;
					array_push($a_json,$a_json_row);
				}
			}
			//else{
				//echo "niente";
			//}
		}
		echo json_encode($a_json);
		flush();
	}
	/*
	public function ricercaVeloce(){
		$Fdb=USingleton::getInstance("Fdb");
		//$output='';
		$nome=$_POST['data'];
		if ($nome!=''){
			$result=$Fdb->query("SELECT nome FROM artista WHERE nome LIKE '%".$nome."%'");
			$arr=$Fdb->getResultAssoc();
			if($arr>0){
				foreach ($arr as $scheda){
					$output[] = array('label' => $scheda['nome']);
					//$output.= '"'.$scheda['nome'].'", ';
					//$output.='"'.$scheda['nome'].'", ';
					//echo $output;
				}
				
			}
		else{
			echo "niente";
		}}
		//$output=substr($output,0,-2);
		//echo $output;
		echo json_encode($output);
	}
	*/
	/**
	 *Verifica l'esistenza di un artista nel momento in cui
	 *un utente inserisce il nome dell'artista per il quale vuole creare una scheda.
	 *In caso di esito positivo (artista esistente e scheda accettata), restituisce la scheda
	 *attualmente pubblicata, offrendo all'utente la possibilita' di modificarla.
	 *Altrimenti restituisce il form di creazione della scheda.
	 *
	 *@return mixed
	 */
	public function verificaArtista(){
		
		$cscheda=USingleton::getInstance("CScheda");
		$vscheda=USingleton::getInstance("VScheda");
		$fscheda=USingleton::getInstance("FScheda");
		$vart=USingleton::getInstance("VArtista");
		
		$nome_artista = $vart->getArtista();
		//in ordine di data dalla piu vecchia alla piu recente
		$schede_db=$fscheda->search(array(array('nome_artista','=',$nome_artista)),"data");	
		
		$accepted=array();
		if($schede_db){//l'artista esiste nel db - rimando scheda artista (con possibilità di modifica)				
			
			$id=null;
			$i=-1;
			foreach ($schede_db as $scheda){
				
				if ($scheda->stato_pubblicazione=="accepted"){
			
					$accepted[] = $scheda;
					$i++;
					$id = $accepted[$i]->id;
				}
			}
			$cscheda->getModuloScheda($id);
		}
		else{//l'artista non esiste nel db - visualizza form creazione
			$vscheda->getModuloCreazione();	
		}
	}
	
	/**
	 * Gestisce la sezione di ricerca degli artisti.
	 * Si occupa di restituire la scheda attualmente pubblicata per l'artista creato.
	 * Se l'artista non esiste oppure non ha almeno una scheda accettata (pubblicata),
	 * si da' all'utente (solo se registrato/loggato) la possibilita' di crearla.
	 * 
	 * @return mixed
	 */
	public function ricercaArtista(){
		
		$vart=USingleton::getInstance("VArtista");
		$fart=USingleton::getInstance("FArtista");
		$fscheda=USingleton::getInstance("FScheda");
		$artista=USingleton::getInstance("EArtista");
		
		
		$nome_artista=$vart->getArtista();
		$artista_db=$fart->search(array(array("nome", "LIKE", "%$nome_artista%")));
		if(count($artista_db)==1){//se esiste vado a prendere l'ultima scheda accettata
			
			$schede_db=$fscheda->search(array(array('nome_artista','LIKE', "%$nome_artista%")),"data");
			$id=null;
			$i=-1;
			if ($schede_db){
				foreach ($schede_db as $scheda){
						
					if ($scheda->stato_pubblicazione=="accepted"){
				
						$accepted[] = $scheda;
						$i++;
						$id = $accepted[$i]->id;
					}
				}
				if ($id!=null){
					$arr_scheda = $fscheda->search(array(array('id','=',$id)));
					$vart->getPaginaArtista($arr_scheda[0]);
				}
				else 
					$vart->artistaInesistente();
			}
			else
				$vart->artistaInesistente();
		}
		if (count($artista_db)==0)
			$vart->artistaInesistente();
		if (count($artista_db)>=2){
			for ($i=0; $i<count($artista_db); $i++){
				$arr_artisti[$i]=$artista->setFromObject($artista_db[$i]);
			}
			$vart->artistaMultiplo($arr_artisti);
		}	
		
	}
	
	public function ricercaArtistaBis(){
	
		$vart=USingleton::getInstance("VArtista");
		$fart=USingleton::getInstance("FArtista");
		$fscheda=USingleton::getInstance("FScheda");
		$artista=USingleton::getInstance("EArtista");
	
	
		$nome_artista=$vart->getArtista();
		$artista_db=$fart->search(array(array("nome", "=", $nome_artista)));
		if($artista_db){//se esiste vado a prendere l'ultima scheda accettata
				
			$schede_db=$fscheda->search(array(array('nome_artista','=', $nome_artista)),"data");
			$id=null;
			$i=-1;
			if ($schede_db){
				foreach ($schede_db as $scheda){
	
					if ($scheda->stato_pubblicazione=="accepted"){
	
						$accepted[] = $scheda;
						$i++;
						$id = $accepted[$i]->id;
					}
				}
				if ($id!=null){
					$arr_scheda = $fscheda->search(array(array('id','=',$id)));
					$vart->getPaginaArtista($arr_scheda[0]);
				}
				else
					$vart->artistaInesistente();
			}
			else
				$vart->artistaInesistente();
		}
		
	
	}
}