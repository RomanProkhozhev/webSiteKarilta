<?php
/**
 * About page configuration
 *
 * @package Shop Isle
 */

/**
 * Class Shoisle_About_Page
 */
class Shopisle_Admin_Page {

	/**
	 * Add the about page.
	 */
	public function do_about_page() {
		$theme_args       = wp_get_theme();
		$this->theme_name = apply_filters( 'ti_wl_theme_name', $theme_args->__get( 'Name' ) );
		$this->theme_slug = $theme_args->__get( 'stylesheet' );

		/*
		 * About page instance
		 */
		$config = array(
			'welcome_notice'      => array(
				'type'           => 'custom',
				'notice_class'   => 'ti-welcome-notice updated',
				'dismiss_option' => 'shop_isle_notice_dismissed',
			),
			'footer_messages'     => array(
				'type'     => 'custom',
				'messages' => array(
					array(
						'heading'   => __( 'Leave us a review', 'shop-isle' ),
						// translators: %s - theme name
						'text'      => sprintf( __( 'Are you are enjoying %s? We would love to hear your feedback.', 'shop-isle' ), $this->theme_name ),
						'link_text' => __( 'Submit a review', 'shop-isle' ),
						'link'      => 'https://wordpress.org/support/theme/shop-isle/reviews/#new-post',
					),
				),
			),
			'getting_started'     => array(
				'type'    => 'columns-3',
				'title'   => __( 'Getting Started', 'shop-isle' ),
				'content' => array(
					array(
						'title' => esc_html__( 'Recommended actions', 'shop-isle' ),
						'text'  => esc_html__( 'We have compiled a list of steps for you to take so we can ensure that the experience you have using one of our products is very easy to follow.', 'shop-isle' ),
					),
					array(
						'title'  => esc_html__( 'Read full documentation', 'shop-isle' ),
						// translators: %s - theme name
						'text'   => sprintf( esc_html__( 'Need more details? Please check our full documentation for detailed information on how to use %s.', 'shop-isle' ), $this->theme_name ),
						'button' => array(
							'label'     => esc_html__( 'Documentation', 'shop-isle' ),
							'link'      => apply_filters( 'shop-isle-documentation-link', 'https://docs.themeisle.com/article/421-shop-isle-documentation-wordpress-org?utm_medium=aboutshopisle&utm_source=documentation&utm_campaign=shopisle' ),
							'is_button' => false,
							'blank'     => true,
						),
					),
					array(
						'title'  => esc_html__( 'Go to the Customizer', 'shop-isle' ),
						'text'   => esc_html__( 'Using the WordPress Customizer you can easily customize every aspect of the theme.', 'shop-isle' ),
						'button' => array(
							'label'     => esc_html__( 'Go to the Customizer', 'shop-isle' ),
							'link'      => esc_url( admin_url( 'customize.php' ) ),
							'is_button' => true,
							'blank'     => true,
						),
					),
				),
			),
			'recommended_plugins' => array(
				'type'    => 'plugins',
				'title'   => esc_html__( 'Useful Plugins', 'shop-isle' ),
				'plugins' => array(
					'woocommerce',
					'optimole-wp',
					'themeisle-companion',
					'cartflows',
					'otter-blocks',
					'elementor',
				),
			),
			'support'             => array(
				'type'    => 'columns-3',
				'title'   => __( 'Support', 'shop-isle' ),
				'content' => array(
					array(
						'icon'   => 'dashicons dashicons-sos',
						'title'  => esc_html__( 'Contact Support', 'shop-isle' ),
						// translators: %s - theme name
						'text'   => sprintf( esc_html__( 'We want to make sure you have the best experience using %1$s, and that is why we have gathered all the necessary information here for you. We hope you will enjoy using %1$s as much as we enjoy creating great products.', 'shop-isle' ), $this->theme_name ),
						'button' => array(
							'label'     => esc_html__( 'Contact Support', 'shop-isle' ),
							'link'      => apply_filters( 'shop_isle_contact_support_link', 'https://wordpress.org/themes/shop-isle/' ),
							'is_button' => true,
							'blank'     => true,
						),
					),
					array(
						'icon'   => 'dashicons dashicons-admin-customizer',
						'title'  => esc_html__( 'Create a child theme', 'shop-isle' ),
						'text'   => esc_html__( "If you want to make changes to the theme's files, those changes are likely to be overwritten when you next update the theme. In order to prevent that from happening, you need to create a child theme. For this, please follow the documentation below.", 'shop-isle' ),
						'button' => array(
							'label'     => esc_html__( 'View how to do this', 'shop-isle' ),
							'link'      => 'http://docs.themeisle.com/article/14-how-to-create-a-child-theme',
							'is_button' => false,
							'blank'     => true,
						),
					),
					array(
						'icon'   => 'dashicons dashicons-controls-skipforward',
						'title'  => esc_html__( 'Speed up your site', 'shop-isle' ),
						'text'   => esc_html__( 'If you find yourself in a situation where everything on your site is running very slowly, you might consider having a look at the documentation below where you will find the most common issues causing this and possible solutions for each of the issues.', 'shop-isle' ),
						'button' => array(
							'label'     => esc_html__( 'View how to do this', 'shop-isle' ),
							'link'      => 'http://docs.themeisle.com/article/63-speed-up-your-wordpress-site',
							'is_button' => false,
							'blank'     => true,
						),
					),
				),
			),
			'changelog'           => array(
				'type'  => 'changelog',
				'title' => __( 'Changelog', 'shop-isle' ),
			),
		);
		if ( class_exists( 'TI_About_Page', false ) ) {
			TI_About_Page::init( apply_filters( 'shop_isle_about_page_array', $config ) );
		}
	}

	/**
	 * Display feature title and description
	 *
	 * @param array $feature Feature data.
	 */
	public function get_feature_title_and_description( $feature ) {
		$output = '';
		if ( ! empty( $feature['title'] ) ) {
			$output .= '<h3>' . wp_kses_post( $feature['title'] ) . '</h3>';
		}
		if ( ! empty( $feature['description'] ) ) {
			$output .= '<p>' . wp_kses_post( $feature['description'] ) . '</p>';
		}

		return $output;
	}

	/**
	 * Render admin head css.
	 */
	public function admin_head_css() {
		?>
		<style type="text/css">
			.appearance_page_shop-isle-pro-welcome li[data-tab-id="sites_library"] {
				display: none;
			}

			.appearance_page_shop-isle-pro-welcome #changelog .changelog {
				margin-left: 30px;
			}

			.appearance_page_shop-isle-pro-welcome #changelog .changelog h2 {
				text-align: left;
				font-size: 23px;
				font-weight: 500;
				margin-left: -20px;
			}
		</style>
		<?php
	}
}

$admin = new Shopisle_Admin_Page();
add_action( 'init', array( $admin, 'do_about_page' ) );
add_action( 'admin_head', array( $admin, 'admin_head_css' ) );
