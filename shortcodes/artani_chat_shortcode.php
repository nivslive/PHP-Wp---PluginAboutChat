<?php
function artaniChat_shortcode() {
  ob_start();
  $file = plugin_dir_path( __DIR__ ).'views/shortcodes/artani_chat_shortcode.php';
  if (file_exists($file)) {
      require_once $file;
  } else {
      echo 'O arquivo ' . $file . ' não foi encontrado.';
  } // caminho para o arquivo login.php dentro da pasta do seu plugin
  return ob_get_clean();
}
add_shortcode( 'artani_chat', 'artaniChat_shortcode' );