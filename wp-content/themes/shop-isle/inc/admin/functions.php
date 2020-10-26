<?php
/**
 * Retirement notice
 *
 * @package Shop Isle
 */
add_filter( 'ti_about_config_filter', 'shop_isle_retire_notice' );

/**
 * Retire notice.
 *
 * @param array $config About Page config.
 *
 * @return array
 */
function shop_isle_retire_notice( $config ) {
	$config['welcome_notice']['render_callback'] = function () {
		$theme_args = wp_get_theme();
		$name       = $theme_args->__get( 'Name' );

		$notice_template = '
			<div class="nv-notice-wrapper">
			%1$s
			<hr/>
				<div class="nv-notice-column-container">
					<div class="nv-notice-column nv-notice-image">%2$s</div>
					<div class="nv-notice-column nv-notice-starter-sites">%3$s</div>
					<div class="nv-notice-column nv-notice-documentation">%4$s</div>
				</div> 
			</div>
			<style>%5$s</style>';

		/* translators: 1 - notice title, 2 - notice message */
		$notice_header = sprintf(
			'<h2>%1$s</h2><p class="about-description">%2$s</p></hr>',
			esc_html__( 'Your theme is no longer maintained. A New, Modern WordPress Theme is Here!', 'shop-isle' ),
			sprintf(
				/* translators: %s - theme name */
				esc_html__( '%s is no longer maintained. Switch to Neve today and get more powerful features (for free).', 'shop-isle' ),
				$name
			)
		);

		$notice_picture = sprintf(
			'<picture>
					<source srcset="about:blank" media="(max-width: 1024px)">
					<img src="%1$s">
				</picture>',
			esc_url( get_template_directory_uri() . '/assets/images/neve.png' )
		);

		$notice_right_side_content = sprintf(
			'<div><h3> %1$s</h3><p>%2$s</p></div>',
			__( 'Switch to Neve today', 'shop-isle' ),
			// translators: %s - theme name
			esc_html__( 'With Neve you get a super fast, multi-purpose theme, fully AMP optimized and responsive, that works perfectly with Gutenberg and the most popular page builders like Elementor, Beaver Builder, and many more.', 'shop-isle' )
		);

		$notice_left_side_content = sprintf(
			'<div><h3> %1$s</h3><p>%2$s</p><p class="nv-buttons-wrapper"><a class="button button-hero button-primary" href="%3$s" target="_blank">%4$s</a></p> </div>',
			// translators: %s - theme name
			sprintf( esc_html__( '%s is no longer maintained', 'shop-isle' ), $name ),
			// translators: %s - theme name
			sprintf( __( 'We\'re saying goodbye to %s in favor of our more powerful Neve free WordPress theme. This means that there will not be any new features added although we will continue to update the theme for major security issues.', 'shop-isle' ), $name ),
			esc_url( admin_url( 'theme-install.php?theme=neve' ) ),
			esc_html__( 'See Neve theme', 'shop-isle' )
		);
		$style = '
				.nv-notice-wrapper p{
					font-size: 14px;
				}
				.nv-buttons-wrapper {
					padding-top: 20px !important;
				}
				.nv-notice-wrapper h2{
					margin: 0;
					font-size: 21px;
					font-weight: 400;
					line-height: 1.2;
				}
				.nv-notice-wrapper p.about-description{
					color: #72777c;
					font-size: 16px;
					margin: 0;
					padding:0px;
				}
				.nv-notice-wrapper{
					padding: 23px 10px 0;
					max-width: 1500px;
				}
				.nv-notice-wrapper hr {
					margin: 20px -23px 0;
					border-top: 1px solid #f3f4f5;
					border-bottom: none;
				}
				.nv-notice-column-container h3{	
					margin: 17px 0 0;
					font-size: 16px;
					line-height: 1.4;
				}
				.nv-notice-text p.ti-return-dashboard {
					margin-top: 30px;
				}
				.nv-notice-column-container .nv-notice-column{
					 padding-right: 60px;
				} 
				.nv-notice-column-container img{ 
					margin-top: 23px;
					width: 100%;
					border: 1px solid #f3f4f5; 
				} 
				.nv-notice-column-container { 
					display: -ms-grid;
					display: grid;
					-ms-grid-columns: 24% 32% 32%;
					grid-template-columns: 24% 32% 32%;
					margin-bottom: 13px;
				}
				.nv-notice-column-container a.button.button-hero.button-secondary,
				.nv-notice-column-container a.button.button-hero.button-primary{
					margin:0px;
				}
				@media screen and (max-width: 1280px) {
					.nv-notice-wrapper .nv-notice-column-container {
						-ms-grid-columns: 50% 50%;
						grid-template-columns: 50% 50%;
					}
					.nv-notice-column-container a.button.button-hero.button-secondary,
					.nv-notice-column-container a.button.button-hero.button-primary{
						padding:6px 18px;
					}
					.nv-notice-wrapper .nv-notice-image {
						display: none;
					}
				} 
				@media screen and (max-width: 870px) {
					 
					.nv-notice-wrapper .nv-notice-column-container {
						-ms-grid-columns: 100%;
						grid-template-columns: 100%;
					}
					.nv-notice-column-container a.button.button-hero.button-primary{
						padding:12px 36px;
					}
				}
			';
		echo sprintf(
			$notice_template,
			$notice_header,
			$notice_picture,
			$notice_left_side_content,
			$notice_right_side_content,
			$style
		);// WPCS: XSS OK.
	};

	$config['welcome_notice']['dismiss_option'] = 'shop_isle_notice_dismissed_2';

	return $config;
}
