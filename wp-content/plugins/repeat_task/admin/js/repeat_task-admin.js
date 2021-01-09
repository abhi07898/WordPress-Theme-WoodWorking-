
jQuery(document).ready(function(){	
	jQuery('#example').DataTable();
	// for perform the nojce concept
	jQuery(".pref").change(function() {         //event
        var this2 = this;                  //use in callback
        jQuery.post(ced_noce_data.ajax_url, {     //POST request
           _ajax_nonce: ced_noce_data.nonce, //nonce
            action: "nonce_data_insertion",        //action
            title: this.value              //data
        }, function(data) { 
			alert(data);              //callback
            this2.nextSibling.remove();    //remove the current title
            jQuery(this2).after(data);          //insert server response
        });
    });
	// the content which load during the load of  document
	jQuery('#save_post_menu').click(function(e){
		e.preventDefault();
		page_name = jQuery('#page_name').val();
		jQuery.ajax({
			url: save_metabox_selected_options.ajax_url,
			type : 'post',
			data : {action:'fatched_page_name_vreate_post', data:page_name},
			success : function (response_page) {
				alert(response_page);
				location.reload();
			}
		});
	})	
	jQuery('#show_metabox').click(function(e){
		let checkvalue=[];
		jQuery('.check_box_meta_box_1').each(function () {
			if (this.checked) {
				checkvalue.push(jQuery(this).val());
			}	
		});
		jQuery.ajax({
			url : save_metabox_selected_options.ajax_url,
			type :'post',
			data : {checked_data:checkvalue, action:'meta_box_dayanamic_insertion'},
			success : function (response) {
				alert(response);
			}
		});				
	});
	// for inser the data into details_table
	jQuery('#submit_detail').click(function(e){
		e.preventDefault();
		name = jQuery('#name').val();
		contact = jQuery('#contact').val();
		address = jQuery('#address').val();
		url = jQuery('#url').val();
		data_array = Array(name, contact, address, url);
		jQuery.ajax({
			url : save_metabox_selected_options.ajax_url,
			type :'post',
			data : {data:data_array, action:'details_insert_cutom_table'},
			success : function (detailed_response) {
				if(detailed_response==0) {
					alert('inserted successfully');
				} else {
					alert("spome concern during insertion");
				}
			} 
		})
	})
});
