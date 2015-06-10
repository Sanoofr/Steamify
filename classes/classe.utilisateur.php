<?php
/**
 * Classe de l'utilisateur
 */
class utilisateur {
	/**
	*	steamid = clé codé en 64 bits
	*/
	private $steamID = null;

	/**
	* 0 - Offline, 1 - Online, 2 - Busy, 3 - Away, 4 - Snooze, 5 - looking to trade, 6 - looking to play
	*/
	private $etat = null;

	/**
	* avatar auquel on peut rajouter medium ou full
	*/
	private $avatar = null;

	/**
	* Pseudo
	*/
	private $pseudo = null;

	/**
	* Constructeur permet l'initialisation d'un utilisateur
	*/
	public function __construct($_id, $_etat, $_avatar, $_pseudo){
		$this->steamID = $_id;
		$this->etat = $_etat;
		$this->avatar = $_avatar;
		$this->pseudo = $_pseudo;
	}

	public function afficheDetails(){
		
	}
}
