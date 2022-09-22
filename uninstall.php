<?php

if(! defined('WP_UNINSTALL_PLUGIN')){
    die(); 
}


 /**
 * Delete table If plugin uninstalled 
 */
global $wpdb;
$acb_form_table=$wpdb->prefix. 'acb_admin_chat_box';
$wpdb->query("DROP TABLE IF EXISTS {$acb_form_table} ");