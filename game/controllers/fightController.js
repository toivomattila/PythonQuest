"use strict";

function updateFight(answerButton){
	checkAnswer(answerButton);
	updatePlayerHealth();
	updateEnemyHealth();
	updateQuestion();
}

function checkAnswer(answerButton){
	//answerButton.variable contains the the answer
	//The controller doesn't handle checkAnswer yet
	if(answerButton.variable){
		//Doesn't need a callback since other functions handle updating the data for the view
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
		//displayPlayerHealth is in views/fight.js & updates the health on screen
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
		//displayEnemyHealth is in views/fight.js & updates the health on screen
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
		//setQuestions() is in views/fight.js & updates the current question
		setQuestion(queryResult);
	});
}
