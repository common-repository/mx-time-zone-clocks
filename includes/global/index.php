<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * This file contains global features for 
 * Admin and Frontend parts.
 */

 if (!function_exists('mxmtzc_register_scripts')) {
    /**
     * Register scripts globally.
     * 
     * @return void
     */
    function mxmtzc_register_scripts()
    {

        /**
         *  Register canvasClock.
         * */
        wp_enqueue_script(
            'mxmtzc_script_frontend', 
            MXMTZC_PLUGIN_URL . 'assets/build/index.js',
            ['jquery'],
            MXMTZC_PLUGIN_VERSION,
            false
        );

        // Add image folder.
        wp_localize_script('mxmtzc_script_frontend', 'mxdfmtzc_localizer', [
            'image_folder' => MXMTZC_PLUGIN_URL . 'includes/admin/assets/img/'
        ]);
    }
}
add_action('wp_enqueue_scripts', 'mxmtzc_register_scripts');
add_action('admin_enqueue_scripts', 'mxmtzc_register_scripts');
