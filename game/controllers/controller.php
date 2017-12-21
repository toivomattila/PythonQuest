<?php
require_once('../models/model.php');
if(isset($_POST['cmd']) && $_POST['cmd'] != null){
	if($_POST['cmd'] == 'getPlayer'){
		echo getPlayer();
	}else if($_POST['cmd'] == 'getEnemy'){
		echo getEnemy();
	}else if($_POST['cmd'] == 'getQuestion'){
		echo getQuestion();
	}
}
