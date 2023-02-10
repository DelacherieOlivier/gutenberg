<?php
/*
Plugin Name: Mon premier plugin
Plugin URI: https://mon-siteweb.com/
Description: Ceci est mon premier plugin
Author: delacherie olivier
Version: 1.0
Author URI: http://mon-siteweb.com/
text-domain: myplugin
*/

if(!defined('ABSPATH')) {
    exit;
}

class ECVPlugin {
    public function __construct() {
        $this->initialize();
        $this->sayHello();
    }

    public function initialize() {

        load_plugin_textdomain('myplugin', false, dirname(plugin_basename(__FILE__)) . '/languages');

        function register_assets() {
        }

        add_action('admin_enqueue_scripts', 'register_assets');
        require_once plugin_dir_path(__FILE__) . 'includes/admin/myplugin-admin-config.php';

        if(is_admin()) {

        }
    }

    public function sayHello() {
        add_action('admin_footer_text', function () {echo "Le plugin ECV est activé";});
        add_action('init',[(new MyPlugin_Admin()), 'register']);
    }

}

new ECVPlugin();



