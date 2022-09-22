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
        $this->ACB_message_creation();
       
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
}}