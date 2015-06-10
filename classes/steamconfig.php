<?php
/**
 * Configuration de l'api steam
 */
class steamConfig {
	// TODO : parser Ini
	public static $instance = null;
	
	private $config_dir;
	
	private	$api_id;
	private $urls;
	private $helpers;
	
	private function __construct (){
		$this->config_dir = dirname(dirname($__FILE__)).'/config/';
		// parse INI
		$key = (object) parse_ini_file($this->config_dir.'key.ini', false, INI_SCANNER_RAW);
		$this->api_id = &$key->steam_api_key;
		
		$url = (object) parse_ini_file($this->config_dir.'url.ini', true, INI_SCANNER_RAW);
		$this->urls = &$url->url;
		$this->helpers = &$url->helpers;
	}

	public static function &getInstance(){
		if(!isset(self::$instance)) {
			self::$instance = new steamConfig();
		} else return self::$instance;
	}

	public function getUrlFriendsList($_playeur_id){
		//return $this->url.$this->url_friend_list.$this->key.$this->api_id.$this->id_steam.$_playeur_id.$this->suppl_url;
	}
	
	public function getUrlFriendInfo($_playeur_id){
		//return $this->url.$this->url_user_info.$this->key.$this->api_id.$this->list_id_steam.$_playeur_id;
	}

	public function getUrlListeJeux($_playeur_id, $_liste_jeux = null){
		//return $this->url.$this->url_jeux_liste.$this->key.$this->api_id.$this->id_steam.$_playeur_id.(isset($_liste_jeux)? $this->suppl_url_liste.$_liste_jeux: '');
	}

	public function getUrlInfoJeu($_game_id){
		//return $this->url_jeux_info.$_game_id;
	}
}
