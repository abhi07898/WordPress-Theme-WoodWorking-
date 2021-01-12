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
// 				quant:quantity_val,key:key,action:'cart_updation'},
// 			success : function(response) {
// 				alert(response);
				
// 				// $('#total_bill').val(response.grand_total);
// 			}
// 		})
// 		//alert(cart_js.ajax_url);
// 	});
// })