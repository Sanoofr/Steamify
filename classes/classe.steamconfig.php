<?php
/**
 * Configuration de l'api steam
 */
class steamconfig {
	// TODO : parser Ini
	private	$api_id;

	public function __construct ($_api_id){
		$this->api_id = $_api_id;
	}

	public function getUrlFriendsList($_playeur_id){
		return $this->url.$this->url_friend_list.$this->key.$this->api_id.$this->id_steam.$_playeur_id.$this->suppl_url;
	}
	
	public function getUrlFriendInfo($_playeur_id){
		return $this->url.$this->url_user_info.$this->key.$this->api_id.$this->list_id_steam.$_playeur_id;
	}

	public function getUrlListeJeux($_playeur_id, $_liste_jeux = null){
		return $this->url.$this->url_jeux_liste.$this->key.$this->api_id.$this->id_steam.$_playeur_id.(isset($_liste_jeux)? $this->suppl_url_liste.$_liste_jeux: '');
	}

	public function getUrlInfoJeu($_game_id){
		return $this->url_jeux_info.$_game_id;
	}
}
