<?php
/**
 * Classe de l'utilisateur
 */
class jeu {
	private $id = null;
	private $image = null;
	private $nom = null;
	private $page_steam = null;
	private $categorie = null;
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