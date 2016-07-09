<?php

/**
 * Fired when the Tailor plugin is uninstalled.
 *
 * https://github.com/tommcfarlin/WordPress-Plugin-Boilerplate/pull/123#issuecomment-28541913
 *
 * @since 1.0.0
 *
 * @package Tailor
 * @link http://www.tailorwp.com
 */

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Check user permissions
if ( ! current_user_can( 'activate_plugins' ) ) {
	return;
}