<?php

/**
 * @access public
 * @package Entity
 */

class EArtista {
	
	/**
	 * @AttributeType int
	 */
	public $id;
	/**
	 * @AttributeType string
	 */
	public $nome;
	/**
	 * @AttributeType string
	 */
	public $genere;
	/**
	 * @AttributeType string
	 */
	public $descrizione;
	/**
	 * @AttributeType string
	 *
	 */
	public $foto;
	
	/**
	 *Dato l'array passato come parametro, permette di settare il corrispettivo oggetto EArtista.
	 *
	 *@param array
	 */
	public function setFromArray($array){
		if(isset($array['nome_artista'])) $this->nome = $array['nome_artista'];
		if(isset($array['genere'])) $this->genere = $array['genere'];
		if(isset($array['descrizione'])) $this->descrizione = $array['descrizione'];
		if(isset($array['foto'])) $this->foto = $array['foto'];
	}
	
	public function setFromObject($object){
		$array=array();
		
		if(isset($object->nome)) $array['nome_artista'] = $object->nome;
		if(isset($object->genere)) $array['genere'] = $object->genere;
		if(isset($object->id)) $array['id'] = $object->id;
		if(isset($object->descrizione)) $array['descrizione'] = $object->descrizione;
		
		return $array;
	}
	
}
	
