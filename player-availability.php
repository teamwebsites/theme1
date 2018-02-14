
<div>
    
<style>.accept {background: green;} button {padding: 3px 7px; box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.3); margin-right: 1.5px; border: none;}</style>    
    
<h3 style="width: 100%;">Can you attend?</h3> 




<form action="" method="post">
    <input type="submit" value="Send details to embassy" />
    <input type="hidden" name="button_pressed" value="1" />
</form>

<form action="" method="post">
    <input type="submit" value="Send details to embassy" />
    <input type="hidden" name="button_pressed" value="1" />
</form>

<?php

if(isset($_POST['button_pressed']))
{
    
    $args = array(
         'role'    => 'wpcm_player',
         'taxonomy' => 'wpcm_team',
         'order'   => 'DESC'
    );
    $subscribers = get_users( $args );
    
    foreach ($subscribers as $user) {
        $var = "$user->user_email";
    $listuser = implode(', ', $var);
    
    
    
    }
    
    
    $multiple_recipients = $$user;
    
    
    $subj = 'Player Availability Feature';
    $body = "Dear Player,\nPlease login to the club website and register your attendance for this .";
    $headers = 'From: info@teamwebsites.co.uk' . "\r\n" .
        'Reply-To: morgan@teamwebsites.co.uk' . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    wp_mail( $multiple_recipients, $subj, $body );

    echo 'Email Sent.';
}

?>

<button class="decline">Decline</button>

<button class="accept">Accept</button>

<div class="front-form col-sm-6">
        <form method="post" name="front_end" action="" >
            <input type="text" name="title" placeholder="FrontPost Title" required />
             <textarea  name="content" placeholder="FrontPost Content" rows="5" ></textarea>
            <input type="text" name="tag" placeholder="FrontPost tags" />
            <input type="text" name="custom_1" placeholder="Custom Field  Content" />


            <span><?php
		// Create and display the dropdown menu.
		wp_dropdown_categories(
			array(
				'orderby'         => 'NAME', // Order the items in the dropdown menu by their name.
				'taxonomy'        => 'wpcm_team', // Only include posts with the taxonomy of 'tools'.
				'name'            => 'wpcm_team', // Change this to the
				'show_option_all' => 'All Tools', // Text the dropdown will display when none of the options have been selected.
				'selected'        => '', // Set which option in the dropdown menu is the currently selected one.
			) );
		?></span>
            <button type="submit">Submit</button>
            <input type="hidden" name="action" value="front_post" />
        </form>
    </div>
    
    <?php 

if ( 'POST' == $_SERVER['REQUEST_METHOD'] && !empty( $_POST['action'] ) && $_POST['action'] == "front_post") {

//store our post vars into variables for later use
//now would be a good time to run some basic error checking/validation
//to ensure that data for these values have been set
$title     = $_POST['title'];
$content   = $_POST['content'];
$tags   = $_POST['tag'];
$custom_field = $_POST['custom_1']; 
$post_type = 'wpcm_match';


//the array of arguements to be inserted with wp_insert_post
$new_post = array(
'post_title'    => $title,
'post_content'  => $content,
'tags_input'  => $tags,
'post_status'   => 'publish',
'post_category' => array('0',$_POST['cat']),          
'post_type'     => $post_type 
);

//insert the the post into database by passing $new_post to wp_insert_post
//store our post ID in a variable $pid
//we now use $pid (post id) to help add out post meta data
 $pid=wp_insert_post($new_post);

//we now use $pid (post id) to help add out post meta data
add_post_meta($pid, 'cust_key', $custom_field);


}
?>
    
</div>