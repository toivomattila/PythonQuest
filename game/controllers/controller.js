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

//controller() would get called more if there were other states to start
function controller(){
	game.state.start("Fight");
}
