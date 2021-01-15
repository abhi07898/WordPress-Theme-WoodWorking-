// jQuery(document).ready(function(){
// 	jQuery(':input[type="number"]').keyup(function(e) {
// 		e.preventDefault();
// 		let quantity_val = jQuery(this).val();
// 		let key = jQuery(this).data('productid');
// 		// alert(key +'.'+ quantity_val);
// 		jQuery.ajax({
// 			url : public_cart_js.ajax_url,
// 			type : 'post',
// 			data :  {
// 				quant:quantity_val,key:key,action:'cart_updation'
// 			},
// 			success : function(response) {
// 				// alert(response);
// 				let res = JSON.parse(response)
// 				jQuery('#total_'+key).html(res.total);
// 				jQuery('#grand_total').val(res.grand_total);	
// 			}
// 		})
// 		//alert(cart_js.ajax_url);
// 	});
// })
jQuery(document).ready(function(e){
	let name = '';
	let contact = '';
	let email = '';
	let pincode = '';
	let country = '' ;
	let street = '';
	let landmark = '';
	let town = '';
	let state = '';
	let order_method = '';
	jQuery('#name').focusout(function() {
		name = jQuery('#name').val().trim();
		if((!(name.match(/^([a-zA-Z]+\s?)*$/))) || (name=='')) {
      		jQuery('#name_error').html('name should in proper way');
            jQuery('#name').focus();
            name = '';
        } else {
        	name = jQuery('#name').val().trim();
        	jQuery('#name_error').html('');
        }
	}); 
	jQuery('#contact').focusout(function() {
		contact = jQuery('#contact').val().trim();
		if((!(contact.match(/^(0|[+91]{3})?[7-9][0-9]{9}$/))) || contact==''){
            jQuery('#contact_error').html('Contact Number is not in Correct Form');
            jQuery('#contact').focus();
            contact = '';
        } else {
        	contact = jQuery('#contact').val().trim();
        	jQuery('#contact_error').html('');
        }
	}); 
	jQuery('#email').focusout(function() {
		email = jQuery('#email').val().trim();
		if(!(email.match(/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/))) {
            jQuery('#email_error').html('Email  should be in a proper way no consecutive(.) and not rather single @ are allowed ');
            jQuery('#email').focus();
            email='';
        } else {
        	jQuery('#email_error').html('');
        	email = jQuery('#email').val().trim();
        }
	});
	jQuery('#country').focusout(function(){
		country = jQuery('#country').val().trim();
		if(country=='') {
			jQuery('#country_error').html('Country is required feild');
			country = '';
		} else {
			jQuery('#country_error').html('');
			country = jQuery('#country').val().trim();
		}
	});
	jQuery('#pincode').focusout(function() {
		pincode = jQuery('#pincode').val().trim();
		if((!(pincode.match( /^[0-9\s]*$/))) || (pincode.length != 6)){
            jQuery('#pincode_error').html('Pincode required in numeric "6" digit');
            jQuery('#pincode').focus();
            pincode = '';
        }  else {
        	pincode = jQuery('#pincode').val().trim();
        	jQuery('#pincode_error').html('');
        }
	});
	jQuery('#street').focusout(function(){
		street = jQuery('#street').val().trim();
		if(street=='') {
			jQuery('#street_error').html('Street is required feild');
			street = '';
		} else {
			jQuery('#street_error').html('');
			street = jQuery('#street').val().trim();
		}
	}); 
	jQuery('#landmark').focusout(function(){
		landmark = jQuery('#landmark').val().trim();
		if(landmark=='') {
			jQuery('#landmark_error').html('Landmark is required feild');
			landmark = '';
		} else {
			jQuery('#landmark_error').html('');
			landmark = jQuery('#landmark').val().trim();
		}
	}); 
	jQuery('#town').focusout(function(){
		town = jQuery('#town').val().trim();
		if(town=='') {
			jQuery('#town_error').html('town is required feild');
			town = '';
		} else {
			jQuery('#town_error').html('');
			town = jQuery('#town').val().trim();
		}
	}); 
	jQuery('#state').focusout(function(){
		state = jQuery('#state').val().trim();
		if(state=='') {
			jQuery('#state_error').html('state is required feild');
			state = '';
		} else {
			jQuery('#state_error').html('');
			state = jQuery('#state').val().trim();
		}
	});	
	jQuery("#check_box_address").click(function () {
  		if (jQuery("#check_box_address").is(":checked")) { 
  			jQuery('#billingaddress').html('Country = '+country+', street = '+street+', landmark = '+landmark+', town = '+town+', state = '+state);
  		}else {
  			jQuery('#billingaddress').html('');

  		}
  	});
  	billing_address = jQuery('#billingaddress').val();
  	jQuery("#order_method").click(function(){
        order_method = jQuery("input[name='orderMethod']:checked").val();
     });


	jQuery('#submitdetail').click(function(e){
		
		if(order_method == '') 
	  	{
	  		alert('Please Select Payment method');
	  	}
      	else if(name=='' || contact =='' || email == '' || pincode=='' || country == '' ||street =='' ||landmark == '' || town == '' || state == '') 
      	{
      		alert('feilds with * marks are required feilds so please fill those all feild firstly');
      	} 
      	else {
      		customer_detail = Array(name,contact,email,pincode,country,street,landmark,town,state,billing_address,order_method);
      		jQuery.ajax({
      			url :  public_cart_js.ajax_url,
      			type : 'post',
      			data : {
      				action:"check_out_customer_detail",
      				data : customer_detail
      			},
      			success : function(response) {
      				// alert(response);
      				window.location.href= public_cart_js.home_url;      				
      			}
      		})
      	}
      	
	});
});
