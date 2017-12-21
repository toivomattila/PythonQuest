<?php

function checkPassword($username, $password, $password_retype){
	//Checks that password is valid
	if($password == NULL){
		return False;
	}else if(!preg_match('/[a-z]/', $password)){
		return False;
	}else if(!preg_match('/[A-Z]/', $password)){
		return False;
	}else if(!preg_match('/\d/', $password)){
		return False;
	}else if(preg_match('/^[a-zA-Z0-9- ]*$/', $password)){
		return False;
	}else if($password_retype == NULL){
		return False;
	}else if(strlen($password) < 8){
		return False;
	}else if(strlen($password) > 255){
		return False;
	}else if($password != $password_retype){
		return False;
	}else if($password == $username){
		return False;
	}
	//Password is okay
	return True;
}


function checkUsername($username){
	require("utils.php");
	$stmt = $db->prepare("SELECT username FROM Users WHERE username=:username");
	$stmt->execute(array(":username" => $_POST['username']));
	$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
	if($username == NULL){
		return False;
	}else if($rows[0]['username'] == $username){
		return False;
	}
	return True;
}

function signUpUser($username, $password){
	require("utils.php");

	//Add user to the login-database
	$stmt = $db->prepare("INSERT INTO Users(username, pwhash) VALUES(:username, :pwhash)");
	$stmt->execute(array(':username' => $username, ':pwhash' => password_hash($password, PASSWORD_BCRYPT)));

	//Add user to the Players-database with default values
	$stmt = $db->prepare("INSERT INTO Players(name, maxHealth, level, x, y) VALUES(:name, 10, 0, 30, 600)");
	$stmt->execute(array(':name' => $username));

	//Add  
	$_SESSION['username'] = $username;

	return True;
}
function signup($username, $password, $password_retype){
	if(isset($username)){
		if(checkUsername($username) && checkPassword($username, $password, $password_retype)){
			if(signUpUser($username, $password)){
				//Signup succeeded
				return True;
			}
		}
	}
	//Signup failed for some reason
	return False;
}
