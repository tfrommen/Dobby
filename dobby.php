<?php # -*- coding: utf-8 -*-
/*
 * Plugin Name: Dobby
 * Plugin URI:  https://wordpress.org/plugins/wp-dobby/
 * Description: Dobby, the friendly Admin Elf, takes care of all your (unwanted) admin notices.
 * Author:      Thorsten Frommen
 * Author URI:  https://tfrommen.de
 * Version:     1.2.1
 * Text Domain: wp-dobby
 * License:     MIT
 */

namespace tfrommen\Dobby;

defined( 'ABSPATH' ) or die();

if ( ! is_admin() ) {
	return;
}

/**
 * Filter hook.
 *
 * @since 1.1.0
 *
 * @var string
 */
const FILTER_THRESHOLD = 'dobby.threshold';

/**
 * Bootstraps the plugin.
 *
 * @since 1.0.0
 * @wp-hook plugins_loaded
 *
 * @return void
 */
function bootstrap() {

	if ( is_network_admin() ) {
		$action = 'network_admin_notices';
	} elseif ( is_user_admin() ) {
		$action = 'user_admin_notices';
	} else {
		$action = 'admin_notices';
	}
	add_action( $action, function () {

		ob_start();
	}, (int) ( PHP_INT_MAX + 1 ) );

	add_action( 'all_admin_notices', function () {

		$contents = trim( ob_get_clean() );
		if ( ! $contents ) {
			return;
		}

		load_plugin_textdomain( 'wp-dobby' );

		$button = '<button class="button dobby-button">' . __( 'Reveal', 'wp-dobby' ) . '</button>';

		/* translators: 1: MAGIC, 2: <button> tag to reveal admin notices */
		$message = __( '%1$s Dobby took care of your admin notices. %2$s', 'wp-dobby' );

		printf(
			'<div id="dobby" class="notice hide-if-js"><p>%s</p></div><div class="dobby-closet hide-if-js">%s</div>',
			sprintf( $message, '&#x2728;', $button ),
			$contents
		);

		wp_enqueue_script(
			'dobby',
			plugin_dir_url( __FILE__ ) . 'assets/js/dobby.js',
			[ 'jquery' ],
			filemtime( plugin_dir_path( __FILE__ ) . 'assets/js/dobby.js' )
		);

		/**
		 * Filters the minimum number of admin notices required for Dobby to take action.
		 *
		 * @since 1.1.0
		 *
		 * @param int $threshold Required minimum number of admin notices.
		 */
		$threshold = (int) apply_filters( FILTER_THRESHOLD, 1 );
		wp_localize_script( 'dobby', 'dobbySettings', [
			'threshold' => max( 1, $threshold ),
		] );
	}, PHP_INT_MAX );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
