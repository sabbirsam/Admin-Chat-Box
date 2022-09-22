<?php
/**
 * 
 */
namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * Activate class here
 */
class ACB_Activate{

    public static function ACB_activate(){ //make it static so I can call it direct on a function
        flush_rewrite_rules();
    }
}