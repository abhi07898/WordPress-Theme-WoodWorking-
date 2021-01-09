<?php
echo '<h1>Show the Whole Content of custome-plugin-</h1>';
?>
<?php
function Ced_show_Customplugin_data() {
	include_once CED_PLUGIN_DIR_PATH."inc/ced_wp_list_table.php";  
}
Ced_show_Customplugin_data();
// pagination 
?>

