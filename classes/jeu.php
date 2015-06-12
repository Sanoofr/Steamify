<?php
/**
 * Modèle du json jeu de steam
 */
class jeu {
	/**
	* Id du jeux steam
	*/
	private $id = null;
	
	/**
	* Adresse de l'image sous steam
	*/
	private $image = null;
	
	/**
	* Nom du jeu sous steam
	*/
	private $nom = null;
	
	/**
	* Page du magasin
	*/
	private $page_steam = null;
	
	/**
	* Catégorie du jeu
	*/
	private $categorie = null;
	
	/**
	* Genre du jeu
	*/
	private $genre = null;

	public function __construct($_game_data){
		$this->id = $_game_data['appid'];
		$this->image = $_game_data['image'];
		$this->nom = $_game_data['nom'];
		$this->page_steam = $_game_data['site_steam'];
		$this->categorie = $_game_data['catégorie'];
		$this->genre = $_game_data['genres'];
	}

	public function afficheJeu(){ }
}