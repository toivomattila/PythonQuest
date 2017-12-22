"use strict";

let fight = function(game){};
//Declare variables
let buttons, answerTexts, questionText, playerFight, enemyFight, playerHealth, enemyHealth;

fight.prototype = {
	preload: function(){
		//Load assets
		game.load.image('button', 'game/assets/button.png');
		game.load.image('playerFight', 'game/assets/playerFight.png');
		game.load.image('enemyFight', 'game/assets/enemyFight.png');
	},
	create: function(){
		//Background needs to be any color other than red or black
		game.stage.backgroundColor = "#0000FF";
		//Initialize
		buttons = [];
		answerTexts = [];

		//Initialize player
		playerFight = game.add.sprite(0, 32, 'playerFight');
		playerHealth = game.add.text(50, 16, "", {fontsize: '32px', fill: '#000000' });
		//Initialize enemy
		enemyFight = game.add.sprite(game.world.width - 300, 32, 'enemyFight');
		enemyHealth = game.add.text(game.world.width-200, 16, "", {fontsize: '32px', fill: '#000000' });

		//Initialize question & answer buttons & text
		questionText = game.add.text(game.world.centerX, 16, "", {fontsize: '32px', fill: '#000000' });
		for(let i = 0; i < 3; i++){
			//updateFight is a callback function if any button is pressed
			buttons.push(game.add.button(game.world.centerX, (i+1)*100, 'button', updateFight));
			answerTexts.push(game.add.text(game.world.centerX, (i+1)*100, '', {fontsize: '32px', fill: '#000000' }));
		}
		//updateFight in controllers/fightController.js takes care of getting proper values for player, enemy & question
		updateFight("");
	},
	update: function(){
	}
}

function displayPlayerHealth(health){
	//Update player health
	playerHealth.text = "Health: " + health;
}

function displayEnemyHealth(health){
	//Update enemy health
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
