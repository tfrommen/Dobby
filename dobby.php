<?php # -*- coding: utf-8 -*-
/*
 * Plugin Name: Dobby
 * Plugin URI:  https://github.com/tfrommen/Dobby/
 * Description: Dobby, the friendly Admin Elf, takes care of all your (unwanted) admin notices.
 * Author:      Thorsten Frommen
 * Author URI:  https://tfrommen.de
 * Version:     1.0.1
 * Text Domain: dobby
 * License:     MIT
 */

namespace tfrommen\Dobby;

defined( 'ABSPATH' ) or die();

if ( ! is_admin() ) {
	return;
}

/**
 * Bootstraps the plugin.
 *
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
	}, PHP_INT_MAX + 1 );

	add_action( 'all_admin_notices', function () {

		$contents = trim( ob_get_clean() );
		if ( ! $contents ) {
			return;
		}

		load_plugin_textdomain( 'dobby' );

		$contents = preg_replace(
			'/(\sclass=["\'][^"\']*?notice)(["\'\s])/',
			'$1 inline$2',
			$contents
		);

		$button = '<button class="button dobby-button">' . __( 'Toggle notices', 'dobby' ) . '</button>';

		/** translators: s: <button> tag to display admin notices */
		$message = __( 'Dobby took care of your admin notices. %s', 'dobby' );

		printf(
			'<div id="dobby" class="notice notice-info"><p>%s</p></div><div class="dobby-notices hide-if-js">%s</div>',
			sprintf( $message, $button ),
			$contents
		);

		add_action( 'admin_footer', function () {

			$js = <<<JS
jQuery( function () {
	var notices;
	jQuery( '#wpbody-content' ).on( 'click', '.dobby-button', function () {
		if ( ! notices ) {
			notices = jQuery( '.dobby-notices' );
			notices.insertAfter( '#dobby' );
		}

		notices.toggle();
	} );
} );
JS;
			echo "<script>{$js}</script>";
		} );
	}, PHP_INT_MAX );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
