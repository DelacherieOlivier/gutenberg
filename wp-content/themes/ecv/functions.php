<?php

require get_stylesheet_directory() . '/inc/texte.php';

// Fonction ajout assets CSS et JS
function load_assets () {
    wp_enqueue_style("ecvcss", get_stylesheet_directory_uri(). "/assets/css/style.css", [], false, "all");
    wp_enqueue_script("ecvjs", get_stylesheet_directory_uri(). "/assets/js/app.js", ["jquery"], false, true);
}
add_theme_support('post-thumbnails');
add_action('wp_enqueue_scripts', 'load_assets', 100);