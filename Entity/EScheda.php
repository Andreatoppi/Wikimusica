<?php

/**
 * @access public
 * @package Entity
 */

class EScheda {
	
	/**
	 * @AttributeType int
	 *
	 */
	public $id;
	/**
	 * @AttributeType int
	 * 
	 * corrisponde all'id dell'artista a cui la scheda fa riferimento.
	 */
	public $id_artista;
	
	/**
	 * @AttributeType string
	 */
	public $nome_artista;
	
	/**
	 * @AttributeType string
	 */
	public $genere;
	/**
	 * @AttributeType string
	 */
	public $foto;
	
	/**
	 * @AttributeType string
	 */
	public $descrizione;
	/**
	 * @AssociationType Entity.EUtente
	 * @AssociationMultiplicity 1..*
	 * @AssociationKind Aggregation
	 */
	public $autore;
	/**
	 * @AttributeType string
	 */
	public $stato;
	/**
	 * @AttributeType string
	 */
	public $stato_pubblicazione;
	/**
	 * @AttributeType string
	 */
	public $data;
	
	/**
	 *Dato l'array passato come parametro, permette di settare il corrispettivo oggetto EScheda.
	 *
	 *@param array
	 */
	
	public function setFromArray($array){
		if(isset($array['nome_artista'])) $this->nome_artista = $array['nome_artista'];
		if(isset($array['foto'])) $this->foto = $array['foto'];
		if(isset($array['autore'])) $this->autore = $array['autore'];
		if(isset($array['genere'])) $this->genere = $array['genere'];
		if(isset($array['data'])) $this->data = $array['data'];
		if(isset($array['stato'])) $this->stato = $array['stato'];
		if(isset($array['stato_pubblicazione'])) $this->stato_pubblicazione = $array['stato_pubblicazione'];
		if(isset($array['id'])) $this->id = $array['id'];
		if(isset($array['id_artista'])) $this->id_artista = $array['id_artista'];
		if(isset($array['descrizione'])) $this->descrizione = $array['descrizione'];
		
	}
	
	/**
	 *Dato l'oggetto passato come parametro, permette di settare un corrispettivo array.
	 *
	 *@param ESchedas $object
	 *@return array
	 */
	
	public function setFromObject($object){
		$array=array();
		
		if(isset($object->nome_artista)) $array['nome_artista'] = $object->nome_artista;
		if(isset($object->foto)) $array['foto'] = $object->foto;
		if(isset($object->autore)) $array['autore'] = $object->autore;
		if(isset($object->genere)) $array['genere'] = $object->genere;
		if(isset($object->data)) $array['data'] = $object->data;
		if(isset($object->stato)) $array['stato'] = $object->stato;
		if(isset($object->stato_pubblicazione)) $array['stato_pubblicazione'] = $object->stato_pubblicazione;
		if(isset($object->id)) $array['id'] = $object->id;
		if(isset($object->id_artista)) $array['id_artista'] = $object->id_artista;
		if(isset($object->descrizione)) $array['descrizione'] = $object->descrizione;
		
		return $array;	
	}
}
?>