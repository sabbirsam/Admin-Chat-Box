<?php

namespace ACB\Inc\Ajax_Parts;
use \ACB\Inc\ACB_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class ACB_MessageCreation {

    public function __construct() {
        /**
         * Demo tets
         */
        $this->ACB_message_creation();
       
    }

    /**
     * delete
     */
    public function ACB_message_creation() {
            global $wpdb;
            $wpdb->hide_errors();
            $table=$wpdb->prefix. 'acb_admin_chat_box';
            $fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC" ); 
            
            foreach ($fetch as $row) {
                ?>
<span class="nick" style="color: black"><?php echo $row->sender ?></span>: <span class="msg"><?php echo $row->msg ?>
    <br>
    <span style="font-size:10px;color:#5a3c04;">
        <br>
        <?php echo $row->date ?>
        <br>
    </span>
</span>
<br />
<?php
          
}  
die();     
}}