<?php
session_start();
function logout(){
	//Username is logged in when $_SESSION['username'] is set -> unset it
	unset($_SESSION['username']);
}
