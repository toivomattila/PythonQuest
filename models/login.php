<?php
session_start();
function login($username, $password){
	if(isset($username) && $username != NULL && isset($password) && $password != NULL){
		$db = new PDO('mysql:host=localhost;dbname=PythonQuest;charset=utf8', 'PythonQuest', 'J2CovjA4HyzHGaHd');
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
