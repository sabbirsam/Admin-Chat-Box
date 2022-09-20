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

            // $user = get_user_by( 'id', get_current_user_id() );
            // $email = get_user_meta( $user->ID, 'email', true );
              // $userdata= $wpdb->get_results("SELECT wp_users.user_login, wp_users.user_email, firstmeta.meta_value as first_name, lastmeta.meta_value as last_name FROM wp_users left join wp_usermeta as firstmeta on wp_users.ID = firstmeta.user_id and firstmeta.meta_key = 'first_name' left join wp_usermeta as lastmeta on wp_users.ID = lastmeta.user_id and lastmeta.meta_key = 'last_name'
            // "); 
              // $table2=$wpdb->prefix. 'usermeta';
            
            global $wpdb;
            $wpdb->hide_errors();
            $table=$wpdb->prefix. 'acb_admin_chat_box';
            $fetch= $wpdb->get_results("SELECT * FROM  $table ORDER BY id DESC"); 

            print_r($fetch);


    }

    

}