<?php
session_start();
function logout(){
	//Username is logged in when $_SESSION['username'] is set -> unset it
	//session_destroy() didn't work
	unset($_SESSION['username']);
}
