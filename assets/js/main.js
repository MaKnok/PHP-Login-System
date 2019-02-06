
$(document)
.on('submit', 'form.js-register', function(event){

	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']",_form).val(),
		password: $("input[type='password']",_form).val()
	};


	if(dataObj.email.length < 6){
		_error
			.text("Please enter a valid email address")
			.show(); 
		return false;
		}
		else if(dataObj.password.length < 11){
			_error
				.text("Please enter a password which is at least 11 characters long.")
				.show();
			return false;
		}
	
	//assuming the code gets this far, we can start the ajax process;
	_error.hide();
    
	$.ajax({
		type:'POST', //method to send data
		url: 'php-login-course/ajax/register.php', //address
		data: dataObj, //data object
		dataType: 'json', //data type
		async: true //asyncronous
	})
	.done(function ajaxDone(data){
		//whatever data is
		console.log(data);
		if(data.redirect !== undefined){
			window.location = data.redirect;
		}else if(data.error !== undefined){
			_error
				.text(data.error)
				.show();
		}
		
	})
	.fail(function ajaxFailed(e){
		//it failed
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data){
		//alwaysdothis
		console.log('Always');
	})

	return false;
	
})
.on('submit', 'form.js-login', function(event){

	event.preventDefault();

	var _form = $(this);
	var _error = $(".js-error", _form);

	var dataObj = {
		email: $("input[type='email']",_form).val(),
		password: $("input[type='password']",_form).val()
	};


	if(dataObj.email.length < 6){
		_error
			.text("Please enter a valid email address")
			.show(); 
		return false;
		}
		else if(dataObj.password.length < 11){
			_error
				.text("Please enter a password which is at least 11 characters long.")
				.show();
			return false;
		}
	
	//assuming the code gets this far, we can start the ajax process;
	_error.hide();
    
	$.ajax({
		type:'POST', //method to send data
		url: 'php-login-course/ajax/login.php', //address
		data: dataObj, //data object
		dataType: 'json', //data type
		async: true //asyncronous
	})
	.done(function ajaxDone(data){
		//whatever data is
		console.log(data);
		if(data.redirect !== undefined){
			window.location = data.redirect;
		}else if(data.error !== undefined){
			_error
				.html(data.error)
				.show();
		}
		
	})
	.fail(function ajaxFailed(e){
		//it failed
		console.log(e);
	})
	.always(function ajaxAlwaysDoThis(data){
		//alwaysdothis
		console.log('Always');
	})

	return false;
	
})