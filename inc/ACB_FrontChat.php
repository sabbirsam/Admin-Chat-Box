<?php

namespace ACB\Inc;
use \ACB\Inc\ACB_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * Admin dashboard created 
 */
class ACB_FrontChat extends ACB_BaseController{
    function __construct(){
        add_action( 'wp_enqueue_scripts', array( $this, 'ACB_public_enqueue' ) ); 
        add_action("wp_head", array($this, 'add_chatbox_front_widget'));
    }
    
    public function ACB_public_enqueue(){
        /**
         * Chat box text fetch
         * 
         */
        $plugin_url = plugin_dir_url( __FILE__ );
       
        wp_enqueue_script( 'acb_pub_bootstrap_min_js', $plugin_url .'../assets/library/bootstrap.min.js',array('jquery'),1.0,true );
        wp_enqueue_script( 'acb_pub_seeetalert_min_js', $plugin_url .'../assets/library/sweetalert2@11.js',array('jquery'),1.0,true );
        
        wp_enqueue_script( 'acb_public_js', $plugin_url .'../assets/public/js/show_message.js', array('jquery'),1.0,true );
        wp_localize_script( 'acb_public_js', 'show_user_inputed_data', array(
            'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
        wp_enqueue_script('jquery');
        wp_enqueue_script('acb_public_js'); 
        
        wp_enqueue_style( 'acb_pub_main_css_style', $plugin_url . '../assets/public/css/acb_styleSheet.css' );     
        wp_enqueue_style( 'acb_pub_chat_style',  $plugin_url . '../assets/public/css/chat.css' );  
       
    }

    public function add_chatbox_front_widget(){
        $file = plugin_dir_path(__FILE__).'../template/acb_front_chat.php';

        if(file_exists($file)){
            load_template($file,true );
        }
    }

}