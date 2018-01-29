<?php
session_start();
require_once("../../models/utils.php");
class FightModel {
	//Variables
	//$currentQuestion;
	private $mem;
	private static $instance = null;

	//Functions
	public static function Instance(){
		if (!isset(self::$instance)){
			self::$instance = new FightModel();
		}
		return self::$instance;
	}

	private function __construct(){
		$this->mem = UtilsModel::Instance()->getMemcached();
	}
	
	public function getPlayer(){
		//check if users data is in cache
		$parsed_player = $this->mem->get($_SESSION['username']);
		if(!$parsed_player){
			//if not, get it from db
			//this is a placeholder for now since didn't have time to implement before deadline
			//actually getting data from db & transforming it to JSON
			$parsed_player = '{"health": "10"}';
			//update the cache
			$this->mem->set($_SESSION['username'], $parsed_player, 0);
		}
		return $parsed_player;
	}

	public function getEnemy(){
		//check if enemy data is in cache
		$parsed_enemy= $this->mem->get("enemy");
		if(!$parsed_enemy){
			//if not, get it from db
			//this is a placeholder for now since didn't have time to implement before deadline
			//actually getting data from db & transforming it to JSON
			$parsed_enemy= '{"health": "3"}';
			//update the cache
			$this->mem->set("enemy", $parsed_enemy, 0);
		}
		return $parsed_enemy;
	}

	public function getQuestion(){
		//placeholder since there are no actual questions at the moment
		return '{"question": "print(lorem)", "options": ["lorem", "ipsum", "dolor"]}';
	}
}
