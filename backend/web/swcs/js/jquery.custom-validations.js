/**
* Jquery custom  validation 
*@author: Hemant Thakur
*
*/
var Inputerror=false;
$(function(){
	$('.address_field_with_space').on('blur',function()
	{
		var inputString = $(this).val();
		re = /[`~!@$%^*()|+=?;:'"<>{}[]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[`~!@$%^*()|+=?;:'"<>[]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Alphanumeric with Space,_,-,comma only please.");
		}
	});
	/*name with space*/
	$('.name_with_space').on('blur',function()
	{
		var inputString = $(this).val();
		re = /[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[0-9`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Alphabets with space only");
		}
	});
	/*alphanumeri*/
	$('.alphanumeric_name_with_space').on('blur',function()
	{
		var inputString = $(this).val();
		re = /[`~!@#$%^*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[`~!@#$%^*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Alphanumeric with space only");
			
		}
	});
	/*numbers only*/
	$('.numbers_only').on('blur',function()
	{
		var inputString = $(this).val();
		re = /[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Numbers only");
		}
	});
	/*numbers only*/
	$('.alphanumeric').on('blur',function()
	{
		var inputString = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Alphabets & Numbers only");
		}
	});
	$('.alphanumeric_name_without_space').on('blur',function()
	{
		var inputString = $(this).val();
		re = /[`~!@#$%^&*()_|+\-=?;:'", .<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[`~!@#$%^&*()_|+\-=?;:'", .<>\{\}\[\]\\\/]/gi,'');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Alphabets & Numbers without any space ");
		}
	});
	/*mobile number*/
	$('.mobile_number').on('blur',function()
	{
		var inputString = $(this).val();
		var max=10;
		re = /[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Valid 10 digit mobile number.");
			
		}
		if(inputString.length>max){
			 $(this).val($(this).val().substr(0, max));
			 callAlerts("Error","Please, Enter Valid 10 digit mobile number.");
			
		}
	});
	/*six digit*/
	$('.six_digit_zip_code').on('blur',function()
	{
		var inputString = $(this).val();
		var max=6;
		re = /[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			callAlerts("Error","Please, Enter Valid postal code.");
			
		}
		if(inputString.length>max){
			callAlerts("Error","Please, Enter Valid postal code.");
			 
		}
	});
/*telephone numbers*/

	$('.telephone_numbers').on('blur',function()
	{
		var inputString = $(this).val();
		var max=12;
		re = /[a-zA-Z`~!@#$%^&*()_|+=?;:'",.<>\{\}\[\]\\\/]/gi;;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[a-zA-Z`~!@#$%^&*()_|+=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			callAlerts("Error","Please, Enter Valid Telephone Number");
			
			$(this).val(no_spl_char);
		}
		if(inputString.length>max){
			 $(this).val($(this).val().substr(0, max));
			 callAlerts("Error","Please, Enter Valid Telephone Number");
			 
		}
	});
	$('.email').on('blur',function()
	{
		var inputString = $(this).val();
		var re = /^((([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+(\.([a-z]|\d|[!#\$%&'\*\+\-\/=\?\^_`{\|}~]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])+)*)|((\x22)((((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(([\x01-\x08\x0b\x0c\x0e-\x1f\x7f]|\x21|[\x23-\x5b]|[\x5d-\x7e]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(\\([\x01-\x09\x0b\x0c\x0d-\x7f]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))))*(((\x20|\x09)*(\x0d\x0a))?(\x20|\x09)+)?(\x22)))@((([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|\d|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.)*(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])|(([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])([a-z]|\d|-|\.|_|~|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])*([a-z]|[\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])))\.?$/i;
		var emailCheck=re.test(inputString);
		if(emailCheck===false){
			callAlerts("Error","Please, Enter Valid Email Address");
			Inputerror=true;
		}
		else{
		   $('.alert').fadeOut(200);
			Inputerror=false;
		}
	});
	
	/*decimal number*/
	$('.decimal').on('blur',function()
	{
		var inputString = $(this).val();
		var max=9;
		if(inputString.length>max){
			 $(this).val($(this).val().substr(0, max));
			 callAlerts("Error","Please, Enter Valid decimal numbers");
			 
		}
		re = /[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[a-zA-Z`~!@#$%^&*()_|+\-=?;:'",<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			callAlerts("Error","Please, Enter Valid decimal numbers");
			
		}
		var re = /^[+]?([0-9]+(?:[\.][0-9]*)?|\.[0-9]+)$/;
		var decimal=re.test(inputString);
		if(decimal===false){
			$('.alert').remove();
			callAlerts("Error","Please, Enter Valid decimal numbers");
			Inputerror=true;
		}
		else{
		   $('.alert').fadeOut(200);
			Inputerror=false;
		}

	});

	/*financial year*/
	$('.year').on('blur',function()
	{
		var inputString = $(this).val();
		var max=9;
		re = /[a-zA-Z`~!@#$%^&*()_|+\=?;:'",.<>\{\}\[\]\\\/]/gi;
		var isSplChar = re.test(inputString);
		if(isSplChar)
		{
			var no_spl_char = inputString.replace(/[a-zA-Z`~!@#$%^&*()_|+\=?;:'",.<>\{\}\[\]\\\/]/gi, '');
			$(this).val(no_spl_char);
			$('.alert').remove();
			$(this).after('<p class="alert alert-Error" role="alert">Please, Enter Numbers only.</p>');
			$('.alert').fadeOut(2000);
		}
		if(inputString.length>max){
			 $(this).val($(this).val().substr(0, max));
			 $('.alert').remove();
			 $(this).after('<p class="alert alert-Error" role="alert">Please, Enter Valid year.</p>');
			 $('.alert').fadeOut(2000);
		}
	});
	/*date should not less than today's date*/
	$('.date_should_not_less_than_today').on('blur',function()
	{
		var inputString =$(this).val();
		var d = new Date();
		var curr_date = d.getDate();
		var curr_month = d.getMonth();
		var curr_year = d.getFullYear();
		var input=inputString.split("-");
		var input_month = parseInt(input[0]);
		var input_day = parseInt(input[1]);
		var input_year = parseInt(input[2]);
		var startDt = curr_year+"-"+parseInt(curr_month+1)+"-"+curr_date;
		if(input_year >= curr_year){
			if(input_month>=curr_month){
				if(input_day>curr_date){
					Inputerror=false;
					$('.alert').remove();
				}
				else{
					$('.alert').remove();
					$(this).after('<p class="alert alert-Error" role="alert">Selected day should not less than current day.</p>');
					$('#other').val("");
					Inputerror=true;
				}
			}
			else{
				$('.alert').remove();
				$(this).after('<p class="alert alert-Error" role="alert">Selected Month should not less than current month.</p>');
				$('#other').val("");
				Inputerror=true;
			}
		}
		else{
			$('.alert').remove();
			$(this).after('<p class="alert alert-Error" role="alert">Selected Year should not less than current year.</p>');
			$('#other').val("");
			Inputerror=true;
		}
	});

});