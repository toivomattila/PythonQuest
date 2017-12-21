<?php
function login($username, $password){
	require_once("models/utils.php");
	if(isset($username) && $username != NULL && isset($password) && $password != NULL){
		$stmt = $db->prepare("SELECT pwhash FROM Users WHERE username=:username");
		$stmt->execute(array(":username" => $username));
		$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
		if(password_verify($password, $rows[0]['pwhash'])){
			//Login successful
			$_SESSION['username'] = $username;
			return True;
		}
	}
	//Log in failed for some reason
	return False;
}
