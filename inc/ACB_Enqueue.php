<?php

namespace ACB\Inc;

use \ACB\Inc\ACB_BaseController;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class ACB_Enqueue extends ACB_BaseController{

    function register(){
        add_action( 'admin_enqueue_scripts', array( $this, 'ACB_admin_enqueue' ) ); 
        add_action( 'wp_enqueue_scripts', array( $this, 'ACB_public_enqueue' ) ); 
        add_action( 'admin_enqueue_scripts', array( $this, 'ACB_core_enqueue' ) );

    }

    public function ACB_core_enqueue($screen)
    {    
        if("toplevel_page_simple_form" == $screen || "simple-form_page_create_form" == $screen || "simple-form_page_form_data" == $screen){
             wp_enqueue_script( 'jquery-ui-sortable', false, array('jquery') );        
             wp_enqueue_script( 'jquery-ui-tabs', false, array('jquery') );
        }
    
    }


    public function ACB_admin_enqueue($screen){
        /**
         * Global all screen loaded file
         */
        if("toplevel_page_simple_form" == $screen || "simple-form_page_create_form" == $screen || "simple-form_page_form_data" == $screen){
            wp_enqueue_script( 'simple_form_drag_drop_js', $this->plugin_url . 'src/library/form-builder.js',null,1.0,true ); 
            wp_enqueue_script( 'simple_form_bootstrap_min_js', $this->plugin_url .'src/library/bootstrap.min.js',array('jquery'),1.0,true );
            wp_enqueue_script( 'simple_form_sweetalert_js', $this->plugin_url . 'src/library/sweetalert2@11.js',array('jquery'),1.0,true );  
        }
        
        /**
         * Global Data Table
         */
        if("toplevel_page_simple_form" == $screen || "simple-form_page_form_data" == $screen){
            wp_enqueue_script( 'simple_form_query_dataTables_min_js', $this->plugin_url .'src/library/jquery.dataTables.min.js',array('jquery'),1.0,true );// datatable
            wp_enqueue_script( 'simple_form_bootstrap.bundle.min.js', $this->plugin_url .'src/library/bootstrap.bundle.min.js',array('jquery'),1.0,true );//for action to edit/delete
            
            wp_enqueue_style( 'simple_form_jquery_dataTables.min', $this->plugin_url .'src/library/jquery.dataTables.min.css' ); // datatable
            wp_enqueue_style( 'simple_form_bootstrap.css', $this->plugin_url .'src/library/bootstrap.min.css' );// datatable   
            wp_enqueue_style( 'simple_form_dataTables.bootstrap4.min.css', $this->plugin_url . 'src/library/dataTables.bootstrap4.min.css' ); // datatable
        }


        /**
         * Dashboard user input data show
         */
        if("toplevel_page_simple_form" == $screen){
            wp_enqueue_style( 'simple_form_admin_css', $this->plugin_url .'src/admin/css/ACB_admin_style.css');
            wp_enqueue_script( 'simple_form_admin_js', $this->plugin_url .'src/admin/js/ACB_admin_script.js', array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_admin_js', 'show_user_inputed_data', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
                ) );
                wp_enqueue_script('jquery');
                wp_enqueue_script('simple_form_admin_js');    


            wp_enqueue_style( 'simple_form_main2_css_style', $this->plugin_url . 'src/admin/css/form_data.css' );
              
        }
        /**
         * Form create page
         */
        if("simple-form_page_create_form" == $screen ){
            wp_register_script( 'simple_form_main_js', $this->plugin_url . 'src/admin/js/simple_form_create.js',array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_main_js', 'simple_message_form_submission', array( 

                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('simple_form_main_js');
            
            wp_enqueue_style( 'simple_form_main_css_style', $this->plugin_url . 'src/admin/css/simple_form_create.css' );            
        }
    
        /**
         * Data show
         */
        if("simple-form_page_form_data" == $screen ){
            /**
             * Edit form 
             */
            wp_register_script( 'ACB_main_edit_js', $this->plugin_url . 'src/admin/js/edit_form_data.js',array('jquery'),1.0,true );
            wp_localize_script( 'ACB_main_edit_js', 'edit_data_id', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('ACB_main_edit_js');
            
             /**
             * Delete
             */
            wp_register_script( 'simple_form_main2_jss', $this->plugin_url . 'src/admin/js/form_data.js',array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_main2_jss', 'simple_message_delete_form', array( 
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('simple_form_main2_jss');
            /**
             * Update Edit Form
             */
            wp_register_script( 'simple_form_main_js', $this->plugin_url . 'src/admin/js/simple_form_create.js',array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_main_js', 'simple_message_form_submission', array( 
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            wp_enqueue_script('simple_form_main_js');
             
            wp_enqueue_style( 'simple_form_main2_css_style', $this->plugin_url . 'src/admin/css/form_data.css' );
            
           
        }

    }

    
     /**
     * Frontend form
     */
    public function ACB_public_enqueue(){
            wp_enqueue_script( 'simple_form_sweetalerts_js', $this->plugin_url . 'src/library/sweetalert2@11.js',array('jquery'),1.0,true );
            wp_enqueue_style( 'simple_form_public_css',  $this->plugin_url .'src/public/sf_public_style.css');
            wp_enqueue_script( 'simple_form_public_js',  $this->plugin_url .'src/public/sf_public_script.js', array('jquery'),1.0,true );
            wp_localize_script( 'simple_form_public_js', 'ACB_contact_form_submission', array(
                'ajaxurl'=>admin_url("admin-ajax.php", null)
            ) );
            wp_enqueue_script('jquery');
            
    }

}