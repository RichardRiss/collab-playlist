<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://github.com/RichardRiss
 * @since             1.0.0
 * @package           Collab_Playlist
 *
 * @wordpress-plugin
 * Plugin Name:       CollabPlaylist
 * Plugin URI:        https://localhost
 * Description:       A plugin that allows users to create a collaborative playlist
 * Version:           1.0.0
 * Author:            RR
 * Author URI:        https://github.com/RichardRiss
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       collab-playlist
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'COLLAB_PLAYLIST_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-collab-playlist-activator.php
 */
function activate_collab_playlist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-collab-playlist-activator.php';
	Collab_Playlist_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-collab-playlist-deactivator.php
 */
function deactivate_collab_playlist() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-collab-playlist-deactivator.php';
	Collab_Playlist_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_collab_playlist' );
register_deactivation_hook( __FILE__, 'deactivate_collab_playlist' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-collab-playlist.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_collab_playlist() {

	$plugin = new Collab_Playlist();
	$plugin->run();

}
run_collab_playlist();
