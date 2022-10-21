<?php
/**
 * @package  
 */
namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * All path generated
 */
class ACB_BaseController
{
    public $plugin_url;
    public $plugin;
    public function __construct() {
	    $this->plugin_url = plugin_dir_url( dirname( __FILE__, 1 ) ); //admin-chat-box/
        $this->plugin = plugin_dir_url(__FILE__); // inc/
    }

}