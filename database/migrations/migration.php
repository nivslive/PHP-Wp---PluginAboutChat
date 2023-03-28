<?php

abstract class Migration {
    function __construct() {

    }
    function getNameTable($name) {
        global $wpdb;
        return $wpdb->prefix . $name;
    }
    
    function query($sql) {
          require_once ABSPATH . 'wp-admin/includes/upgrade.php';
          return dbDelta($sql);
    }

}