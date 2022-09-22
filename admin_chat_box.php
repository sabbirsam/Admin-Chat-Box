<?php
/**
 * Plugin Name: Admin Chat Box
 *
 * @author            Sabbir Sam, devsabbirahmed
 * @copyright         2022- devsabbirahmed
 * @license           GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: Admin Chat Box
 * Plugin URI: https://github.com/sabbirsam/Admin-Chat-Box
 * Description: 
 * Version:           1.0.3
 * Requires at least: 5.9 or higher
 * Requires PHP:      5.4 or higher
 * Author:            SABBIRSAM
 * Author URI:        https://github.com/sabbirsam/
 * Text Domain:       acb
 * Domain Path: /languages/
 * License:           GPL v2 or later
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * 
 */

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

if (file_exists(dirname(__FILE__).'/vendor/autoload.php')) {
    require_once dirname(__FILE__).'/vendor/autoload.php';
}

use ACB\Inc\ACB_Enqueue;
use ACB\Inc\ACB_DbTables;
use ACB\Inc\ACB_Activate;
use ACB\Inc\ACB_Deactivate;
use ACB\Inc\ACB_AjaxHandler;
use ACB\Inc\ACB_BaseController;
use ACB\Inc\ACB_AdminDashboard;


if(!class_exists('ACB_AdminChatBox')){
    class ACB_AdminChatBox{
        public $admin_chat_box;
        public function __construct(){
            $this->includes();
            $this->admin_chat_box = plugin_basename(__FILE__); 
        }
        function register(){
            add_action("plugins_loaded", array( $this, 'acb_load' )); 
        }
        function acb_load(){
            load_plugin_textdomain('acb', false,dirname(__FILE__)."languages");
        }
        /**
         * Classes 
         */
        public function includes() {
            new ACB_AdminDashboard(); 
            $enqueue=new ACB_Enqueue();
            $enqueue->register();
            new ACB_DbTables();
            new ACB_BaseController();
            new ACB_AjaxHandler();

        }
        function acb_activate(){   
            ACB_Activate::acb_activate();
        }
        function acb_deactivate(){ 
            ACB_Deactivate::acb_deactivate(); 
        }
    }
    $acb = new ACB_AdminChatBox;
    $acb ->register();
    register_activation_hook (__FILE__, array( $acb, 'acb_activate' ) );
    register_deactivation_hook (__FILE__, array( $acb, 'acb_deactivate' ) );
}