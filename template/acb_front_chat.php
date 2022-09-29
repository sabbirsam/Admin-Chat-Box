<?php
$user = wp_get_current_user();
$email = $user->user_email;
$name = $user->display_name;                           
$get_settings = get_option( 'acb_settings_value');
$settings_update = json_decode($get_settings);
$front_end = $settings_update->acb_frontend_settings;
$bg_color_value_settings = $settings_update->acb_bg_color_value_settings;
$left_pos_value_settings = $settings_update->acb_left_pos_value_settings;
$right_pos_value_settings = $settings_update->acb_right_pos_value_settings;
if($left_pos_value_settings == 1){
    $value = 'left:15px';
}
if($right_pos_value_settings == 1){
    $value = 'right:10px';
}
if(isset($_POST['msg'])){
    $acb_sanitiz_msg = sanitize_text_field ($_POST['msg']);
    $msg =isset( $acb_sanitiz_msg ) ?  $acb_sanitiz_msg :''; 
    $date = date('Y-m-d H:i:s');
    $time = date('g:i a');
    if ($msg) {
        $permission = check_ajax_referer('acb_msg_post_nonce', 'nonce', false);
        global $wpdb;
        $table=$wpdb->prefix. 'acb_admin_chat_box';
        $data = array('email' => $email, 'sender' => $name, 'msg' => $msg,'time' => $time,'date' => $date);
        $format = array('%s','%s','%s','%s','%s');
        $wpdb->insert($table,$data,$format);
        $save = $wpdb->insert_id;
    }
}
if($front_end == 1):
?>
<div id="chat-circle" class="btn btn-raised" style="<?php echo isset( $value ) ?  $value :'right:15px'; ?>">
    <div id=" chat-overlay"></div>
</div>
<div class="chat-box" id="sam" style="<?php echo isset( $value ) ?  $value :'right:10px'; ?>">
    <div class="chat-box-header" id="cbox-header"
        style="background:<?php echo isset( $bg_color_value_settings ) ?  $bg_color_value_settings :'#5A5EB9'; ?>">
        <span class="chat-box-toggles"><i
                class="material-icons"><?php echo esc_html("Welcome ".$user->display_name);?></i></span>
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
        <form method="post" action="" id="acb_Form">
            <div class="chat-input">
                <input name="msg" id="msg" class="fields" type="text" placeholder="Enter Your Message"
                    data-nonce="<?php echo wp_create_nonce('acb_msg_post_nonce') ?>" required="required"
                    style="height:50px;" size="60" />
                <input type="submit" value="▶" class="commandButton chat-submit" style="height:54px;" />
        </form>
</div>
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>
<?php 
endif;