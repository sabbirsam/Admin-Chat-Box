<?php

namespace ACB\Inc;
use \ACB\Inc\Ajax_Parts\ACB_MessageCreation;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * All Ajax call here
 */
class ACB_AjaxHandler {

    public function __construct() {
        $this->events();
    }

    public function events() {
        
        add_action( 'wp_ajax_acb_data_truncate', array( $this, 'ACB_message_truncate' ) ); 
        add_action("wp_ajax_nopriv_acb_data_truncate", array( $this, 'ACB_message_truncate'));
        
        /* Demo check Creation */
        add_action( 'wp_ajax_show_user_inputed_data', array( $this, 'ACB_message_creation' ) ); 
        add_action("wp_ajax_nopriv_show_user_inputed_data", array( $this, 'ACB_message_creation'));

        /**
         * Scale value
         */
        add_action( 'wp_ajax_store_acb_widget_scale_data', array( $this, 'ACB_store_acb_widget_scale_data' ) ); 
        add_action("wp_ajax_nopriv_store_acb_widget_scale_data", array( $this, 'ACB_store_acb_widget_scale_data'));

      

        
    }
    /**Chat data truncate */
       function ACB_message_truncate() {
        $ACB_message_truncate = new ACB_MessageCreation();
        $ACB_message_truncate->ACB_message_truncate(); 
    }


    /**Chat data fetch */
    function ACB_message_creation() {
        $ACB_message_creation = new ACB_MessageCreation();
        $ACB_message_creation->ACB_message_creation();  
    }

  
    /**Chat data fetch */
    function ACB_store_acb_widget_scale_data() {
        $ACB_store_acb_widget_scale_data = new ACB_MessageCreation();
        $ACB_store_acb_widget_scale_data->ACB_store_acb_widget_scale_data();  
    }

  

}