"use strict";

let fight = function(game){};
//Drawables
let buttons, answerTexts, questionText, playerFight, enemyFight, playerHealth, enemyHealth;

fight.prototype = {
	preload: function(){
		//Load assets
		game.load.image('button', 'game/assets/button.png');
		game.load.image('playerFight', 'game/assets/playerFight.png');
		game.load.image('enemyFight', 'game/assets/enemyFight.png');
	},
	create: function(){
		game.stage.backgroundColor = "#0000FF";
		buttons = [];
		answerTexts = [];

		playerFight = game.add.sprite(0, 32, 'playerFight');
		enemyFight = game.add.sprite(game.world.width - 300, 32, 'enemyFight');
		playerHealth = game.add.text(50, 16, "", {fontsize: '32px', fill: '#000000' });
		enemyHealth = game.add.text(game.world.width-200, 16, "", {fontsize: '32px', fill: '#000000' });

		questionText = game.add.text(game.world.centerX, 16, "", {fontsize: '32px', fill: '#000000' });
		for(let i = 0; i < 3; i++){
			buttons.push(game.add.button(game.world.centerX, (i+1)*100, 'button', updateFight));
			answerTexts.push(game.add.text(game.world.centerX, (i+1)*100, '', {fontsize: '32px', fill: '#000000' }));
		}
		updateFight("");
	},
	update: function(){
	}
}

function displayPlayerHealth(health){
	playerHealth.text = "Health: " + health;
}

function displayEnemyHealth(health){
	enemyHealth.text = "Health: " + health;
}

function setQuestion(currentQuestion){
	//Update question
	questionText.text = currentQuestion.question;
	//Update answer buttons
	for(let i = 0; i < 3; i++){
		buttons[i].variable = currentQuestion.options[i];
		answerTexts[i].text = currentQuestion.options[i];
	}
}
