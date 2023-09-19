<?php
/**
 * Plugin Name: My plugin.
 * Description: My first custom plugin.
 * Author: Victor Crespo
 * Author URI: https://victorcrespo.net
 * Version: 1.0.0
 */

class My_Plugin {
    private static $instance = false;

    private function __construct() {
        // Add hooks here.
        //add_action('init', array($this, 'echo_message_on_init'), 11);
        //add_action('init', array($this, 'echo_message_on_init_II'));

        add_action('init', array($this, 'register_shortcodes'));
        add_action('wp_enqueue_scripts', array($this, 'add_assets'));

        add_filter('the_title', array($this, 'test_title_filter'), 10, 2);
    }

    public static function get_instance() {

        if ( ! self::$instance ) {
            self::$instance = new self();
        }

        return self::$instance;

    }

    public function echo_message_on_init() {
        echo 'Message on init</br>';
    }

    public function echo_message_on_init_II() {
        echo 'Second message on init</br>';
    }

    public function test_title_filter($post_title, $post_id) {
        return $post_title;
    }

    public function register_shortcodes() {
        add_shortcode('my_plugin_message', array($this, 'echo_shortcode_message'));
    }

    public function echo_shortcode_message($atts, $content, $shortcode_tag) {
        require 'message.php';
        //echo 'My plugin message';
    }

    public function add_assets() {
        wp_enqueue_style(
            'my_plugin_styles',
            plugins_url('style.css', __FILE__)
        );
    }
}

$my_plugin = My_Plugin::get_instance();
