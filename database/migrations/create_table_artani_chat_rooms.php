<?php

require_once 'migration.php';

class artaniChat extends Migration {

    function __construct() {  
        register_activation_hook( __FILE__, array($this, 'create_table_artani_chat_rooms'));
        register_activation_hook( __FILE__, array($this, 'create_table_artani_chat_rooms_message'));     
    }
    
    
    
    function create_table_artani_chat_rooms() {
        $nome_tabela = $this->getNameTable('artani_chat_rooms');
        return $this->query("CREATE TABLE IF NOT EXISTS $nome_tabela (
          id INT NOT NULL AUTO_INCREMENT,
          user_id BIGINT(20) UNSIGNED NOT NULL,
          host TINYINT(1) DEFAULT '0',
          PRIMARY KEY (id),
          created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
          FOREIGN KEY (user_id) REFERENCES {$wpdb->prefix}users(ID)
          ) $charset_collate;");
      }

      
      function create_table_artani_chat_rooms_message() {
          $nome_tabela = $this->getNameTable( 'artani_chat_rooms_messages');
          return $this->query("CREATE TABLE IF NOT EXISTS $nome_tabela (
              id INT NOT NULL AUTO_INCREMENT,
              user_id BIGINT(20) UNSIGNED NOT NULL,
              message VARCHAR(250),
              blocked TINYINT(1) DEFAULT '0',
              created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
              PRIMARY KEY (id),
              FOREIGN KEY (user_id) REFERENCES {$wpdb->prefix}users(ID),
              FOREIGN KEY (room_id) REFERENCES {$wpdb->prefix}artani_chat_rooms(ID)
          ) $charset_collate;");
        }
}