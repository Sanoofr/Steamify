<?php
/**
 * Configuration de l'api steam
 */
class steamconfig {
	// TODO a remplacer par les valeurs des INIs de configuration
	private $url = 'http://api.steampowered.com/';
	private $url_friend_list = 'ISteamUser/GetFriendList/v0001/';
	private $suppl_url = '&relationship=friend';
	private $url_user_info = 'ISteamUser/GetPlayerSummaries/v0002/';
	private $url_jeux_liste = 'IPlayerService/GetOwnedGames/v0001/';
	private $suppl_url_liste = '&appids_filter={appids_filter:';
	private $url_jeux_info = 'http://store.steampowered.com/api/appdetails/?cc=EE&l=french&v=1&appids=';
	private $key = '?key=';
	private $id_steam = '&steamid=';
	private $list_id_steam = '&steamids=';
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
