<?php
namespace ACB\Inc;

defined('ABSPATH') or die('Hey, what are you doing here? You silly human!');

final class ACB_DbTables {
    private $connection;
    private $sql;
    public function __construct() {
        
        global $wpdb;
        $wpdb->hide_errors();
        $collate = $wpdb->get_charset_collate();

        $table=$wpdb->prefix. 'simple_form_tables';

        $sql = "CREATE TABLE ".$table." (
            `id` INT(255) NOT NULL AUTO_INCREMENT,
            `form_name` VARCHAR(255) DEFAULT NULL,
            `form_fields` LONGTEXT,
            time datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
            PRIMARY KEY (`id`)
        ) ENGINE=InnoDB ".$collate."";

		require_once ABSPATH."wp-admin/includes/upgrade.php";
        dbDelta($sql);
        
    }

}