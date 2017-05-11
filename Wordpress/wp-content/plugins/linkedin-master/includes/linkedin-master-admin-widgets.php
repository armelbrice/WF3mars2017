<?php
function menu_single_linkedin_admin_widgets(){
	if ( is_admin() )
	add_submenu_page( 'linkedin-master', 'Widgets', 'Widgets', 'manage_options', 'linkedin-master-admin-widgets', 'linkedin_master_admin_widgets' );
}

function linkedin_master_admin_widgets(){
$plugin_master_name = constant('LINKEDIN_MASTER_NAME');
?>
<div class="wrap">
<h1>Widgets</h1>
<?php
if(!class_exists('linkedin_master_admin_widgets_table')){
	require_once( dirname( __FILE__ ) . '/linkedin-master-admin-widgets-table.php');
}
//Prepare Table of elements
$wp_list_table = new linkedin_master_admin_widgets_table();
//Table of elements
$wp_list_table->display();

?>
<br>
<h2>IMPORTANT: Makes no use of Javascript or Ajax to keep your website fast and conflicts free</h2>

<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>

<br>

<p>
<a class="button-secondary" href="https://wordpress.techgasp.com" target="_blank" title="Visit Website">More TechGasp Plugins</a>
<a class="button-secondary" href="https://wordpress.techgasp.com/support/" target="_blank" title="TechGasp Support">TechGasp Support</a>
<a class="button-primary" href="https://wordpress.techgasp.com/linkedin-master/" target="_blank" title="Visit Website"><?php echo $plugin_master_name; ?> Info</a>
<a class="button-primary" href="https://wordpress.techgasp.com/linkedin-master-documentation/" target="_blank" title="Visit Website"><?php echo $plugin_master_name; ?> Documentation</a>
</p>
<?php
}
if( is_multisite() ) {
add_action( 'admin_menu', 'menu_single_linkedin_admin_widgets' );
}
else {
add_action( 'admin_menu', 'menu_single_linkedin_admin_widgets' );
}
?>
