<?php

// Exit if accessed directly.
if (!defined('ABSPATH')) exit;

/**
 * The MXDFMTZCGutenberg class.
 *
 * Here you can register you own
 * Gutenberg blocks.
 */
class MXDFMTZCGutenberg
{

    public function registerBlocks()
    {

        // Server side rendering.
        add_action('init', [$this, 'serverSideRendering']);
    }

    // Server side rendering.
    public function serverSideRendering()
    {

        $asset_file = include('build/mx-timezone-clock/index.asset.php');

        // add canvasClock dependency
        if (is_array($asset_file['dependencies'])) {

            array_push($asset_file['dependencies'], 'mxmtzc_script_frontend');
        }

        wp_register_script(
            'mx_server_side_rendering_script',
            MXMTZC_PLUGIN_URL . 'includes/gutenberg/build/mx-timezone-clock/index.js',
            $asset_file['dependencies'],
            $asset_file['version'],
            true
        );

        register_block_type(
            __DIR__ . '/build/mx-timezone-clock',
            [
                'api_version'       => 2,
                'category'          => 'widgets',
                'attributes'        => [
                    'clock_id'   => [
                        'type' => 'string',
                        'default' => 'mx-time-zone-clock'
                    ],
                    'time_zone'   => [
                        'type' => 'string',
                        'default' => 'Europe/London'
                    ],
                    'city_name'   => [
                        'type' => 'string',
                        'default' => 'London'
                    ],
                    'time_format'   => [
                        'type' => 'number',
                        'default' => 24 // 12
                    ],
                    'digital_clock'   => [
                        'type' => 'string',
                        'default' => 'false'
                    ],
                    'lang'   => [
                        'type' => 'string',
                        'default' => 'en-US'
                    ],
                    'lang_for_date'   => [
                        'type' => 'string',
                        'default' => 'en-US'
                    ],
                    'show_days'   => [
                        'type' => 'string',
                        'default' => 'false'
                    ],
                    'clock_font_size'   => [
                        'type' => 'number',
                        'default' => 14
                    ],
                    'show_seconds'   => [
                        'type' => 'string',
                        'default' => 'true'
                    ],
                    'arrow_type'   => [
                        'type' => 'string',
                        'default' => 'classical' // modern
                    ],
                    'super_simple'   => [
                        'type' => 'string',
                        'default' => 'false'
                    ],
                    'arrows_color'   => [
                        'type' => 'string',
                        'default' => '#333333'
                    ],
                    'clock_type'   => [
                        'type' => 'string',
                        'default' => 'clock-face2.png'
                    ],
                    'clock_upload'   => [
                        'type' => 'string',
                        'default' => 'false'
                    ],
                    'mediaId'  => [
                        'type' => 'string',
                        'default' => NULL
                    ],
                    'text_align'  => [
                        'type' => 'string',
                        'default' => 'center'
                    ]
                ],
                'editor_script' => 'mx_server_side_rendering_script',
                'render_callback'   => [$this, 'server_side_rendering_dynamic_render_callback'],
                'skip_inner_blocks' => true,
            ]
        );
    }

    public function server_side_rendering_dynamic_render_callback($block_attributes, $content)
    {

        ob_start();

        $data = $block_attributes;

        mxmtzc_require_view_file_frontend('clock-render.php', $data);

        return ob_get_clean();
    }
}

/**
 * Initialization.
 */
$gutenbergClassInstance = new MXDFMTZCGutenberg();

/**
 * Register custom Gutenberg blocks.
 */
$gutenbergClassInstance->registerBlocks();
