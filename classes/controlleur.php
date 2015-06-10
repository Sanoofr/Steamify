<?php
include 'steamConfig.php';
include 'utilisateur.php';
include 'jeu.php';
/**
 * Controlleur de l'api
 */
class controlleur {
	private $steam_config = null;
	private $last_data = null;
	private $id_utilisateur = null;
	private $collection_utilisateurs = null;
	private $collection_jeux = null;

	public function __construct($_id_utilisateur){
		$this->id_utilisateur = $_id_utilisateur;
		$this->steam_config = steamConfig::getInstance();
	}

	//Récupération de la liste des utilisateurs
	public function recuperationListeUtilisateur(){
		$url = $this->steam_config->getUrlFriendsList($this->id_utilisateur);
		$this->last_data = json_decode(file_get_contents($url), true);
		foreach($this->last_data['friendslist']['friends'] as $friend){
			$frined_ids[] = $friend['steamid'];
		}
		unset($this->last_data);
		$this->last_data = implode(",", &$frined_ids);
		
		$url = $this->steam_config->getUrlFriendInfo($this->last_data);
		$this->last_data = json_decode(file_get_contents($url), true);
		foreach($this->last_data['response']['players'] as $friend){
			$this->collection_utilisateurs[$friend['steamid']] = new utilisateur($friend['steamid'], $friend['personastate'], $friend['avatarfull'], $friend['personaname']);
		}
		unset($this->last_data);
	}
	
	public function afficherTousLesUtilisateur(){ }

	private function recuperationListeJeux() {
		$url = $this->steam_config->getUrlListeJeux($this->id_utilisateur);
		$this->last_data = json_decode(file_get_contents($url), true);
		foreach($this->last_data['response']['games'] as $game){
			$game_ids[] = $game['appid'];
		}
		unset($this->last_data);
		$this->last_data = '['.implode(",", &$game_ids).']';
	}

	public function recuperationListeJeuxEnCommun($_user_id){
		$this->recuperationListeJeux();
		$url = $this->steam_config->getUrlListeJeux($_user_id, $this->last_data);
		$this->last_data = json_decode(file_get_contents($url), true);
		foreach($this->last_data['response']['games'] as $game){
			$url = $this->steam_config->getUrlInfoJeu($game['appid']);
			$game_data = json_decode(file_get_contents($url), true);
			$game['image'] = $game_data[$game['appid']]['data']['header_image'];
			$game['nom'] = $game_data[$game['appid']]['data']['name'];
			$game['site_steam'] = "http://store.steampowered.com/app/".$game['appid'];
			$game['catégorie'] = $game_data[$game['appid']]['data']['categories'];
			$game['genres'] = $game_data[$game['appid']]['data']['genres'];

			$this->collection_jeux[$game['appid']] = new jeu($game);
		}
	}

	public function afficherTousLesJeuxEnCommun(){
		foreach($this->collection_jeux as $jeu){
			$jeu->afficheJeu();
		}
	}
}
