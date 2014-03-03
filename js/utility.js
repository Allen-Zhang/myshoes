
/* For editing quantity on cart page */
function redirect(pid,size,i){
	var str;
	str="biz/cart_edit.php?pid="+pid;
	str+="&size="+size;
	str+="&qty=";
	str+=document.getElementById("count"+i).value;
	window.location=str;
}

