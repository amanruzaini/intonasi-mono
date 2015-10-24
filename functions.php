<?php

if ( function_exists('register_sidebar') )
	register_sidebars(1);

/* Get Total Pages */
function total_pages() {
	global $wpdb;
	$mySearch = $wpdb->get_results("SELECT * FROM $wpdb->posts WHERE post_type = 'post' and post_status = 'publish'");
	
	$count = 0;
	
	foreach($mySearch as $post) {
		$count++;
	}

	$postperpage = intval(get_option('posts_per_page'));
	
	$NumResults = ceil(($count) / $postperpage );
	echo $NumResults;
}

/* Format recent comments */
function im_recent_comments() {
	//This grabs recent comments
	global $wpdb;
 
	$sql = "SELECT DISTINCT ID, post_title, post_password, comment_ID,
		comment_post_ID, comment_author, comment_date_gmt, comment_approved,
		comment_type,comment_author_url,
		SUBSTRING(comment_content,1,60) AS com_excerpt
		FROM $wpdb->comments
		LEFT OUTER JOIN $wpdb->posts ON ($wpdb->comments.comment_post_ID =
		$wpdb->posts.ID )
		WHERE comment_approved = '1' AND comment_type = '' AND
		post_password = ''
		ORDER BY comment_date_gmt DESC
		LIMIT 5";

	$comments = $wpdb->get_results($sql);
	$output = $pre_HTML;
	$output .= "\n<ul id=\"recentcomments\">";
	
	foreach ($comments as $comment) {
	
		$output .= "\n<li><a href=\"" . get_permalink($comment->ID) .
		"#comment-" . $comment->comment_ID . "\" title=\"on " . 
		$comment->post_title . "\">" . strip_tags($comment->com_excerpt) . "...</a></li>" . "<em>" .strip_tags($comment->comment_author) ."</em>";
		
	}
	
	$output .= "\n</ul>";
	$output .= $post_HTML;
	
	echo $output;
}

// THEME SETTINGS PANEL ////////////////////////////////////////////////////////////////////////////////////////////////////////////

$themename = "Intonasi Mono";
$shortname = "im";
$path = get_bloginfo('template_directory');
$options = array (

		array(  "name" => "Footer Section",
            "type" => "heading"),
		
		array(  "name" => "Name",
	          "id" => $shortname."_name_first",
	          "std" => "Aman Ruzaini",
	          "type" => "text"),
		
		array(  "name" => "Brief desciption of yourself",
	          "id" => $shortname."_self_desc",
	          "std" => "Super cool hero from Planet Nameck that will save the world from the hand of monsterous Fliza and guess what, he is one of the Super Saiyan!",
	          "type" => "textarea"),
	          
		array(  "name" => "Social Networking",
            "type" => "heading"),
		
		array(  "name" => "Facebook",
	          "id" => $shortname."_social_facebook",
	          "std" => "",
	          "type" => "text"),

		array(  "name" => "Flickr",
	          "id" => $shortname."_social_flickr",
	          "std" => "",
	          "type" => "text"),

		array(  "name" => "Last.fm",
	          "id" => $shortname."_social_lastfm",
	          "std" => "",
	          "type" => "text"),
	
		array(  "name" => "Twitter",
	          "id" => $shortname."_social_twitter",
	          "std" => "",
	          "type" => "text"),
	          
        array( "name" => "Twitter Section",
			"type" => "heading"),
		 
		array( "name" => "Twitter username",
			"id" => $shortname."_twitter_username",
			"type" => "text"),
			

);

function im_add_admin() {

    global $themename, $shortname, $options;

	if ( $_GET['page'] == basename(__FILE__) ) {
 
		if ( 'save' == $_REQUEST['action'] ) {
 
			foreach ($options as $value) {
			update_option( $value['id'], $_REQUEST[ $value['id'] ] ); }
 
                foreach ($options as $value) {
                    if( isset( $_REQUEST[ $value['id'] ] ) ) { 
                    	update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); } else 	
                    					{ delete_option( $value['id'] ); 
											if( $value['type'] == 'checkbox' ) {
												if( $value['status'] == 'checked' ) {
													update_option( $value['id'], 1 );
												} else { 
													update_option( $value['id'], 0 ); 
												}	
											} elseif( $value['type'] != 'checkbox' ) {
												update_option( $value['id'], $_REQUEST[ $value['id'] ]  ); 
											} else { 
												update_option( $value['id'], $_REQUEST[ $value['id'] ] ); 
											}
										}
									}
 
			header("Location: themes.php?page=functions.php&saved=true");
			die;
 
		} else if( 'reset' == $_REQUEST['action'] ) {
 
			foreach ($options as $value) {
			delete_option( $value['id'] ); }
			 
			header("Location: themes.php?page=functions.php&reset=true");
			die;
			 
		}
	}

    add_theme_page($themename." Settings", "Theme Settings", 'edit_themes', basename(__FILE__), 'im_admin');

}

function im_admin() {

    global $themename, $shortname, $options;

    if ( $_REQUEST['saved'] ) echo '<div id="message" class="updated fade"><p><strong>'.$themename.' settings saved.</strong></p></div>';
    
?>
<div class="wrap">
<h2><?php echo $themename; ?> Settings</h2>

<form method="post">

	<p class="submit" style="margin:-15px 0 -10px;">
		<input name="save" type="submit" value="Save Changes" class="button-primary" />    
		<input type="hidden" name="action" value="save" />
	</p>

	<table class="form-table">

	<?php foreach ($options as $value) {     
	if ($value['type'] == "text") { ?>
        
	<tr valign="top"> 
	    <th scope="row"><?php echo $value['name']; ?>:</th>
	    <td>
	        <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } else { echo $value['std']; } ?>" size="40" />
	    </td>
	</tr>

	<?php } elseif ($value['type'] == "textarea") { ?>

	    <tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
	        <td>
	            <textarea name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" rows="3" cols="70"><?php if ( get_settings( $value['id'] ) != "") { echo stripslashes (get_settings( $value['id'] )); } else { echo $value['std']; } ?></textarea>
	        </td>
	    </tr>
	
	<?php } elseif ($value['type'] == "checkbox") { ?>

	    <tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
	        <td>
							<?php
								if ( get_option( $value['id'] ) != "" ) { 
									$status= get_option( $value['id'] );
								} else { 
									$status= $value['std']; 
								}
							?>
	            <input name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>" type="<?php echo $value['type']; ?>" value="<?php if ( get_option( $value['id'] ) != "") { echo get_option( $value['id'] ); } else { echo $value['std']; } ?>" <?php if( $status == 1 ) { echo 'checked'; } ?>/>
	        </td>
	    </tr>

	<?php } elseif ($value['type'] == "select") { ?>

	    <tr valign="top"> 
	        <th scope="row"><?php echo $value['name']; ?>:</th>
	        <td>
	            <select name="<?php echo $value['id']; ?>" id="<?php echo $value['id']; ?>">
	                <?php foreach ($value['options'] as $option) { ?>
	                <option<?php if ( get_settings( $value['id'] ) == $option) { echo ' selected="selected"'; } elseif ($option == $value['std']) { echo ' selected="selected"'; } ?>><?php echo $option; ?></option>
	                <?php } ?>
	            </select>
	        </td>
	    </tr>

			<?php } elseif ($value['type'] == "heading") { ?>

			    <tr valign="top"> 
			        <td colspan="2">
			            <h2 style="font-size:1.8em;"><?php echo $value['name']; ?></h2>
			        </td>
			    </tr>

	<?php 
		} 
	}
	?>

	</table>

	<p class="submit">
		<input name="save" type="submit" value="Save Changes" class="button-primary" />    
		<input type="hidden" name="action" value="save" />
	</p>
</form>

<?php }
add_action('admin_menu', 'im_add_admin');	
?>
