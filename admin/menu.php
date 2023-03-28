<?php
namespace ArtaniChat\Admin;
class Menu {
  function __construct() {
    add_action( 'admin_menu', array($this, 'ArtaniChat_create_admin_menu') );
  }

  function ArtaniChat_create_admin_menu() {
    add_menu_page(
      'Artani Chat', // Título da página
      'Artani Chat', // Texto do menu
      'manage_options', // Nível de permissão necessário para acessar a página
      'artani-chat', // Slug da página
      array($this, 'ArtaniChat_show_admin_index') // Função que irá exibir o conteúdo da página
    );
  
      // Adiciona um submenu para a página de criação de usuários
      add_submenu_page(
        'artani-chat', // Slug da página principal
        'Listar Chat', // Título do submenu
        'Listar Chat', // Texto do menu
        'manage_options', // Nível de permissão necessário para acessar a página
        'list-chat', // Slug da página
        array($this, 'ArtaniChat_show_admin_list_chat') // Função que irá exibir o conteúdo da página
      );
  }

  function ArtaniChat_show_admin_index() {
    $file = __DIR__.'/views/show_admin_index.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo 'O arquivo ' . $file . ' não foi encontrado.';
    }
  }
  
  function ArtaniChat_show_admin_list_chat() {
    $file = __DIR__.'/views/show_admin_list_chat.php';
    if (file_exists($file)) {
        require_once $file;
    } else {
        echo 'O arquivo ' . $file . ' não foi encontrado.';
    }
  }
  
}
