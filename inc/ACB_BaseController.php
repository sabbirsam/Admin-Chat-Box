<?php
/**
 * @package  
 */
namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

class ACB_BaseController
{
    public $plugin_path;
    public $plugin_url;
    public $plugin;
    public function __construct() {
        $this->plugin_path = plugin_dir_path( dirname( __FILE__, 1 ) );  // for add php file
	    $this->plugin_url = plugin_dir_url( dirname( __FILE__, 1 ) );  //for css, js
        $this->plugin = plugin_basename( dirname( __FILE__, 2 ) ) . '/simpleform.php';  //For Setting
    }

}