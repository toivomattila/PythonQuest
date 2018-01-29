<?php
//Controller (index.php) calls renderView() -> doesn't need to be included
function renderView($viewId){
	$views = [
		'default' => 'login.html',
		'game' => 'game.html',
		'login' => 'login.html',
		'login_fail' => 'login_fail.html',
		'signup' => 'signup.html',
	];
	include 'header.html';
	//include viewController();
	include $views[$viewId];
	//include 'views/game.html';
	include 'footer.html';
}
