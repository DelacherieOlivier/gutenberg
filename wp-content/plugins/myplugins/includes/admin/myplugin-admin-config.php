<?php

if (!defined('ABSPATH')) {
    exit;
}
class MyPlugin_Admin
{
    public function register(): void
    {
        $this->MyPluginCpt();
        $this->MyPluginTaxonomy();
        add_action('admin_menu', [$this, 'MyPlugin_admin_menu']);
    }

    public function MyPluginCpt(): void
    {
        register_post_type('ville', [
            'labels' => [
                'name' => __('Villes', 'ecv'),
                'singular_name' => __('Ville', 'ecv'),
                'add_new' => __('Ajouter une ville', 'ecv'),
                'add_new_item' => __('Ajouter une ville', 'ecv'),
                'edit_item' => __('Modifier une ville', 'ecv'),
                'new_item' => __('Nouvelle ville', 'ecv'),
                'view_item' => __('Voir la ville', 'ecv'),
                'view_items' => __('Voir les villes', 'ecv'),
                'search_items' => __('Rechercher une ville', 'ecv'),
                'not_found' => __('Aucune ville trouvée', 'ecv'),
            ],
            'menu_icon' => 'dashicons-admin-multisite',
            'description' => __('Description.', 'ecv'),
            'public' => true,
            'show_in_rest' => true,
            'supports'=>['title','editor','thumbnail'],
            'rewrite'=>['slug'=>'lang']
        ]);
    }

    public function MyPluginTaxonomy(): void
    {
        register_taxonomy('lang', 'ville', [
            'labels' => [
                'name' => __('Langues', 'ecv'),
                'singular_name' => __('Langue', 'ecv'),
                'add_new' => __('Ajouter une langue', 'ecv'),
                'add_new_item' => __('Ajouter une langue', 'ecv'),
                'edit_item' => __('Modifier une langue', 'ecv'),
                'new_item' => __('Nouvelle langue', 'ecv'),
                'view_item' => __('Voir la langue', 'ecv'),
                'view_items' => __('Voir les langues', 'ecv'),
                'search_items' => __('Rechercher une langue', 'ecv'),
                'not_found' => __('Aucune langue trouvée', 'ecv')
            ],
            'description' => __('Description.', 'ecv'),
            'public' => true,
            'show_in_rest' => true,
            'show_admin_column' => true,
            'hierarchical'=>true,
        ]);
    }

    public function MyPlugin_admin_menu(): void
    {
        add_menu_page(
            __('Mon plugin'),
            __('Mon plugin'),
            'manage_options',
            'myplugin_option_page',
            [$this, 'MyPlugin_config'],
            'dashicons-admin-generic');
    }

    function MyPlugin_config(): void
    {?>
        <div class="wrap">
            <h1><?= esc_html(get_admin_page_title()) ?></h1>
            <?php
                $active_tab = "general_settings";

            ?>
        </div>

    <?php }
}