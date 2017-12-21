"use strict";
let game;

function startGame(){
	//Init
	game = new Phaser.Game(1024, 576, Phaser.AUTO, 'game');
	game.load = new Phaser.Loader();
	game.state.add("Fight", fight);
	//Start the game
	controller();
}

function controller(){
	game.state.start("Fight");
}

function getPlayerData(){
	$.ajax({
		url: "game/controllers/controller.php",
		type: "POST",
		data: {
			"cmd": "getPlayer"
		},
		dataType: "json"
	}).done(function(queryResult){
		//Player is formatted to JSON in PHP -> just copy the JS objects
		player = queryResult;
	});
}

function getEnemyData(){
	$.ajax({
		url: "game/controllers/controller.php",
		type: "POST",
		data: {
			"cmd": "getEnemy"
		},
		dataType: "json"
	}).done(function(queryResult){
		//Enemies are formatted to JSON in PHP -> just copy the JS objects
		enemy = queryResult;
	});
}

function getQuestion(){
	$.ajax({
		url: "game/controllers/controller.php",
		type: "POST",
		data: {
			"cmd": "getQuestion"
		},
		dataType: "json"
	}).done(function(queryResult){
		//Questions are formatted to JSON in PHP -> just copy the JS objects
		question = queryResult;
	});
}
