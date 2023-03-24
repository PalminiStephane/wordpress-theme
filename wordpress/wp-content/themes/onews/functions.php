<?php

// On teste si la fonction existe et si c'est le cas, on ne la redéclare pas
if (!function_exists('onews_add_scripts')) {
    function onews_add_scripts() {
        // Récupération de style.css
        wp_enqueue_style('style', get_theme_file_uri('/assets/css/style.css'), ['reset'], '1.0');

        // Récupération de reset.css
        wp_enqueue_style('reset', get_theme_file_uri('/assets/css/reset.css'), [], '4.0.0-beta');
    }
}

add_action('wp_enqueue_scripts', 'onews_add_scripts');

if (!function_exists('onews_add_content')) {
    function onews_add_content($content) {
        if (is_single()) {
            $content .= '<p>Peu importe la personne ayant écrit ce texte, celui-ci est la propriété exclusive de Steven Sil U.U</p>';
        }
        return $content;
    }
}

add_filter('the_content', 'onews_add_content');

// Si ma fonction n'existe pas encore, je viens la créer (pratique par exemple avecles thèmes enfants)
if (!function_exists('onews_register_menus')) {
    function onews_register_menus() {
        // La fonction register_nav_menus() permet d'enregistrer les différents menus pour notre thème
        register_nav_menus([
            // La fonction __() permet de gérer la traduction
            'main-menu' => __('Menu principal')
        ]);
    }
}

// On vient ajouter nos emplacement de menus à notre thème
add_action('init', 'onews_register_menus');

add_theme_support('title-tag');
add_theme_support('post-thumbnails');
