jQuery(document).ready(function(){
	jQuery('#publish').click(function(e){
		e.preventDefault();
		if((jQuery("#discount").length) && (jQuery("#regular_price").length) ){
			var inventory = parseInt(jQuery('#ced_inventory_meta_feilds').val()); 
			var regular_price = parseInt(jQuery("#regular_price").val());
			var discount_price = parseInt(jQuery('#discount').val());
			if( discount_price > regular_price) {
				jQuery('#price_error').html("Discount should always lower then Regular price");
			} 
			else if(inventory < 0 ) {
				jQuery('#invent_error').html("Inventory should always greater than 0");
				jQuery('#ced_inventory_meta_feilds').val(0);
			}  else {
				jQuery('#price_error').html("");
				jQuery('#invent_error').html("");
				jQuery("#post").submit();
        	}
		} 
	});
});
