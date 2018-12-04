function validateName() {
	var name = document.getElementById('registerfname');
	// alert(name.value); // to see the value inserted under name
	// alert(name.value.length); // To see the length of the character inserted under name
	if (name.value.length == 0) {
		alert("Enter your name");
		return false;
	}
	// else {alert("name is saved")
	return validateSurname();
} 

//surname
function validateSurname() {
	var surname = document.getElementById('registerlname');
	// alert(name.value); // to see the value inserted under name
	// alert(name.value.length); // To see the length of the character inserted under name
	if (surname.value.length == 0) {
		alert("Enter your surname");
		return false;
	}
	else {
		//alert("surname is saved")
		return validateEmail();
	}
}

//email
function validateEmail() {
	var email = document.getElementById('registerEmail').value;
	var atpos = email.indexOf("@");
	var dotpos = email.lastIndexOf(".");
	if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 >= email.length) {
		alert("You have entered a non-valid e-mail address");
		return false;
	}
	else {
		//alert("Email is saved")
		return validateNum();
	}
}

//number
function validateNum() {
	var tel = document.getElementById('RegisterNumber');
	// alert(name.value); // to see the value inserted under name
	// alert(name.value.length); // To see the length of the character inserted under name
	if (tel.value.length =<10) {
		alert("Enter you phone number");
		return false;
	}
	else {
	//	alert("number is saved")
		return validateSDob();
	}
}

/*function validateDob() {
	var dob = document.getElementById('dob');
	// alert(name.value); // to see the value inserted under name
	// alert(name.value.length); // To see the length of the character inserted under name
	if (dob.value.length == 0) {
		alert("Enter your date of birt");
		return false;
	}
else {alert("number is saved")
//return validateSurname();
}
	
	
	
	
	
	*/
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	