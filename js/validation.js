// Validate password and confirm password
function checkPass() {

	var pwd1 = document.getElementById('password');
	var pwd2 = document.getElementById('confirm_password');

	//Compare password and confirmation password value
		if(pwd1.value == pwd2.value) {
			confirm_password.style.backgroundColor = "white";
			message.style.color = "#00C";
			
			if(pwd1.value == "" && pwd2.value == "") {
				
				message.innerHTML = "";
				return true;
				
			} else {
				message.innerHTML = "Passwords match!";
				return true;
			}
	
		} else {
			confirm_password.style.backgroundColor = "red";
			message.style.color = "red";
			message.innerHTML = "Passwords do not match!";
			return false;
			
		}
}