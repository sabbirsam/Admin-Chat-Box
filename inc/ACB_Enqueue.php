<?php

namespace ACB\Inc;

use \ACB\Inc\ACB_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * All Enqueue here
 */
class ACB_Enqueue extends ACB_BaseController{

    function register(){
        add_action( 'admin_enqueue_scripts', array( $this, 'ACB_admin_enqueue' ) ); 
    }

    public function ACB_admin_enqueue($screen){
        /**
         * Global all screen loaded file
         */
        if("toplevel_page_admin_chat_box" == $screen ){

            wp_enqueue_script( 'acb_bootstrap_min_js', $this->plugin_url .'assets/library/bootstrap.min.js',array('jquery'),1.0,true );
            wp_enqueue_script( 'acb_chat_js', $this->plugin_url . 'assets/admin/js/chat.js',array('jquery'),1.0,true ); 
            wp_enqueue_script( 'acb_admin_js', $this->plugin_url .'assets/admin/js/show_message.js', array('jquery'),1.0,true );
            wp_localize_script( 'acb_admin_js', 'show_user_inputed_data', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
                ) );
                wp_enqueue_script('jquery');
                wp_enqueue_script('acb_admin_js');    
                wp_enqueue_style( 'acb_chat_style', $this->plugin_url . 'assets/admin/css/chat.css' );    
                wp_enqueue_style( 'acb_main_css_style', $this->plugin_url . 'assets/admin/css/acb_styleSheet.css' );    
                
            
        }
    
    }

}
        