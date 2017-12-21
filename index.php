<?php
session_start();
require_once('models/login.php');
require_once('models/logout.php');
require_once('models/signup.php');
require_once('views/view.php');

function viewController(){
	if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
		return 'views/game.html';
	}else if(isset($_GET['signup'])){
		return 'signup.html';
	}else{
		return 'login.html';
	}
}
	

//Login
if(isset($_GET['login'])){
	login($_POST['username'], $_POST['password']);
}
//Signup
else if(isset($_GET['signup'])){
	signup($_POST['username'], $_POST['password'], $_POST['password_retype']);
//Logout
}else if(isset($_GET['logout'])){
	logout();
}

renderView();
