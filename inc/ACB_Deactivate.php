<?php

namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');
/**
 * Deactivated plugin
 */
class ACB_Deactivate{

    public static function ACB_deactivate(){ 
        flush_rewrite_rules();
    }
}