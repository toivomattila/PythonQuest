"use strict";
$(document).ready(function(){
	$(".password").animate({height: 'hide'});
	$(".password_retype").animate({height: 'hide'});

	$('input[name="password"]').keyup(function(){
		if($('input[name="password"]').val() === ""){
			$(".password").animate({height: 'hide'});
			return;
		}
		let pwdCheckResult = checkPassword($('input[name="password"]').val());
		if(pwdCheckResult === true){
			$(".password").text("Password is okay");
			$(".password").animate({height: 'hide'}, 'slow');
		}else{
			$(".password").text(pwdCheckResult);
			$(".password").animate({height: 'show'});
		}
		checkPasswordMatch($('input[name="password_retype"]').val());

	});
	$('input[name="password_retype"]').keyup(function(){
		checkPasswordMatch($('input[name="password_retype"]').val());
	});
});

function checkPassword(psw){
	if(psw.length < 8){
		return "Password must at least 8 characters";
	}else if(!(/[a-z]/.test(psw))){
		return "Password must contain at least 1 lowercase character";
	}else if(!(/[A-Z]/.test(psw))){
		return "Password must contain at least 1 uppercase character";
	}else if(!(/[0-9]/.test(psw))){
		return "Password must contain at least 1 number";
	}else if((/^[a-zA-Z0-9- ]*$/.test(psw))){
		return "Password must contain at least 1 special character";
	}else if(psw == $('input[name="username"]').val()){
		return "Password must not be your username";
	}
	return true;
}

function checkPasswordMatch(psw){
	if($('input[name="password_retype"]').val() === ""){
		$(".password_retype").animate({height: 'hide'});
		return;
	}
	//Check passwords match
	if($('input[name="password_retype"]').val() === $('input[name="password"]').val()){
		$(".password_retype").text("Passwords match");
		$(".password_retype").animate({height: 'hide'}, 'slow');
	}else{
		$(".password_retype").text("Passwords don't match");
		$(".password_retype").animate({height: 'show'});
	}
}
