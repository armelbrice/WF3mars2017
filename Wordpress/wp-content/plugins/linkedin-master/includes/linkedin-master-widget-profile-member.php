<?php
//Hook Widget
add_action( 'widgets_init', 'linkedin_master_widget_profile_member' );
//Register Widget
function linkedin_master_widget_profile_member() {
register_widget( 'linkedin_master_widget_profile_member' );
}

class linkedin_master_widget_profile_member extends WP_Widget {
	function __construct(){
	$widget_ops = array( 'classname' => 'LinkedIn Master Member Profile', 'description' => __('LinkedIn Master Member Profile, allows you to display your linkedin personal profile.', 'linkedin_master') );
	$control_ops = array( 'width' => 300, 'height' => 350, 'id_base' => 'linkedin_master_widget_profile_member' );
	parent::__construct( 'linkedin_master_widget_profile_member', __('LinkedIn Master Member Profile', 'linkedin_master'), $widget_ops, $control_ops );
	}
	
	function widget( $args, $instance ) {
		extract( $args );
		//Our variables from the widget settings.
		$linkedin_title = isset( $instance['linkedin_title'] ) ? $instance['linkedin_title'] :false;
		$linkedin_title_new = isset( $instance['linkedin_title_new'] ) ? $instance['linkedin_title_new'] :false;
		$show_linkedinprofile = isset( $instance['show_linkedinprofile'] ) ? $instance['show_linkedinprofile'] :false;
		$personalcode = $instance['personalcode'];
		echo $before_widget;
		
		// Display the widget title
	if ( $linkedin_title ){
		if (empty ($linkedin_title_new)){
			$linkedin_title_new = constant('LINKEDIN_MASTER_NAME');
			echo $before_title . $linkedin_title_new . $after_title;
		}
		else{
			echo $before_title . $linkedin_title_new . $after_title;
		}
	}
	else{
	}
	//RENDER WIDGET
	if ( $show_linkedinprofile ){
		echo '<div style="overflow:visible !important">' . 
			$personalcode .
			'</div>';
	}
	else {
	}
	echo $after_widget;
	}
	//Update the widget
	function update( $new_instance, $old_instance ) {
		$instance = $old_instance;
		//Strip tags from title and name to remove HTML
		$instance['linkedin_title'] = strip_tags( $new_instance['linkedin_title'] );
		$instance['linkedin_title_new'] = $new_instance['linkedin_title_new'];
		$instance['show_linkedinprofile'] = $new_instance['show_linkedinprofile'];
		$instance['personalcode'] = $new_instance['personalcode'];
		return $instance;
	}
	function form( $instance ) {
	$plugin_master_name = constant('LINKEDIN_MASTER_NAME');
	//Set up some default widget settings.
	$defaults = array( 'linkedin_title_new' => __('LinkedIn Master', 'linkedin_master'), 'linkedin_title' => true, 'linkedin_title_new' => false, 'show_linkedinprofile' => false, 'personalcode' => false );
	$instance = wp_parse_args( (array) $instance, $defaults );
	?>
		<br>
		<b>Check the buttons to be displayed:</b>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['linkedin_title'], true ); ?> id="<?php echo $this->get_field_id( 'linkedin_title' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_title' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'linkedin_title' ); ?>"><b><?php _e('Display Widget Title', 'linkedin_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'linkedin_title_new' ); ?>"><?php _e('Change Title:', 'linkedin_master'); ?></label>
	<br>
	<input id="<?php echo $this->get_field_id( 'linkedin_title_new' ); ?>" name="<?php echo $this->get_field_name( 'linkedin_title_new' ); ?>" value="<?php echo $instance['linkedin_title_new']; ?>" style="width:auto;" />
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; height:18px; vertical-align:middle;" />
	&nbsp;
	<input type="checkbox" <?php checked( (bool) $instance['show_linkedinprofile'], true ); ?> id="<?php echo $this->get_field_id( 'show_linkedinprofile' ); ?>" name="<?php echo $this->get_field_name( 'show_linkedinprofile' ); ?>" />
	<label for="<?php echo $this->get_field_id( 'show_linkedinprofile' ); ?>"><b><?php _e('Show LinkedIn Profile', 'linkedin_master'); ?></b></label></br>
	</p>
	<p>
	<label for="<?php echo $this->get_field_id( 'personalcode' ); ?>"><?php _e('insert Personal Profile Code:', 'linkedin_master'); ?></label></br>
	<textarea cols="30" rows="5" id="<?php echo $this->get_field_id( 'personalcode' ); ?>" name="<?php echo $this->get_field_name( 'personalcode' ); ?>" ><?php echo stripslashes ($instance['personalcode']); ?></textarea>
	<div class="description"><a href="https://developer.linkedin.com/plugins/member-profile-plugin-generator?button-type-inline=true" target="_blank">LinkedIn Personal Profile Code Generator</a></div>
	</p>
<div style="background: url(<?php echo plugins_url('images/techgasp-hr.png', dirname(__FILE__)); ?>) repeat-x; height: 10px"></div>
	<p>
	<img src="<?php echo plugins_url('images/techgasp-minilogo-16.png', dirname(__FILE__)); ?>" style="float:left; width:18px; vertical-align:middle;" />
	&nbsp;
	<b><?php echo $plugin_master_name; ?> Website</b>
	</p>
	<p><a class="button-secondary" href="https://wordpress.techgasp.com/linkedin-master/" target="_blank" title="<?php echo $plugin_master_name; ?> Info Page">Info Page</a> <a class="button-secondary" href="https://wordpress.techgasp.com/linkedin-master-documentation/" target="_blank" title="<?php echo $plugin_master_name; ?> Documentation">Documentation</a> <a class="button-primary" href="https://wordpress.techgasp.com/linkedin-master/" target="_blank" title="Visit Website">Get Add-ons</a></p>
	<?php
	}
 }
?>
