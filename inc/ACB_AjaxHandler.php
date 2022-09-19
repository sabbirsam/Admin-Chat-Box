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
        /**
         * Form create
         */
        add_action( 'wp_ajax_simple_message_form_submission', array( $this, 'ACB_simple_message_form_submission' ) ); 
        add_action("wp_ajax_nopriv_simple_message_form_submission", array( $this, 'ACB_simple_message_form_submission'));
         /**
         * Form delete
         */
        add_action( 'wp_ajax_simple_message_delete_form', array( $this, 'ACB_simple_message_delete_form' ) ); 
        add_action("wp_ajax_nopriv_simple_message_delete_form", array( $this, 'ACB_simple_message_delete_form'));
         /**
         * Form Submission
         */
        add_action( 'wp_ajax_ACB_contact_form_submission', array( $this, 'ACB_contact_form_submission' ) ); 
        add_action("wp_ajax_nopriv_ACB_contact_form_submission", array( $this, "ACB_contact_form_submission"));
        /**
         * Form EDIT
         */
        add_action( 'wp_ajax_edit_data_id', array( $this, 'ACB_edit_data_id' ) ); 
        add_action("wp_ajax_nopriv_edit_data_id", array( $this, 'ACB_edit_data_id'));
        /**
         * update EDIT Data
         */
        add_action( 'wp_ajax_edit_data_id', array( $this, 'ACB_edit_data_id' ) ); 
        add_action("wp_ajax_nopriv_edit_data_id", array( $this, 'ACB_edit_data_id'));
        
    }

    /**Demo check Creation */
    function ACB_message_creation() {
        $ACB_message_creation = new ACB_MessageCreation();
        $ACB_message_creation->ACB_message_creation();
        
    }
    /**
     * Form create
     */
    function ACB_simple_message_form_submission() {
        $ACB_simple_message_form_submission = new ACB_MessageCreation();
        $ACB_simple_message_form_submission->ACB_simple_message_form_submission();
        
    }
    /**
     * Form Delete
    */
    function ACB_simple_message_delete_form() {
        $ACB_simple_message_delete_form = new ACB_MessageCreation();
        $ACB_simple_message_delete_form->ACB_simple_message_delete_form();
        
    }
    /**
     * Form Submission
    */
    function ACB_contact_form_submission() {
        $ACB_contact_form_submission = new ACB_MessageCreation();
        $ACB_contact_form_submission->ACB_contact_form_submission();
        
    }
    /**
     * Form EDIT
    */
    function ACB_edit_data_id() {
        $ACB_edit_data_id = new ACB_MessageCreation();
        $ACB_edit_data_id->ACB_edit_data_id();
        
    }

    
}