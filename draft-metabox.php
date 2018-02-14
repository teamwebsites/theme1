<?php 

add_action( 'add_meta_boxes', 'cd_meta_box_add' );
function cd_meta_box_add()
{
    add_meta_box( 'my-meta-box-id', 'Privacy & Safeguarding', 'cd_meta_box_cb', array('page', 'wpcm_player'), 'side', 'high' );
}

function cd_meta_box_cb()
{
    // $post is already set, and contains an object: the WordPress post
    global $post;
    $values = get_post_custom( $post->ID );
    $text = isset( $values['my_meta_box_text'] ) ? $values['my_meta_box_text'] : '';
    $selected = isset( $values['my_meta_box_select'] ) ? esc_attr( $values['my_meta_box_select'] ) : '';
    $check = isset( $values['hide_player_details'] ) ? esc_attr( $values['hide_player_details'] ) : '';
     
    // We'll use this nonce field later on when saving.
    wp_nonce_field( 'my_meta_box_nonce', 'meta_box_nonce' );
    ?>
    
    <script>$('#radios').radiosToSlider({
    animation: true,
});</script>

<?php if( get_post_type() == 'page' ) : ?>

<div class="switch">
      <input type="radio" class="switch-input week" name="view" value="week" id="hidden">
      <label for="week" class="switch-label switch-label-off onswitch">Hide</label>
      <input type="radio" class="switch-input" name="view" value="month" id="month" checked>
      <label for="month" class="switch-label switch-label-on offswitch">Public</label>
      <span class="switch-selection"></span>
</div>

<span style="display: block; clear: both; font-size: 10px !important;">If hidden, the contents of this page will be hidden unless users are logged in.</span>

<?php endif; ?>

<?php if( get_post_type() == 'wpcm_player' ) : ?>

<span style="display: block; clear: both; font-size: 10px !important;">If hidden, the player's details, via the player's individual profile page, will be hidden unless users are logged in.</span>

<?php endif; ?>
    
    <style>
    
    .week:checked + label {font-weight: normal !important; background: #a2a2a2 !important; color: #eee !important;} #month:checked + label {color: #eee !important; font-weight: normal !important; background: #24ab41 !important;}
    
    .switch-input:checked:before {margin: 0px; display: none !important;}
    
    .switch .onswitch {left: 0px; top: 1px;}
    
    .switch input {height: 100%;}
    
    .switch .offswitch {right: 0px !important; top: 1px !important;}
    
    .switch label {width: 50% !important; position: absolute; float: left; clear: none; padding: 0px !important; margin: 0px !important;}
    
    .switch {margin: 9px 0px !important; position: relative;}
    
    .switch-input{margin: 0px !important; padding: 0px !important; border:none !important; z-index: 11; position: relative; background: transparent !important; box-shadow: none !important; float: left; width: 50% !important;}
    
    .switch {
  position: relative;
  height: 26px;
  width: 120px;
  margin: 20px auto;
  background: rgba(0, 0, 0, 0.25);
  border-radius: 3px;
  -webkit-box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
  box-shadow: inset 0 1px 3px rgba(0, 0, 0, 0.3), 0 1px rgba(255, 255, 255, 0.1);
}

.switch-label {
  position: relative;
  z-index: 2;
  float: left;
  width: 58px;
  line-height: 26px;
  font-size: 11px;
  color: rgba(255, 255, 255, 0.35);
  text-align: center;
  cursor: pointer;
}
.switch-label:active {
  font-weight: bold;
}

.switch-label-off {
  padding-left: 2px;
}

.switch-label-on {
  padding-right: 2px;
}


.switch-input {
  display: none;
}
.switch-input:checked + .switch-label {
  font-weight: bold;
  color: rgba(0, 0, 0, 0.65);
  text-shadow: 0 1px rgba(255, 255, 255, 0.25);
  -webkit-transition: 0.15s ease-out;
  -moz-transition: 0.15s ease-out;
  -ms-transition: 0.15s ease-out;
  -o-transition: 0.15s ease-out;
  transition: 0.15s ease-out;
  -webkit-transition-property: color, text-shadow;
  -moz-transition-property: color, text-shadow;
  -ms-transition-property: color, text-shadow;
  -o-transition-property: color, text-shadow;
  transition-property: color, text-shadow;
}
.switch-input:checked + .switch-label-on ~ .switch-selection {
  left: 60px;
  /* Note: left: 50%; doesn't transition in WebKit */
}

.switch-selection {
  position: absolute;
  z-index: 1;
  top: 2px;
  left: 2px;
  display: block;
  width: 58px;
  height: 22px;
  border-radius: 3px;
  background-color: #65bd63;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #9dd993), color-stop(100%, #65bd63));
  background-image: -webkit-linear-gradient(top, #9dd993, #65bd63);
  background-image: -moz-linear-gradient(top, #9dd993, #65bd63);
  background-image: -ms-linear-gradient(top, #9dd993, #65bd63);
  background-image: -o-linear-gradient(top, #9dd993, #65bd63);
  background-image: linear-gradient(top, #9dd993, #65bd63);
  -webkit-box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
  box-shadow: inset 0 1px rgba(255, 255, 255, 0.5), 0 0 2px rgba(0, 0, 0, 0.2);
  -webkit-transition: left 0.15s ease-out;
  -moz-transition: left 0.15s ease-out;
  -ms-transition: left 0.15s ease-out;
  -o-transition: left 0.15s ease-out;
  transition: left 0.15s ease-out;
}
.switch-blue .switch-selection {
  background-color: #3aa2d0;
  background-image: -webkit-gradient(linear, left top, left bottom, color-stop(0%, #4fc9ee), color-stop(100%, #3aa2d0));
  background-image: -webkit-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -moz-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -ms-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: -o-linear-gradient(top, #4fc9ee, #3aa2d0);
  background-image: linear-gradient(top, #4fc9ee, #3aa2d0);
}</style>


     
    <?php if( get_post_type() == 'wpcm_player' ) : ?> 
     
    <p>
        <input type="checkbox" id="hide_player_details" name="hide_player_details" <?php checked( $check, 'on' ); ?> />
        <label for="hide_player_details" style="margin-top: 3.5px !important; display: inline-block;">Hide player details</label>
    </p>
    
    <?php else: ?>
    
    <?php endif; ?>
    
    <?php    
}

add_action( 'save_post', 'cd_meta_box_save' );
function cd_meta_box_save( $post_id )
{
    // Bail if we're doing an auto save
    if( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) return;
     
    // if our nonce isn't there, or we can't verify it, bail
    if( !isset( $_POST['meta_box_nonce'] ) || !wp_verify_nonce( $_POST['meta_box_nonce'], 'my_meta_box_nonce' ) ) return;
     
    // if our current user can't edit this post, bail
    if( !current_user_can( 'edit_post' ) ) return;
     
    // now we can actually save the data
    $allowed = array( 
        'a' => array( // on allow a tags
            'href' => array() // and those anchors can only have href attribute
        )
    );
     
    // Make sure your data is set before trying to save it
    if( isset( $_POST['my_meta_box_text'] ) )
        update_post_meta( $post_id, 'my_meta_box_text', wp_kses( $_POST['my_meta_box_text'], $allowed ) );
         
    if( isset( $_POST['my_meta_box_select'] ) )
        update_post_meta( $post_id, 'my_meta_box_select', esc_attr( $_POST['my_meta_box_select'] ) );
        
         
    // This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['my_meta_box_check'] ) && $_POST['my_meta_box_select'] ? 'on' : 'off';
    update_post_meta( $post_id, 'my_meta_box_check', $chk );
    
    // This is purely my personal preference for saving check-boxes
    $chk = isset( $_POST['hide_player_details'] ) && $_POST['hide_player_details'] ? 'on' : 'off';
    update_post_meta( $post_id, 'hide_player_details', $chk );
}

?>