<?php

namespace ACB\Inc\Ajax_Parts;
use \ACB\Inc\ACB_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * Ajax handle
 */
class ACB_MessageCreation {

    public function __construct() {
        /**
         * Message fetch from database
         */
        $this->ACB_message_truncate();
        $this->ACB_message_creation();
    }
    public function ACB_message_truncate() {
        if (sanitize_text_field($_POST['action']) == 'acb_data_truncate') {
             /**
             * Sanitize all drag drop data
             */
            $ac_frontend = sanitize_text_field ($_POST['acb_frontend']);
            $ac_backend = sanitize_text_field ($_POST['acb_backend']);
            $ac_position = sanitize_text_field ($_POST['acb_position']);
            $ac_customization = sanitize_text_field ($_POST['acb_customization']);
            $ac_bg_color_value = sanitize_text_field ($_POST['bg_color_value']);
            $ac_left_pos_value = sanitize_text_field ($_POST['left_pos_value']);
            $right_pos_value = sanitize_text_field ($_POST['right_pos_value']);

            /**
             * 
             */
            $acb_frontend =  isset( $ac_frontend ) ? $ac_frontend :'';
            $acb_backend =  isset( $ac_backend ) ? $ac_backend :'';
            $acb_position =  isset( $ac_position ) ? $ac_position :'';
            $acb_customization = isset( $ac_customization ) ? $ac_customization :'';
            $bg_color_value =  isset( $ac_bg_color_value ) ? $ac_bg_color_value :'';
            $left_pos_value =  isset( $ac_left_pos_value ) ? $ac_left_pos_value :'';
            $right_pos_value =  isset( $right_pos_value ) ? $right_pos_value :'';

            /**
             * Array
             */
            $settings_page = array(
                'acb_frontend_settings'=>$acb_frontend,
                'acb_backend_settings'=>$acb_backend,
                'acb_position_settings'=>$acb_position,
                'acb_customization_settings'=>$acb_customization,
                'acb_bg_color_value_settings'=>$bg_color_value,
                'acb_left_pos_value_settings'=>$left_pos_value,
                'acb_right_pos_value_settings'=>$right_pos_value,
            );
            if($settings_page){
                update_option( 'acb_settings_value', json_encode($settings_page));
                die();
            }
        }
    }
    /**
     * Fetch data from db 
     */
    public function ACB_message_creation() {
        $permission = check_ajax_referer('acb_msg_post_nonce', 'nonce', false);
        if($permission ){
            global $wpdb;
            $wpdb->hide_errors();
            $table=$wpdb->prefix. 'acb_admin_chat_box';
            $fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC" ); 
            
            foreach ($fetch as $test){
                $all_data = $test->data;
                $manage = json_decode($all_data);
                ?>
<span class="nick" style="color: black"><?php echo esc_html($manage->acb_user_name); ?></span>: <span
    class="msg"><?php echo esc_html($manage->acb_user_msg); ?>
    <br>
    <span style="font-size:10px;color:#5a3c04;">
        <?php echo date("M d, Y > h:i A", strtotime(esc_html($manage->acb_msg_date))); ?>
        <br>
    </span>
</span>
<br />
<?php
                    
     }
    } 
  die();     
 }
                
}