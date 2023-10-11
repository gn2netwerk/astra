<?php
/**
 * Theme Builder Free Version Preview.
 *
 * @package Astra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'ASTRA_THEME_BUILDER_FREE_DIR', ASTRA_THEME_DIR . 'inc/addons/theme-builder/' );
define( 'ASTRA_THEME_BUILDER_FREE_URI', ASTRA_THEME_URI . 'inc/addons/theme-builder/' );

if ( ! class_exists( 'Astra_Theme_Builder_Free' ) ) {

	/**
	 * Theme Builder initial setup.
	 *
	 * @since 1.0.0
	 */
	class Astra_Theme_Builder_Free {

		/**
		 * Member Variable
		 *
		 * @var instance
		 */
		private static $instance;

		/**
		 *  Initiator
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}
			return self::$instance;
		}

		/**
		 *  Constructor
		 */
		public function __construct() {
			$show_custom_layout_submenu = ( defined( 'ASTRA_EXT_VER' ) && ! Astra_Ext_Extension::is_active( 'advanced-hooks' ) ) ? false : true;

			if ( !$show_custom_layout_submenu ) {
				add_action( 'admin_enqueue_scripts', array( $this, 'theme_builder_admin_enqueue_scripts' ) );
				add_action( 'admin_body_class', array( $this, 'admin_body_class' ) );
				add_action( 'admin_menu', array( $this, 'setup_menu' ) );			
			}
		}

		/**
		 *  Enqueue scripts and styles.
         * 
         * @return void
		 */
		public function theme_builder_admin_enqueue_scripts() {

            wp_enqueue_style( 'astra-theme-builder-style', ASTRA_THEME_BUILDER_FREE_URI . 'build/index.css' );
            wp_enqueue_script( 'astra-theme-builder-script', ASTRA_THEME_BUILDER_FREE_URI . 'build/index.js', array( 'wp-element' ), ASTRA_THEME_VERSION, true );
			wp_enqueue_style('dashicons');

			$localized_data = array(
				'title'  				 => __( 'Theme Builder', 'astra' ),
				'astra_pricing_page_url' => "https://wpastra.com/pricing/",
			);

			wp_localize_script( 'astra-theme-builder-script', 'astra_theme_builder', $localized_data );
		}

        /**
         * Admin Body Classes
         *
         * @since x.x.x
         * @param string $classes Space separated class string.
         */
        public function admin_body_class( $classes = '' ) {
            $theme_builder_class = isset( $_GET['page'] ) && 'theme-builder-free' === $_GET['page'] ? 'ast-theme-builder' : ''; // phpcs:ignore WordPress.Security.NonceVerification.Recommended -- Fetching a $_GET value, no nonce available to validate.
            $classes .= ' ' . $theme_builder_class . ' ';

            return $classes;

        }

		/**
		 * Renders the admin settings.
		 *
		 * @since x.x.x
		 * @return void
		 */
		public function render_theme_builder() {
			?>
				<div class="ast-tb-menu-page-wrapper">
					<div id="ast-tb-menu-page">
						<div class="ast-tb-menu-page-content">
							<div id="ast-tb-app-root" class="ast-tb-app-root"></div>
						</div>
					</div>
				</div>
			<?php
		}

		/**
		 * Setup menu.
		 *
		 * @since x.x.x
		 * @return void
		 */
		public function setup_menu() {
			$custom_layout_submenu = ( defined( 'ASTRA_EXT_VER' ) && Astra_Ext_Extension::is_active( 'advanced-hooks' ) );
			if ( ! $custom_layout_submenu ) {
				add_submenu_page( // phpcs:ignore WPThemeReview.PluginTerritory.NoAddAdminPages.add_menu_pages_add_submenu_page -- Taken the menu on top level
					'astra',
					__( 'Theme Builder', 'astra' ),
					__( 'Theme Builder', 'astra' ),
					'manage_options',
					'theme-builder-free',
					array( $this, 'render_theme_builder' ),
					2
				);
			}
		}
	}

	/**
	 *  Kicking this off by calling 'get_instance()' method
	 */
	Astra_Theme_Builder_Free::get_instance();

}
