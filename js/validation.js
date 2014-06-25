var $ = function(id) {
	return document.getElementById(id);
}

function checkPass() {
	var pwd1 = $("password");
	var pwd2 = $("confirm_password");
	var isNull = /^[\s'　']*$/;
	if(isNull.test(pwd1.value)) {
		message.innerHTML = "Invalid passwords.";
		return false;
	} else {
		//Compare password and confirmation password value
		if(pwd1.value == pwd2.value) {
			confirm_password.style.backgroundColor = "white";
			//message.style.color = "#00C";			
			if(pwd1.value == "" && pwd2.value == "") {				
				message.innerHTML = "";
				return true;				
			} else {
				message.innerHTML = "Passwords match.";
				return true;
			}	
		} else {
			confirm_password.style.backgroundColor = "#F90";
			//message.style.color = "red";
			message.innerHTML = "Passwords do not match.";
			return false;			
		}
	} 
}

function editNodeText(regex, input, helpId, helpMessage){  // See if the visitor entered the right information
			if (regex.test(input.value)){  // If the right information was entered, clear the help message			
				if (helpId != null){				
					while (helpId.firstChild)  // Remove any warnings that may exist
						helpId.removeChild(helpId.firstChild);
					input.style.backgroundColor = "white";
				}				
				return true;	
			}
			else {  // If the wrong information was entered, warn them
				if (helpId != null){				
					while (helpId.firstChild)  // Remove any warnings that may exist
						helpId.removeChild(helpId.firstChild);				
					helpId.appendChild(document.createTextNode(helpMessage));  // Add new warning
					input.style.backgroundColor = "#F90";	
				}
				return false;		
			}      
		}

// inputField – ID Number for the html text box
// helpId – ID Number for the child node I want to print a warning in
// inputField.value – Value typed in the html text box

function isNameOk() { 
	var inputField = $("username");
	var helpId = $("message");       	
	// If not empty, validate the inputed value
	if(inputField.value != ""){
		var regExp = /^[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}/;
		var msg = "Please enter a valid username.";
		
		return editNodeText(regExp, inputField, helpId, msg);
	}
	else{
		if (helpId != null){			
			while (helpId.firstChild)  // Remove any warnings that may exist
				helpId.removeChild(helpId.firstChild);
			inputField.style.backgroundColor = "white";				
		}				
		return true;
	}
}             	

function isPhoneOk() {
	var inputField = $("userphone");
	var helpId = $("message");      	
	// If not empty, validate the inputed value
	if(inputField.value != ""){
		var regExp = /^[0-9]{10}$/;
		var msg = "Please enter a valid phone number (Ex.6178060055).";
		
		return editNodeText(regExp, inputField, helpId, msg);
	}
	else{
		if (helpId != null){			
			while (helpId.firstChild)  // Remove any warnings that may exist
				helpId.removeChild(helpId.firstChild);
			inputField.style.backgroundColor = "white";		
		}
		return true;
	}
}  

function checkEditName() {
	var isNull = /^[\s'　']*$/;
	if(isNull.test($("edit_name").value)) {
		message.innerHTML = "Please enter a username.";
		return false;
	} else {
		var inputField = $("edit_name");
		var helpId = $("message");       	
		var regExp = /^[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}/;
		var msg = "Please enter a valid username.";
			
		return editNodeText(regExp, inputField, helpId, msg);
	} 
}

function checkEditPhone() {
	var isNull = /^[\s'　']*$/;
	if(isNull.test($("edit_phone").value)) {
		message.innerHTML = "Please enter a phone number (Ex.6178060055).";
		return false;
	} else {
		var inputField = $("edit_phone");
		var helpId = $("message");       	
		var regExp = /^[0-9]{10}$/;
		var msg = "Please enter a valid phone number (Ex.6178060055).";
			
		return editNodeText(regExp, inputField, helpId, msg);
	} 
}

function checkEditPass() {
	var pwd1 = $("edit_password");
	var pwd2 = $("edit_confirm_password");
	if(pwd1.value !="" || pwd2.value !=""){
		var isNull = /^[\s'　']*$/;
		if(isNull.test(pwd1.value)) {
			message.innerHTML = "Invalid passwords.";
			return false;
		} else {
			//Compare password and confirmation password value
			if(pwd1.value == pwd2.value) {
				edit_confirm_password.style.backgroundColor = "white";		
				if(pwd1.value == "" && pwd2.value == "") {				
					message.innerHTML = "";
					return true;				
				} else {
					message.innerHTML = "Passwords match.";
					return true;
				}	
			} else {
				edit_confirm_password.style.backgroundColor = "#F90";
				message.innerHTML = "Passwords do not match.";
				return false;			
			}
		} 
	}
	edit_confirm_password.style.backgroundColor = "white";
}

function isRecNameOk() { 
	var inputField = $("rec_name");
	var helpId = $("message");       	
	var regExp = /^[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}/;
	var msg = "Please enter a valid recipient name.";
		
	return editNodeText(regExp, inputField, helpId, msg);
}   

function isRecPhoneOk() {
	var inputField = $("rec_phone");
	var helpId = $("message");      	
	var regExp = /^[0-9]{10}$/;
	var msg = "Please enter a valid phone number (Ex.6178060055).";
	
	return editNodeText(regExp, inputField, helpId, msg);
}  

function isAddressOneOk() {
	var inputField = $("address_line1");
	var helpId = $("message");      	
	var regExp = /^[A-Za-z0-9\.\' \-]{5,30}$/;
	var msg = "Please enter a valid address (Ex.22 Harvard St).";
	
	return editNodeText(regExp, inputField, helpId, msg);
}  	
	
function isAddressTwoOk() {
	var inputField = $("address_line2");
	var helpId = $("message"); 
	// If not empty, validate the inputed value
	if(inputField.value != ""){
		var regExp = /^[A-Za-z0-9\.\' \-]{5,30}$/;
		var msg = "Please enter a valid address (Ex.22 Harvard St).";
		
		return editNodeText(regExp, inputField, helpId, msg);
	}
	else{
		if (helpId != null){			
			while (helpId.firstChild)  // Remove any warnings that may exist
				helpId.removeChild(helpId.firstChild);
			inputField.style.backgroundColor = "white";				
		}				
		return true;
	}
}  

function isCityOk() {
	var inputField = $("city");
	var helpId = $("message");      	
	var regExp = /^[A-Za-z0-9\.\' \-]{2,30}$/;
	var msg = "Please enter a valid city name (Ex.Boston).";
	
	return editNodeText(regExp, inputField, helpId, msg);
}  	

function isStateOk() {
	var inputField = $("state");
	var helpId = $("message");      	
	var regExp = /^[A-Za-z0-9\.\' \-]{2,30}$/;
	var msg = "Please enter a valid state name (Ex.MA).";
	
	return editNodeText(regExp, inputField, helpId, msg);
}  	

function isZipOk() {
	var inputField = $("zip");
	var helpId = $("message");      	
	var regExp = /^[0-9]{5}$/;
	var msg = "Please enter a valid zip code number (Ex.20379).";
	
	return editNodeText(regExp, inputField, helpId, msg);
}  

function isNameOnCardOk() { 
	var inputField = $("name_on_card");
	var helpId = $("message");       	
	var regExp = /^[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}\s?[A-Za-z\.\' \-]{2,15}/;
	var msg = "Please enter a valid name on card.";
		
	return editNodeText(regExp, inputField, helpId, msg);
}   

function isCardNumOk() {
	var inputField = $("card_number");
	var helpId = $("message");      	
	var regExp = /^[0-9]{16}$/;
	var msg = "Please enter a valid card number.";
	
	return editNodeText(regExp, inputField, helpId, msg);
}  

/* Validation of form submission */

function checkSignUpForm() {	
	if(checkPass() && isNameOk() && isPhoneOk())
		return true;		 
	return false;	
}

function checkAddressForm() {
	var isNull = /^[\s'　']*$/;
	var rec_name = $("rec_name").value;
	var address_line1 = $("address_line1").value;
	var city = $("city").value;
	var state = $("state").value;
	
	if(isNull.test(rec_name) || isNull.test(address_line1) || isNull.test(city) || isNull.test(state)) {
		message.innerHTML = "Please input the required value.";
		return false;
	} else {
		if(isRecNameOk() && isRecPhoneOk() && isAddressOneOk() && isAddressTwoOk() && isCityOk() && isStateOk() && isZipOk())
			return true;
	}
	return false; 
}

function checkPaymentForm() {
	var month = $("month").value;
	var year = $("year").value;		
	var myDate = new Date();
	var currentMonth = myDate.getMonth()+1; 
	var currentYear = myDate.getFullYear(); 
	var isNull = /^[\s'　']*$/;
	// Validate
	if(isNull.test($("name_on_card").value)) {
		message.innerHTML = "Name on card is empty, please enter a valid name.";
		return false;
	}
	if(!isNameOnCardOk()) return false;
	if(!isCardNumOk()) return false;
	if(currentYear > year) {
		message.innerHTML = "Invalid expiration date.";
		return false;
	} 
	if(currentYear == year) {
		if(currentMonth > month) {
			message.innerHTML = "Invalid expiration date.";
			return false;
		}
	} 
	return true;
}