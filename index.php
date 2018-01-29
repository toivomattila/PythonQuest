<?php
session_start();
require_once('models/login.php');
require_once('models/logout.php');
require_once('models/signup.php');
require_once('views/view.php');

$viewId = 'default';
//Login
if(isset($_GET['login'])){
	if($_POST['username'] && $_POST['password']){
		$viewId = login($_POST['username'], $_POST['password']) ? 'game' : 'login_fail';
	}else{
		$viewId = 'login';
	}
//Signup
} else if(isset($_GET['signup'])){
	if($_POST['username'] && $_POST['password'] && $_POST['password_retype']){
		$viewId = signup($_POST['username'], $_POST['password'], $_POST['password_retype']) ? 'game' : 'signup_fail';
	}else{
		$viewId = 'signup';
	}
//Logout
} else if(isset($_GET['logout'])){
	logout();
	$viewId = 'login';
}
//The game
if(isset($_SESSION['username']) && $_SESSION['username'] != NULL){
	$viewId = 'game';
}

//views/view.php creates the webpage
renderView($viewId);
?>
