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
        if (sanitize_text_field($_POST['action']) != 'acb_data_truncate') {
            die();
        }
            $acb_frontend = $_POST['acb_frontend'];
            $acb_backend = $_POST['acb_backend'];
            $bg_color_value = $_POST['bg_color_value'];
            $left_pos_value = $_POST['left_pos_value'];
            $right_pos_value = $_POST['right_pos_value'];

            $settings_page = array(
                'acb_frontend_settings'=>$acb_frontend,
                'acb_backend_settings'=>$acb_backend,
                'acb_bg_color_value_settings'=>$bg_color_value,
                'acb_left_pos_value_settings'=>$left_pos_value,
                'acb_right_pos_value_settings'=>$right_pos_value,
            );

            update_option( 'acb_settings_value', json_encode($settings_page));
            
            // print_r($settings_page);

            // $a= get_option( 'acb_settings_value'); 

            // if(is_array($a)){
            //     update_option( 'acb_settings_value', $settings_page );
            // }  
            
       

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
            
            foreach ($fetch as $row) {
                ?>
<span class="nick" style="color: black"><?php echo esc_html($row->sender); ?></span>: <span
    class="msg"><?php echo esc_html($row->msg); ?>
    <br>
    <span style="font-size:10px;color:#5a3c04;">
        <br>

        <?php echo date("M d, Y > h:i A", strtotime(esc_html($row->date))); ?>
        <br>
    </span>
</span>
<br />
<?php
                    
            } } 
            die();     
            }
            


}