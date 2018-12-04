function validate() {
	var name = document.getElementById('name');
	if (name.value.length == 0) {
		alert("Enter your name");
		return false;
	}
	return validateSurname();
}

function validateSurname() {
	var surname = document.getElementById('surname');
	if (surname.value.length == 0) {
		alert("Enter your surname");
		return false;
	}
	else {
		return validateEmail();
	}
}

function validateEmail() {
	var email = document.getElementById('email').value;
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		alert("You have entered a non-valid e-mail address");
		return false;
	}
	else {
		return validateNum();
	}
}

function validateNum() {
	var tel = document.getElementById('tel');
	if (tel.value.length == 0) {
		alert("Enter you phone number");
		return false;
	}
	else {
		return validateSDob();
	}
}

function validateDob() {
	var dob = document.getElementById('dob');
	if (dob.value.length == 0) {
		alert("Enter your date of birt");
		return false;
	}
	else {
		alert("number is saved")
	}
}