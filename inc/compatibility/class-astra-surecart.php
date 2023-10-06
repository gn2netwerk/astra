<?php
/**
 * SureCart Compatibility File.
 *
 * @package Astra
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

if ( ! defined( 'SURECART_PLUGIN_FILE' ) ) {
	return;
}

/**
 * Astra SureCart Compatibility
 *
 * @since x.x.x
 */
class Astra_SureCart {

	/**
	 * The post type slug.
	 *
	 * @var string
	 */
	public $post_type = 'sc_product';

	/**
	 * Shop Page ID.
	 *
	 * @var int
	 */
	public $shop_page_id = 0;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->shop_page_id = absint( get_option( 'surecart_shop_page_id' ) );
		add_action( 'astra_header_after', array( $this, 'astra_surecart_archive_page_banner_support' ) );
		add_action( 'astra_entry_top', array( $this, 'revert_surecart_support' ) );
	}

	/**
	 * Check is SureCart Shop Page.
	 *
	 * @return bool True if SureCart Shop Page.
	 * @since x.x.x
	 */
	public function astra_is_surecart_shop_page() {
		$supported_post_types = Astra_Posts_Structure_Loader::get_supported_post_types();
		if ( ! in_array( $this->post_type, $supported_post_types ) ) {
			return false;
		}

		if ( ! is_page() || ! $this->shop_page_id ) {
			return false;
		}

		$page_id = absint( astra_get_post_id() );
		if ( $page_id === $this->shop_page_id ) {
			return true;
		}

		return false;
	}

	/**
	 * SureCart Archive Banner Support.
	 * Making 'Shop Page' as archive of SureCart Products.
	 *
	 * @since x.x.x
	 */
	public function astra_surecart_archive_page_banner_support() {
		if ( false === $this->astra_is_surecart_shop_page() ) {
			return;
		}

		$page_id = absint( astra_get_post_id() );

		$visibility = get_post_meta( $page_id, 'ast-banner-title-visibility', true );
		$visibility = apply_filters( 'astra_banner_title_area_visibility', $visibility );
		if ( 'disabled' === $visibility ) {
			$this->disable_page_loaded_banner_area();
			return;
		}

		$banner_layout     = astra_get_option( 'ast-dynamic-archive-sc_product-layout', 'layout-1' );
		add_filter( 'astra_banner_elements_structure', array( $this, 'update_astra_banner_elements_structure' ) );
		add_filter( 'astra_banner_elements_post_type', array( $this, 'update_astra_banner_elements_post_type' ) );
		add_filter( 'astra_banner_elements_prefix', array( $this, 'update_astra_banner_elements_prefix' ) );
		add_filter( 'the_title', array( $this, 'update_the_title' ), 10, 2 );

		if ( 'layout-2' === $banner_layout ) {
			$astra_banner_hook = apply_filters( 'astra_banner_hook', 'astra_content_before' );
			add_action( $astra_banner_hook, array( $this, 'astra_surecart_hero_section' ), 20 );
		} else {
			add_filter( 'astra_single_layout_one_banner_visibility', '__return_false' );
			add_filter( 'astra_apply_hero_header_banner', '__return_false' );
			add_action( 'astra_primary_content_top', array( $this, 'astra_force_render_banner_layout_1' ) );
		}
	}

	/**
	 * Enable layout 1 for some cases. Ex. SureCart Product.
	 *
	 * @since x.x.x
	 * @return void
	 */
	public function astra_force_render_banner_layout_1() {
		add_filter( 'astra_remove_entry_header_content', '__return_false' );
		?>
			<section class="ast-archive-description">
				<?php
					do_action( 'astra_before_archive_title' );
					astra_banner_elements_order();
				?>
			</section>
		<?php
		do_action( 'astra_after_archive_title' );
	}

	/**
	 * SureCart Hero Section.
	 *
	 * @since x.x.x
	 */
	public function astra_surecart_hero_section() {
		if ( false === apply_filters( 'astra_apply_hero_header_banner', true ) ) {
			return;
		}

		$args = array( 'post_type' => $this->post_type );
		do_action( 'astra_before_archive_' . $this->post_type . '_banner_content' );
		get_template_part( 'template-parts/archive', 'banner', $args );
		do_action( 'astra_after_archive_' . $this->post_type . '_banner_content' );

		$this->disable_page_loaded_banner_area();
	}

	/**
	 * SureCart Section banner element structure.
	 * @param array $structure Elements structure.
	 * @since x.x.x
	 */
	public function update_astra_banner_elements_structure( $structure ) {
		return astra_get_option( 'ast-dynamic-archive-' . $this->post_type . '-structure', array( 'ast-dynamic-archive-' . $this->post_type . '-title', 'ast-dynamic-archive-' . $this->post_type . '-description' ) );
	}

	/**
	 * SureCart Section banner reference post type.
	 * @param string $post_type Post type.
	 * @since x.x.x
	 */
	public function update_astra_banner_elements_post_type( $post_type ) {
		return $this->post_type;
	}

	/**
	 * SureCart Section banner prefix.
	 * @param string $prefix Prefix.
	 * @since x.x.x
	 */
	public function update_astra_banner_elements_prefix( $prefix ) {
		return 'archive';
	}

	/**
	 * Support custom title & description support for archive.
	 *
	 * @param string $title Default archive title.
	 * @param int    $post_id Post ID.
	 * @since x.x.x
	 * @return string
	 */
	public function update_the_title( $title, $post_id ) {
		if ( $this->shop_page_id !== $post_id ) {
			return $title;
		}
		$custom_title = astra_get_option( 'ast-dynamic-archive-' . $this->post_type . '-custom-title', '' );
		$title        = ! empty( $custom_title ) ? $custom_title : $title;
		return $title;
	}

	/**
	 * Disable Astra's next page's banner as we already loaded.
	 *
	 * @since x.x.x
	 */
	public function disable_page_loaded_banner_area() {
		add_filter( 'astra_apply_hero_header_banner', '__return_false' );
		add_filter( 'astra_remove_entry_header_content', '__return_true' );
		add_filter( 'astra_single_layout_one_banner_visibility', '__return_false' );
	}

	/**
	 * Revert SureCart Support, after banner loaded.
	 *
	 * @since x.x.x
	 */
	public function revert_surecart_support() {
		if ( false === $this->astra_is_surecart_shop_page() ) {
			return;
		}

		remove_filter( 'astra_banner_elements_structure', array( $this, 'update_astra_banner_elements_structure' ) );
		remove_filter( 'astra_banner_elements_post_type', array( $this, 'update_astra_banner_elements_post_type' ) );
		remove_filter( 'astra_banner_elements_prefix', array( $this, 'update_astra_banner_elements_prefix' ) );
		remove_filter( 'the_title', array( $this, 'update_the_title' ), 10, 2 );
	}
}

/**
 * Kicking this off by object.
 * @since x.x.x
 */
new Astra_SureCart();
