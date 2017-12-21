"use strict";

function updateFight(answerButton){
	checkAnswer(answerButton);
	updatePlayerHealth();
	updateEnemyHealth();
	updateQuestion();
}

function checkAnswer(answerButton){
	if(answerButton.variable){
		$.ajax({
			url: "game/controllers/controller.php",
			type: "POST",
			data: {
				"cmd": "checkAnswer",
				"answer": answerButton.variable
			},
			dataType: "json"
		});
	}
}

function updatePlayerHealth(){
	$.ajax({
		url: "game/controllers/controller.php",
		type: "POST",
		data: {
			"cmd": "getPlayer"
		},
		dataType: "json"
	}).done(function(queryResult){
		//Player is formatted to JSON in PHP
		displayPlayerHealth(queryResult.health);
	});
}
function updateEnemyHealth(){
	$.ajax({
		url: "game/controllers/controller.php",
		type: "POST",
		data: {
			"cmd": "getEnemy"
		},
		dataType: "json"
	}).done(function(queryResult){
		//Enemies are formatted to JSON in PHP
		displayEnemyHealth(queryResult.health);
	});
}
function updateQuestion(){
	$.ajax({
		url: "game/controllers/controller.php",
		type: "POST",
		data: {
			"cmd": "getQuestion"
		},
		dataType: "json"
	}).done(function(queryResult){
		//Questions are formatted to JSON in PHP
		setQuestion(queryResult);
	});
}
