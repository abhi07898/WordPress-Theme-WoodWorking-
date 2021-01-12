jQuery(document).ready(function(){
	jQuery('#quantity').focusout(function(e) {
		e.preventDefault();
		let quantity_val = jQuery('#quantity').val();
		jQuery('#quantity').val(quantity_val);
		alert(quantity_val);
		// alert(quantity_val);

	});
	// alert('aa jaa');
	// jQuery('#cart_delet').click(function(e){
	// 	// e.preventDefault();
	// 	alert('clicked');
	// });
})