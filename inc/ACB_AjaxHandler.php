<?php

namespace ACB\Inc;
use \ACB\Inc\Ajax_Parts\ACB_MessageCreation;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class ACB_AjaxHandler {

    public function __construct() {
        $this->events();
    }

    public function events() {
        /* Demo check Creation */
        add_action( 'wp_ajax_show_user_inputed_data', array( $this, 'ACB_message_creation' ) ); 
        add_action("wp_ajax_nopriv_show_user_inputed_data", array( $this, 'ACB_message_creation'));
        
        
    }

    /**Demo check Creation */
    function ACB_message_creation() {
        $ACB_message_creation = new ACB_MessageCreation();
        $ACB_message_creation->ACB_message_creation();
        
    }

}