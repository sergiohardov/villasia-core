<?php

if (!defined("ABSPATH")) die;

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
    require_once dirname(__FILE__) . '/vendor/autoload.php';
}

/**
 * Plugin Name: Villasia Core
 * Description: Villasia Core plugin.
 * Version:     1.0
 * Text Domain: villasia-core
 * Domain Path: /languages
 */

if (!class_exists('VillasiaCore')) {

    final class VillasiaCore
    {
        function __construct()
        {
            $this->defines();
            $this->hooks();
            $this->core();
        }

        private function defines()
        {
            /* Paths */
            define('VILLASIACORE_PLUGIN_PATH', plugin_dir_path(__FILE__));
            define('VILLASIACORE_PLUGIN_URL', plugin_dir_url(__FILE__));
            define('VILLASIACORE_LOGS_PATH', VILLASIACORE_PLUGIN_PATH . 'logs/');
        }

        private function hooks()
        {
            register_activation_hook(__FILE__, [$this, 'activate']);
            register_deactivation_hook(__FILE__, [$this, 'deactivate']);
        }

        private function core()
        {
        }

        public function activate()
        {
            flush_rewrite_rules();
        }

        public function deactivate()
        {
            flush_rewrite_rules();
        }
    }

    $VillasiaCore = new VillasiaCore();
}
