<?php

namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * Admin dashboard created 
 */
class ACB_AdminDashboard{
    function __construct(){
        add_action("admin_menu", array($this, 'add_chatbox_pages'));
    }
    public function add_chatbox_pages(){
        // $icon = plugins_url( 'admin-chat-box/assets/img/chat.png');
        $icon = plugin_dir_url(__FILE__).'../assets/img/chat.png';
        add_menu_page( 
            __( 'Admin-Chat-Box', 'acb' ),
            __( 'Admin-Chat-Box', 'acb' ),
            'read',
            'admin_chat_box',
            array($this, 'ACB_chat_pages'),
            $icon,
            3 );  
    }
  
    public function ACB_chat_pages()
    {
        require_once plugin_dir_path(__FILE__).'../template/ACB_dashboard.php';
    }

}