<?php

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

final class MXMTZCMXTimeZoneClocks
{

	/*
	* Include required core files
	*/
	public function mxmtzc_include()
	{		

		// helpers
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/core/helpers.php';

		// cathing errors
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/core/Catching-Errors.php';

		// Route
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/core/Route.php';

		// Models
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/core/Model.php';

		// Views
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/core/View.php';

		// Controllers
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/core/Controller.php';

	}

	/**
     * Include Global Features.
     * 
     * @return void
     */
    public function includeGlobalFeatures()
    {

        require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/global/index.php';
    }

	/*
	* Include Admin Path
	*/
	public function mxmtzc_include_admin_path()
	{

		// Part of the Administrator
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/admin/admin-class.php';
	
	}

	/*
	* Include Frontend Path
	*/
	public function mxmtzc_include_frontend_path()
	{

		// Part of the Frontend
		require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/frontend/frontend-main.php';
	
	}

	/**
     * Include Gutenberg Features.
     * 
     * @return void
     */
    public function includeGutenbergPath()
    {

        require_once MXMTZC_PLUGIN_ABS_PATH . 'includes/gutenberg/gutenberg-main.php';
    }

}

// create a new instance of final class
$final_class_instance = new MXMTZCMXTimeZoneClocks();

// run core files
$final_class_instance->mxmtzc_include();

// include global part
$final_class_instance->includeGlobalFeatures();

// include admin part
$final_class_instance->mxmtzc_include_admin_path();

// include frontend part
$final_class_instance->mxmtzc_include_frontend_path();

// include gutenberg part
$final_class_instance->includeGutenbergPath();
