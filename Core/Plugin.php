<?php
namespace SmaartWeb\Elementor\ThemeSwitcher\Core;

use SmaartWeb\Elementor\ThemeSwitcher\Widgets\Switcher;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Plugin Class
 *
 * Register new elementor widget.
 *
 * @since 1.0.0
 */
class Plugin {

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {
		add_action( 'elementor/widgets/widgets_registered', array( $this, 'on_widgets_registered' ) );
		add_action( 'elementor/frontend/after_register_scripts', array( $this, 'widget_scripts' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'widget_styles' ), 999 );
	}

	/**
	 * Enqueue all widget styles
	 */
	public function widget_scripts() {
		$root = dirname( plugin_dir_url( __FILE__ ) );
		wp_enqueue_script( 'smswitch-script', $root . '/dist/js/bundle.js', '', '1.0.0', true );
	}

	/**
	 * Enqueue all widget styles
	 */
	public function widget_styles() {
		$root = dirname( plugin_dir_url( __FILE__ ) );
		wp_enqueue_style( 'smswitch-style', $root . '/dist/css/style.css', array(), '1.0.0' );
	}

	/**
	 * On Widgets Registered
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function on_widgets_registered() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new Switcher() );
	}

}
