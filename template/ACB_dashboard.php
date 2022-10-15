<?php 
if ( is_user_logged_in() ) {
    /**
     * Get User name and email
     */
    $user = wp_get_current_user();
    $email = esc_attr($user->user_email);
    $name = esc_attr($user->display_name);  
    /**
    * Get Option page value for the backend setting
    **/  
    $get_settings = get_option( 'acb_settings_value');
    $settings_update = json_decode($get_settings);
    /**
     * Escappint
     */
    
    // $front_end = esc_attr($settings_update->acb_frontend_settings);
    $front_end = $settings_update->acb_frontend_settings;
     $update_front_end =isset( $front_end ) ?  $front_end :'0';

    $backend_settings =$settings_update->acb_backend_settings;
     $update_backend_settings =isset( $backend_settings ) ?  $backend_settings :'1';

    $pos_value_settings =$settings_update->acb_position_settings;
     $update_pos_value_settings =isset( $pos_value_settings ) ?  $pos_value_settings :'1';

    $customization_value_settings = $settings_update->acb_customization_settings;
     $update_customization_value_settings =isset( $customization_value_settings ) ?  $customization_value_settings :'1';

    $bg_color_value_settings = $settings_update->acb_bg_color_value_settings;
     $update_bg_color_value_settings =isset( $bg_color_value_settings ) ?  $bg_color_value_settings :'#5A5EB9';

    $left_pos_value_settings = $settings_update->acb_left_pos_value_settings;
     $update_left_pos_value_settings =isset( $left_pos_value_settings ) ?  $left_pos_value_settings :'0';

    $right_pos_value_settings = $settings_update->acb_right_pos_value_settings;
     $update_right_pos_value_settings =isset( $right_pos_value_settings ) ?  $right_pos_value_settings :'1';

    /**
     * Get all the chat information
     */
    if(isset($_POST['msg'])){
        $acb_sanitiz_msg = sanitize_text_field ($_POST['msg']);
        $msg =isset( $acb_sanitiz_msg ) ?  $acb_sanitiz_msg :''; 
        $date = date('Y-m-d H:i:s');

        $raw_input_data = array(
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
    ?>
<div style="align:center"><br />
    <span class="heading"><?php _e("Chat Box","acb");?></span><br />
    <h2><?php _e("Settings Page","acb");?></h2>
    <!-- setting page  -->
    <!-- frontend page  -->
    <div class="card">
        <label class="switch" for="acb_frontend">
            <span class="toggle-label"><?php _e("Chat BoxActivate frontend widgets:","acb");?></span>
            <input type="checkbox" id="acb_frontend" <?php if($front_end == 1){echo _e("checked","acb");}?>
                value="<?php echo esc_attr( $update_front_end,'acb' ) ?>">
            <span class="slider round"></span>
        </label>
        <br>
        <br>
        <!-- Backend page  -->
        <label class="switch" for="acb_backend">
            <span class="toggle-label"><?php _e("Active Backend widgets:","acb");?></span>
            <input type="checkbox" id="acb_backend" <?php if($backend_settings == 1){echo _e("checked","acb");}?>
                value="<?php echo esc_attr( $update_backend_settings,'acb' ) ?>">
            <span class="slider round"></span>
        </label>
        <br>
        <br>
        <!-- Position page  -->
        <label class="switch" for="acb_position">
            <span class="toggle-label"><?php _e("Set position:","acb");?></span>
            <input type="checkbox" id="acb_position" <?php if($pos_value_settings == 1){echo _e("checked","acb");}?>
                value="<?php echo esc_attr( $update_pos_value_settings,'acb' )  ?>">
            <span class="slider round"></span>
        </label>
        <!-- button position  -->
        <div class="left-right-btn" id="left-right-btn-id">
            <span class="c-button c-button--arrow-left" id="arrow-left"
                value="<?php echo esc_attr( $update_left_pos_value_settings,'acb' ) ?>" style="display:none"
                tabindex="0">
                <span class="c-button__text"><?php _e("left","acb");?></span>
            </span>
            <span class="c-button c-button--arrow-right" id="arrow-right"
                value="<?php echo esc_attr( $update_right_pos_value_settings,'acb' ) ?>" style="display:none"
                tabindex="0">
                <span class="c-button__text"><?php _e("right","acb");?></span>
            </span>
        </div>
        <!-- button position end -->
        <br>
        <br>
        <!-- Customization page  -->
        <label class="switch" for="acb_customization">
            <span class="toggle-label"><?php _e("Customization:","acb");?></span>
            <input type="checkbox" id="acb_customization"
                <?php if($customization_value_settings == 1){echo _e("checked","acb");}?>
                value="<?php echo esc_attr( $update_customization_value_settings,'acb' ) ?>">
            <span class="slider round"></span>
        </label>
        <div class="left-right-btn" id="left-right-btn-id">
            <span class="color-picker">
                <label for="acb_colorPicker"><?php _e("Choose Header color:","acb");?>
                    <input type="color" value="<?php echo esc_attr( $update_bg_color_value_settings,'acb' ) ?>"
                        id="acb_colorPicker" style="display:none">
                </label>
            </span>
        </div>
        <br>
        <br>
        <br>
        <br>
        <label class="switch setting" for="acb_save_settings">
            <span class="toggle-label"><?php _e("Save setting:","acb");?></span>
            <button id="acb_save_settings">SAVE</button>
        </label>

    </div>
    <!-- setting page  -->
    <?php 
?>
    <br /><br />
    <br />
    <?php if($backend_settings == 1):?>
    <div id="chat-circle" class="btn btn-raised"
        style="background:<?php echo esc_attr( $update_bg_color_value_settings,'acb' ) ?>">

        <div id="chat-overlay"></div>
        <i class="material-icons"><?php _e("▶Snap","acb");?></i>
    </div>

    <div class="chat-box" id="sam">
        <div class="chat-box-header" id="cbox-header"
            style="background:<?php echo esc_attr( $update_bg_color_value_settings,'acb' ) ?>">
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
    <?php endif;?>
</div>
</div>
<?php
}
else {
?>
<span class="heading"><?php _e("Sorry need to login on the admin account","acb")?></span><br />
<script>
if (window.history.replaceState) {
    window.history.replaceState(null, null, window.location.href);
}
</script>

<?php
}
?>