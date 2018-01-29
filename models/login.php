<?php
require_once("models/utils.php");
function login($username, $password){
	//Don't bother connecting to database if either username or password is NULL
	if(isset($username) && $username != NULL && isset($password) && $password != NULL){
		//Get usernames password hash
		$stmt = UtilsModel::Instance()->getDB()->prepare("SELECT pwhash FROM Users WHERE username=:username");
		$stmt->execute(array(":username" => $username));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		//Fails if passwords don't match or username didn't match with anything in the database
		//password_verify() is PHP-function
		//passwords are hashed with password_hash()
		if(password_verify($password, $rows[0]['pwhash'])){
			//Login successful
			$_SESSION['username'] = $username;
			return True;
		}
	}
	//Log in failed for some reason
	return False;
}
