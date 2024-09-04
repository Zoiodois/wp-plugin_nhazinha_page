<?php
/*
Plugin Name: Nhazinha Template
Description: This is Pluggin to add Nhazinha Template Page in wordpress
Author: Felipe Buhrer   
Version: 0.1
Author URI: https:felipebsr.online
*/


// Evita o acesso direto ao arquivo
if ( ! defined( 'ABSPATH' ) ) {
    exit;
};

require_once plugin_dir_path( __FILE__ ) . '/int/nav__walk.php';

// Registra os template parts ao carregar o plugin
function meu_plugin_register_template_parts() {
    $template_part_path = plugin_dir_path( __FILE__ ) . 'templates/nhazinha.html';
    
    // Registra o template part apenas se ele existir
    if ( file_exists( $template_part_path ) ) {
        register_block_pattern(
            'meu-plugin/my-custom-template',
            array(
                'title' => __( 'Meu Template Personalizado', 'meu-plugin-template' ),
                'content' => file_get_contents( $template_part_path ),
                'categories' => array( 'text' ),
            )
        );
    }
}
add_action( 'init', 'meu_plugin_register_template_parts' );

//Bootstrap
function enqueue_bootstrap_assets() {
    // Enfileirando o Bootstrap CSS para o frontend e o editor
    wp_enqueue_style('bootstrap-css', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css', array(), '5.3.0', 'all');
    
    // Enfileirando o Bootstrap JS para o frontend
    wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
  
    // Enfileirando o Bootstrap JS para o editor de blocos (Gutenberg)
    add_action('enqueue_block_editor_assets', function() {
        wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', array(), '5.3.0', true);
    });
  }
  add_action('wp_enqueue_scripts', 'enqueue_bootstrap_assets');
  add_action('enqueue_block_editor_assets', 'enqueue_bootstrap_assets');

  function portfoliosBlocks() {
    wp_localize_script('wp-editor', 'ourThemeData', array('themePath' => get_stylesheet_directory_uri(),'siteURL' => site_url()));
  
    register_block_type_from_metadata(__DIR__ .'/build/store');
    register_block_type_from_metadata(__DIR__ .'/build/footer');
    register_block_type_from_metadata(__DIR__ .'/build/header');  //ERROO
    register_block_type_from_metadata(__DIR__ .'/build/banner');
    register_block_type_from_metadata(__DIR__ .'/build/banner_port');
    register_block_type_from_metadata(__DIR__ .'/build/genericbutton');
    register_block_type_from_metadata(__DIR__ .'/build/genericheading');
    register_block_type_from_metadata(__DIR__ .'/build/nhazinhaheading');
    register_block_type_from_metadata(__DIR__ .'/build/nossaagenda');
    register_block_type_from_metadata(__DIR__ .'/build/adjustableimages');
  }
  add_action('init', 'portfoliosBlocks');

  //Register Menus
register_nav_menu('main-menu', 'Main menu');

// Enfileira o CSS apenas quando o template personalizado for usado
function meu_plugin_enqueue_template_styles() {
   // if (is_page_template('nhazinha')) { 
        wp_enqueue_style(
            'meu-template-estilos',
            plugin_dir_url(__FILE__) . 'style.css',
            array(),
            '1.0'
        );
    //}
}
add_action('wp_enqueue_scripts', 'meu_plugin_enqueue_template_styles');