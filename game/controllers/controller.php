<?php
//Handles POSTs, asks model.php for data and passes it back to POSTer
require_once('../models/model.php');
/*$functions = array(
	'getPlayer' => 'getPlayer',
	'getEnemy' => 'getEnemy',
	'getQuestion' => 'getQuestion'
);*/

if($_POST['cmd'] == 'getPlayer'){
	echo FightModel::Instance()->getPlayer();
}else if($_POST['cmd'] == 'getEnemy'){
	echo FightModel::Instance()->getEnemy();
}else if($_POST['cmd'] == 'getQuestion'){
	echo FightModel::Instance()->getQuestion();
}
