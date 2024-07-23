function ValidateEmail(inputEmail){
	var mailformat=/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(inputEmail.value.match(mailformat)){
		document.form1.Email.focus();
		return true;
	}
	else{
		alert("please enter valid email address");
		document.form1.Email.focus();
		return false;
		
	}
}