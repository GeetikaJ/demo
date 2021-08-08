<script type="text/javascript">
$(".required").siblings('label').after('<span style="color:Red; font-size: 17px;"  >*</span>');
function validate_next_requered(){  
	var i=0; name='';	
	$(".nextrequired").each(function(){		
		if($(this).val()=='' && $(this).is('[disabled=disabled]')==false){
		$(this).css("borderColor", "red");
		required_name = $(this).attr('required_name');
		//alert(required_name);
		$(this).next('.text-danger').remove();
		$(this).after('<div class="text-danger" >'+required_name +' is required</div>');
		if(name==''){
		name = $(this).attr('name');
		$('[name="'+name+'"]').focus();
		}
		i++;
		}
		else{
		$(this).css("borderColor", "#eee");
		$(this).next('.text-danger').remove();
		}
		});
	
	
	
}

function validate_file_requered(){  
	var i=0; name='';	
	$(".required").each(function(){		
		if($(this).val()=='' && $(this).is('[disabled=disabled]')==false){
		$(this).css("borderColor", "red");
		required_name = $(this).attr('required_name');
		$(this).next('.text-danger').remove();
		$(this).after('<div class="text-danger" >'+required_name +' is required</div>');
		if(name==''){
		name = $(this).attr('name');
		$('[name="'+name+'"]').focus();
		}
		i++;
		}
		else{
		$(this).css("borderColor", "#eee");
		$(this).next('.text-danger').remove();
		}
	});
	
/***********VALIDATION FOR CHECK BOX*************/
	var checked = $("input[type=checkbox]:checked").length;
	if (checked > 0) {
	$(".officetype").next('.text-danger').remove();
	}else{
	$('#officetype').prop('required',true);

	$(".officetype").next('.text-danger').remove();
	$(".officetype").after('<div class="text-danger" >Please select What you want to be? at least one.</div>');

	}
  	
}

$('.blockSpecialChar').keypress(function(event) {
if (!((event.which > 64 && event.which < 91) || (event.which > 96 && event.which < 123) || event.which == 8 || event.which == 32 || (event.which >= 48 && event.which <= 57))) {
event.preventDefault();
}
});	
/******************************ONE BY ONE FIELD VALIDATION**********************/
//email validation
$('.email').change(function(event) {
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	var emailaddress = $(this).val();
	var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;  
	if(!emailReg.test(emailaddress)) {  
	$(this).val('');
	$(this).focus();
	$(this).after('<div class="text-danger" >Please Enter valide email address</div>'); }else{
	$(this).next('.text-danger').remove();
	} });	
//name validation
$('.name').change(function(event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	}
	 });
//mobile no validation
$('.mobile').change(function(event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	} });

$('.password').change(function(event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	} });
$('.password').change(function(event) {
	
		if($(this).val()){
			new_password=$(this).val();
			re_num = /[0-9]/;
			re_small_char = /[a-z]/;
			re_cap_char = /[A-Z]/;
			re_special =/[!#$%&'()*+,-.:;<=>?@[\]^_`{|}~]/;
			if(new_password.length < 8) {
			$(this).val('');
			$(this).after('<div class="text-danger" >Password must contain at least eight characters!</div>'); 

			return false;

			}else if(!re_num.test(new_password)) {
			$(this).val('');
			$(this).after('<div class="text-danger" >password must contain at least one number (0-9)</div>'); 
			return false;
			}else if(!re_small_char.test(new_password)) {
			$(this).val('');
			$(this).after('<div class="text-danger" >password must contain at least one lowercase letter (a-z)</div>'); 

			return false;
			}else if(!re_cap_char.test(new_password)) {
			$(this).val('');
			$(this).after('<div class="text-danger" >password must contain at least one uppercase letter (A-Z)</div>'); 

			return false;
			}else if(!re_special.test(new_password)) {
			$(this).val('');
			$(this).after('<div class="text-danger" >password must contain at least one special character</div>'); 

			return false;
			}}
	 });
$('.echosystem').change(function(event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	} });
//validation mobilelength
$(".mobilelength").change(function (event) {
	if(this.value.length!=10){
	$(this).after('<div class="text-danger" >The Mobile field must be at least 10 characters in length.</div>');
	$(this).val('');
	$(this).focus();
	}else{
	$(this).next('.text-danger').remove();}
});
$(".entity").change(function (event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
	$(this).after('<div class="text-danger" >This is required</div>'); 
	}
});
$(".gstib").change(function (event) {
		$(this).next('.text-danger').remove(); 

	if(this.value.length!=14){$(this).next('.text-danger').remove(); 
	$(this).after('<div class="text-danger" >Please enter a valid GSTIN no.</div>');
	$(this).val('');
	$(this).focus();
	}else{
	$(this).next('.text-danger').remove(); 
	}

});
$('.gstib').keypress(function (e) {
    var regex = new RegExp("^[a-zA-Z0-9]+$");
    var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
    if (regex.test(str)) {
      $(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
    }else{
    e.preventDefault();
}

    
});
$(".organisation").change(function (event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	}
});
$(".gstib").change(function (event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {$(this).next('.text-danger').remove();
		$(this).val('');
	$(this).after('<div class="text-danger" >Please Enter Valid GSTN ID</div>'); 
	}
});
$(".whatyou").change(function (event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	}
});
$(".address").change(function (event) {
	if ($(this).val().trim().length) { 
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	} else {
		$(this).val('');
	$(this).after('<div class="text-danger" >This is required</div>'); 
	}
});

//url check
$(".url").change(function (event) {
	$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	var url = $(this).val();
	var url_validate = /(ftp|http|https):\/\/(\w+:{0,1}\w*@)?(\S+)(:[0-9]+)?(\/|\/([\w#!:.?+=&%@!\-\/]))?/;
	if(!url_validate.test(url)){
	$(this).val('');
	$(this).focus();
	$(this).after('<div class="text-danger" >Invalid Website Formate</div>');
	}else{
		$(this).css("borderColor", "#eee");
	$(this).next('.text-danger').remove();
	}
});

$('.numericclass').keypress(function(event) {
	if (event.which != 8 &&  isNaN(String.fromCharCode(event.which))) {
	event.preventDefault();
	}
});


$('.floatclass').keypress(function(event) {
	if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)|| (event.which ==46 && $(this).caret().start==0)) {
	event.preventDefault();
	}
});


$('.precentclass').keypress(function(event) {
if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)|| (event.which ==46 && $(this).caret().start==0)) {
event.preventDefault();
}
});
$('.precentclass').keyup(function(event) {
		if($(this).val()>=100){
		$(this).val($(this).val().slice(0,-1));
		}
		else{
		if($(this).val().length>5){
		$(this).val($(this).val().slice(0,-1));
		}
		} 
		});


$( ".alphabetclass" ).keypress(function(e) {
		var key = e.keyCode;
		if (key >= 48 && key <= 57) {
		e.preventDefault();
		}
});
// end validate alphanumeric
   
</script></body>
<footer>
	 <div class="bg-blue py-2">
            <div class="row px-3"> <small class="ml-4 ml-sm-5 mb-2">Copyright &copy; 2021. All rights reserved.</small>
                <div class="social-contact ml-4 ml-sm-auto"> <span class="fa fa-facebook mr-4 text-sm"></span> <span class="fa fa-google-plus mr-4 text-sm"></span> <span class="fa fa-linkedin mr-4 text-sm"></span> <span class="fa fa-twitter mr-4 mr-sm-5 text-sm"></span> </div>
            </div>
        </div>
</footer>

</html>