<?php
session_start();
function logout(){
	unset($_SESSION['username']);
}
