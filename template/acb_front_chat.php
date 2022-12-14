<?php
/**
 * Get User name and email
 */
$user = wp_get_current_user();
$acb_user_id= get_current_user_id();
$email = esc_attr($user->user_email);
$name = esc_attr($user->display_name);   
/**
 * Get Option page value for the backend setting
 **/                        
$get_settings = get_option( 'acb_settings_value');
$settings_update = json_decode($get_settings);

$front_end = $settings_update->acb_frontend_settings;
$update_front_end =isset( $front_end ) ?  $front_end :'0';

$bg_color_value_settings = $settings_update->acb_bg_color_value_settings;
$update_bg_color_value_settings =isset( $bg_color_value_settings ) ?  $bg_color_value_settings :'#5A5EB9';

$left_pos_value_settings = $settings_update->acb_left_pos_value_settings;
$update_left_pos_value_settings =isset( $left_pos_value_settings ) ?  $left_pos_value_settings :'0';

$right_pos_value_settings = $settings_update->acb_right_pos_value_settings;
$update_right_pos_value_settings =isset( $right_pos_value_settings ) ?  $right_pos_value_settings :'1';
// $set_get_scale_settings = get_option( 'acb_scale_settings_value');
// $get_scale_settings = substr($set_get_scale_settings, 1, -1);


/**
 * Condition to check the position
 */
if($left_pos_value_settings == 1){
    $value = 'left:15px;';
}

if($right_pos_value_settings == 1){
    $value = 'right:10px;';
}
$pos_value = isset( $value ) ?  $value :'right:15px';

/**
 * Get all the chat information
 */
if(isset($_POST['msg'])){
    $acb_sanitiz_msg = sanitize_text_field ($_POST['msg']);
        $msg =isset( $acb_sanitiz_msg ) ?  $acb_sanitiz_msg :''; 
        $date = date('Y-m-d H:i:s');

        $raw_input_data = array(
            'user_id'=>$acb_user_id,
            'acb_user_email'=>$email,
            'acb_user_name'=>$name,
            'acb_user_msg'=>$msg,
            'acb_msg_date'=>$date,
        );
        $input_data = json_encode( $raw_input_data);

    if ($msg) {
        $permission = check_ajax_referer('acb_msg_post_nonce', 'nonce', false);
        global $wpdb;
        $table=$wpdb->prefix. 'acb_admin_chat_box';
        $data = array('data' => $input_data);
        $format = array('%s');
        $wpdb->insert($table,$data,$format);
        $save = $wpdb->insert_id;
    }
}
if ( is_user_logged_in() ) {
    
if($front_end == 1):
?>
<div id="chat-circle" class="btn btn-raised"
    style="<?php echo esc_attr($pos_value, 'acb') ?>; background:<?php echo esc_attr( $update_bg_color_value_settings,'acb' ) ?>">
    <i class="fa fa-comments"></i>
    <div id="chat-overlay"></div>
</div>

<div class="chat-box" id="sam" style="<?php echo esc_attr($pos_value, 'acb') ?>">
    <div class="chat-box-header" id="cbox-header"
        style="background:<?php echo esc_attr( $update_bg_color_value_settings,'acb') ?>">
        <span value="<?php echo esc_attr($user->display_name) ?>" class="chat-box-toggles"
            id="acb_display_name"><?php echo esc_attr("Welcome ".$user->display_name);?></span>
        <span class="chat-box-toggle"><?php _e("X","acb");?></span>
    </div>
    <div class="chat-box-body" id="vegan">
        <div class="chat-box-overlay">
        </div>
        <div class="chat-logs">
        </div>
        <!--chat-log -->
    </div>
    <form method="post" action="" id="acb_Form">
        <div class="chat-input">
            <input type="text" id="incoming_id" name="incoming_id" value="<?php echo esc_attr( $acb_user_id,'acb' ) ?>"
                hidden>
            <input name="msg" id="msg" class="fields" type="text" placeholder="Enter Your Message"
                data-nonce="<?php echo wp_create_nonce('acb_msg_post_nonce') ?>" required="required" />
            <input type="submit" value="???" class="commandButton chat-submit" />
    </form>
</div>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
<?php 
endif;
}