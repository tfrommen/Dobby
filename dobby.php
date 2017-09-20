<?php # -*- coding: utf-8 -*-

/*
 * Plugin Name: Dobby
 * Plugin URI:  https://wordpress.org/plugins/wp-dobby/
 * Description: Dobby, the friendly Admin Elf, takes care of all your (unwanted) admin notices.
 * Author:      Thorsten Frommen
 * Author URI:  https://tfrommen.de
 * Version:     1.3.0
 * Text Domain: wp-dobby
 * License:     MIT
 */

namespace tfrommen\Dobby;

defined( 'ABSPATH' ) || die();

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
		if ( '' === $contents ) {
			return;
		}

		load_plugin_textdomain( 'wp-dobby' );

		$dobby_id = 'dobby';

		$closet_id = 'dobby-closet';
		?>
		<div id="<?php echo esc_attr( $dobby_id ); ?>" class="notice hide-if-js">
			<p>
				<span>&#x2728;</span>
				<?php esc_html_e( 'Dobby took care of your admin notices.', 'wp-dobby' ); ?>
				<button class="button"><?php esc_html_e( 'Reveal', 'wp-dobby' ); ?></button>
			</p>
		</div>
		<div id="<?php echo esc_attr( $closet_id ); ?>" class="hide-if-js">
			<?php
			// @codingStandardsIgnoreLine
			echo $contents;
			?>
		</div>
		<?php
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
			'selectorCloset' => "#{$closet_id}",
			'selectorDobby'  => "#{$dobby_id}",
			'threshold'      => max( 1, $threshold ),
		] );
	}, PHP_INT_MAX );
}

add_action( 'plugins_loaded', __NAMESPACE__ . '\\bootstrap' );
