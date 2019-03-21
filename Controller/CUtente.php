<?php

class CUtente{
	
public function smista(){
	
		$fscheda=USingleton::getInstance("FScheda");
		$view=USingleton::getInstance('VArtista');
		switch ($view->getTask()) {
			case 'lista':
				return $this->listaUtenti();
			case 'schede':
				return $this->listaSchede();
		}	
	}
	
	public function listaSchede(){
		$FScheda=USingleton::getInstance("FScheda");
		$a_json=array();
		$username=$_POST['username'];
		$result=$FScheda->query("SELECT * FROM scheda WHERE autore='$username'");
		$arr=$FScheda->getResultAssoc();
			if($arr>0){
				foreach ($arr as $scheda){
					$a_json_row["nome_artista"]=$scheda['nome_artista'];
					$a_json_row["data"]=$scheda['data'];
					$a_json_row["stato"]=$scheda['stato'];
					$a_json_row["stato_pubblicazione"]=$scheda['stato_pubblicazione'];
					array_push($a_json,$a_json_row);	
				}

			}
			else
				echo "L'utente non ha ancora creato schede.";
		echo json_encode($a_json);
	}
/*
public function listaUtenti(){
	$FUtente=USingleton::getInstance("FUtente");
	$out='';
	$output=[3];
		//$a_json = array();
			$result=$FUtente->query("SELECT * FROM utente");
			$arr=$FUtente->getResultAssoc();
			if($arr>0){
				foreach ($arr as $scheda){
					$k=0;
					$output[0]=$scheda['username'];
					if ($output[0])
						$k++;
					$output[1]=$scheda['nome'];
					if ($output[1])
						$k++;
					$output[2]=$scheda['cognome'];
						if ($output[2])
						$k++;					
					$output[3]=$scheda['email'];
						if ($output[3])
						$k++;
					
					if ($k==4){
						$out.='<tr>
								<td><h5>'.$output[0].'</h5></td>
								<td><h5>'.$output[1].'</h5></td>
								<td><h5>'.$output[2].'</h5></td>
								<td><h5>'.$output[3].'</h5></td>
								</tr>';
								echo $out;
					}
					
					}
					//$name=htmlentities(stripcslashes($scheda['nome']));
					//$a_json_row["username"]=$scheda["username"];
					//$a_json_row["nome"]=$scheda["nome"];
					//$a_json_row["cognome"]=$scheda["cognome"];
					//$a_json_row["email"]=$scheda["email"];
					//array_push($a_json,$a_json_row);
				}

			}
			//else
				//echo "Nessun utente registrato";
		//echo77 json_encode($a_json);
//}*/
public function listaUtenti(){
	$FUtente=USingleton::getInstance("FUtente");
	$a_json = array();
			$result=$FUtente->query("SELECT * FROM utente");
			$arr=$FUtente->getResultAssoc();
			if($arr>0){
				$valori=count($arr);
				foreach ($arr as $scheda){
					$a_json_row["username"]=$scheda['username'];
					$a_json_row["nome"]=$scheda['nome'];
					$a_json_row["cognome"]=$scheda['cognome'];
					$a_json_row["email"]=$scheda['email'];
					array_push($a_json,$a_json_row);	
				}

			}
			else
				echo "Nessun utente registrato";
		echo json_encode($a_json);
}
}
?>