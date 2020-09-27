<?php
namespace SmaartWeb\Elementor\ThemeSwitcher;

use SmaartWeb\Elementor\ThemeSwitcher\Widgets\Switcher;
use SmaartWeb\Elementor\ThemeSwitcher\Core\Plugin;
use SmaartWeb\Elementor\ThemeSwitcher\Core\ThemeSwitcher;

/**
 * Plugin Name: Theme switcher addon
 * Description: Adds a theme switcher button
 * Plugin URI:  https://smaartweb.com/
 * Version:     1.0.0
 * Author:      Anver
 * Author URI:  https://smaartweb.com/
 * Text Domain: swswitcher
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

require plugin_dir_path( __FILE__ ) . 'vendor/autoload.php';
ThemeSwitcher::instance();
