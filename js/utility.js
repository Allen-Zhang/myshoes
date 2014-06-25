/* For editing quantity on cart page */
function redirect(pid,size,i){
	var str;
	str = "controller/CartsController.php?pid=" + pid;
	str += "&size=" + size;
	str += "&qty=";
	str += document.getElementById("count"+i).value;
	str += "&action=cart_update";
	window.location = str;
}

// Validate wheter product in stock is enough
function checkQty() {
    var qty = document.getElementById('qty');
    var amount = document.getElementById('pro_amount').value;
    //Compare quantity and amount value
    if(qty.value > 0 && qty.value < amount) {
        qty.style.backgroundColor = "white";
        message.style.color = "#00C"; 
        message.innerHTML = "";
        return true;
    } else {
        qty.style.backgroundColor = "#F90";
        message.style.color = "red";
        message.innerHTML = "Sorry, please enter a valid quantity.";
        return false;
    }
}

/* For change hyperlink's color */
function changeColor(x) {
	var id = "title" + x;
	document.getElementById(id).style.color = "#F60";
	return true;
}

function changeAgain(x){
	var id = "title" + x;
	document.getElementById(id).style.color = "#00C";
	return true;
}

function checkCartQty(id, oldValue) {
    var qty = document.getElementById(id);
    if(qty.value > 0) {
        qty.style.backgroundColor = "white";
        return true;
    } else {
        qty.style.backgroundColor = "#F90";
        alert("Sorry, please enter a valid quantity.");
        qty.value = oldValue;
        qty.style.backgroundColor = "white";
        return false;
    }
}

function comfirmDelCart() {
    return confirm("Do you want to delete this item?");
}

function comfirmDelAddress() {
    return confirm("Do you want to delete this address?");
}