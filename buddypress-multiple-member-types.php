<?php
/**
 * Plugin Name: BuddyPress Multiple Member Types
 * Plugin URI: http://dustyf.com
 * Description: Select multiple registered BuddyPress member types on a user profile.
 * Author: Dustin Filippini
 * Author URI: http://dustyf.com
 * Version: 1.0.0
 * License: GPLv2
 */
// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
// Check if wp-content exists, only run code if it does not
if ( ! class_exists( 'BuddyPress_Multiple_Member_Types' ) ) {
	/**
	 * Main Sample Plugin Class
	 *
	 * @since 1.0.0
	 */
	class BuddyPress_Multiple_Member_Types {
		/**
		 * Construct function to get things started
		 *
		 * @since 1.0.0
		 */
		public function __construct() {
			/**
			 * Setup some base variables for the plugin
			 */
			$this->basename       = plugin_basename( __FILE__ );
			$this->directory_path = plugin_dir_path( __FILE__ );
			$this->directory_url  = plugins_url( dirname( $this->basename ) );
			/**
			 * Include any required files
			 */
			add_action( 'init', array( $this, 'includes' ) );
			/**
			 * Load Textdomain
			 */
			load_plugin_textdomain( 'bpmmt', false, dirname( $this->basename ) . '/languages' );
			/**
			 * Activation/Deactivation Hooks
			 */
			register_activation_hook(   __FILE__, array( $this, 'activate' ) );
			register_deactivation_hook( __FILE__, array( $this, 'deactivate' ) );
			/**
			 * Make sure we have our requirements, and disable the plugin if we do not have them.
			 */
			add_action( 'admin_notices', array( $this, 'maybe_disable_plugin' ) );
		}

		/**
		 * Include our plugin dependencies
		 *
		 * @since 1.0.0
		 */
		public function includes() {
			if( $this->meets_requirements() ) {
			}
		} /* includes() */

		/**
		 * Do Hooks
		 *
		 * @since 1.0.0
		 */
		public function do_hooks() {
			if( $this->meets_requirements() ) {

			}
		} /* do_hooks() */

		/**
		 * Activation hook for the plugin.
		 *
		 * @since 1.0.0
		 */
		public function activate() {
			if ( $this->meets_requirements() ) {
			}
		} /* activate() */

		/**
		 * Deactivation hook for the plugin.
		 *
		 * @since 1.0.0
		 */
		public function deactivate() {
		} /* deactivate() */

		/**
		 * Check that all plugin requirements are met
		 *
		 * @since  1.0.0
		 *
		 * @return bool
		 */
		public static function meets_requirements() {
			/**
			 * We have met all requirements
			 */
			return true;
		} /* meets_requirements() */

		/**
		 * Check if the plugin meets requirements and disable it if they are not present.
		 *
		 * @since 1.0.0
		 */
		public function maybe_disable_plugin() {
			if ( ! $this->meets_requirements() ) {
				// Display our error
				echo '<div id="message" class="error">';
				echo '<p>' . sprintf( __( 'BuddyPress Multiple Member Types is missing requirements and has been <a href="%s">deactivated</a>. Please make sure all requirements are available.', 'bpmmt' ), admin_url( 'plugins.php' ) ) . '</p>';
				echo '</div>';
				// Deactivate our plugin
				deactivate_plugins( $this->basename );
			}
		} /* maybe_disable_plugin() */

	}
	$GLOBALS['bpmmt'] = new BuddyPress_Multiple_Member_Types;
	$GLOBALS['bpmmt']->do_hooks();
}