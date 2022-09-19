<?php

namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class ACB_AdminDashboard{
    function __construct(){
        add_action("admin_menu", array($this, 'add_admin_pages'));
    }

    public function add_admin_pages(){
        add_menu_page( 
            'Admin-Chat-Box', //page title
            'Admin-Chat-Box',  //menus title
            'manage_options', //capa
            'admin_chat_box', //slug
            array($this, 'ACB_chat_pages'),//function 
            'dashicons-welcome-widgets-menus',
                90 );
       
    }
  
    public function ACB_chat_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/ACB_dashboard.php';
    }

}