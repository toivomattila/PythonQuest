<?php

function getPlayer(){
	//memcached, db
	require_once("../../models/utils.php");
	//check if users data is in cache
	$parsed_player = $mem->get($_SESSION['username']);
	if(!$parsed_player){
		//if not, get it from db
		//this is a placeholder for now since didn't have time to implement before deadline
		//actually getting data from db & transforming it to JSON
		$parsed_player = '{"health": "10"}';
		//update the cache
		$mem->set($_SESSION['username'], $parsed_player, 0);
	}
	return $parsed_player;
}

function getEnemy(){
	//memcached, db
	require_once("../../models/utils.php");
	//check if enemy data is in cache
	$parsed_enemy= $mem->get("enemy");
	if(!$parsed_enemy){
		//if not, get it from db
		//this is a placeholder for now since didn't have time to implement before deadline
		//actually getting data from db & transforming it to JSON
		$parsed_enemy= '{"health": "3"}';
		//update the cache
		$mem->set("enemy", $parsed_enemy, 0);
	}
	return $parsed_enemy;
}

function getQuestion(){
	//placeholder since there are no actual questions at the moment
	return '{"question": "print(lorem)", "options": ["lorem", "ipsum", "dolor"]}';
}
