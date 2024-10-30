<?php
/*
Plugin Name: Kings Different Content for Members
Plugin URI: http://wordpress.org/plugins/kings-different-content-for-members/
Description: This will add allow you to show different texts only for logged in users, while normal texts for normal visitors. 
Author: Saif Bin-Alam
Version: 1.0.1
Author URI: http://kingsitservice.com/saif
*/
function kings_loggedin_content_shortcode_logged_in ( $atts, $content = null){
return ('<div class="logged-in">'.$content.'</div>');
}

add_shortcode ('logged-in', 'kings_loggedin_content_shortcode_logged_in');
function kings_loggedin_content_shortcode_general ( $atts, $content = null){
return ('<div class="general-content">'.$content.'</div>');
}
add_shortcode ('general-content', 'kings_loggedin_content_shortcode_general');
function kings_check_if_logged_in() { if ( is_user_logged_in() ) { 
?>
<style type="text/css">
	div.general-content {display:none!important;}
	div.logged-in {display:block!important;}
</style>
<?php
}
else { 
?>
<style type="text/css">
	div.general-content {display:block!important;}
	div.logged-in {display:none!important;}
</style>
<?php
}
}
add_action( 'wp_head', 'kings_check_if_logged_in');   
?>