
jQuery(function(){
	if(jQuery('#tbl-view-data').length > 0 ) {
		jQuery('#tbl-view-data').DataTable();
	}
})
jQuery(document).ready(function(){
	jQuery('#submit_detail').click(function(e){
		e.preventDefault();
		name = jQuery('#name').val();
		contact =  jQuery('#contact').val();
		address =  jQuery('#address').val();
		url =  jQuery('#url').val();

		// alert(name);	
		var detail_data = new Array(name, contact, address, url);
		jQuery.ajax({
			url : boil_test_localize.ajax_url,
			type : 'post',
			action:'save_detailed_data',
			data : {
				data:detail_data, 
				action:'save_detailed_data'
			},
			success : function(response){
				if(response==0) {
					alert("Insreted Successfully");
				}
			} 
		})
	});
})