<?php

function checkPassword($username, $password, $password_retype){
	//Checks that password is valid
	if($password == NULL){
		error_log("null");
		return False;
	}else if(!preg_match('/[a-z]/', $password)){
		error_log("a-z");
		return False;
	}else if(!preg_match('/[A-Z]/', $password)){
		error_log("A-Z");
		return False;
	}else if(!preg_match('/\d/', $password)){
		error_log("\d");
		return False;
	}else if(preg_match('/^[a-zA-Z0-9- ]*$/', $password)){
		error_log("special character");
		return False;
	}else if($password_retype == NULL){
		error_log("retype null");
		return False;
	}else if(strlen($password) < 8){
		error_log("too short");
		return False;
	}else if(strlen($password) > 255){
		error_log("too long");
		return False;
	}else if($password != $password_retype){
		error_log("don't match");
		return False;
	}else if($password == $username){
		error_log("username");
		return False;
	}
	//Password is okay
	return True;
}


function checkUsername($username){
	$db = new PDO('mysql:host=localhost;dbname=PythonQuest;charset=utf8', 'PythonQuest', 'J2CovjA4HyzHGaHd');
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
	$db = new PDO('mysql:host=localhost;dbname=PythonQuest;charset=utf8', 'PythonQuest', 'J2CovjA4HyzHGaHd');

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
		error_log("username not null");
		if(checkUsername($username) && checkPassword($username, $password, $password_retype)){
			error_log("username & password ok");
			if(signUpUser($username, $password)){
				error_log("signup succeded");
				//Signup succeeded
				return True;
			}
		}
	}
	//Signup failed for some reason
	return False;
}
