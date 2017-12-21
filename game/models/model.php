<?php

function getPlayer(){
	//mem, db
	require_once("utils.php");
	$parsed_player = $mem->get($_SESSION['username']);
	if(!$parsed_player){
		$parsed_player = '{"health": "10"}';
		$mem->set($_SESSION['username'], $parsed_player, 0);
	}
	return $parsed_player;
}

function getEnemy(){
	//mem, db
	require_once("utils.php");
	$parsed_enemy= $mem->get("enemy");
	if(!$parsed_enemy){
		$parsed_enemy= '{"health": "3"}';
		$mem->set("enemy", $parsed_enemy, 0);
	}
	return $parsed_enemy;
}

function getQuestion(){
	return '{"question": "lorem", "options": ["lorem", "ipsum", "dolor"]}';
}
