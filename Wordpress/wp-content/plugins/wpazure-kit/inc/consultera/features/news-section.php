<?php
function wpazure_kit_consultera_section_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	
	
	/* News Section Start */
		
		$wp_customize->add_section( 'home_news_section' , array(
		'title'      => __('Latest news settings', 'wpazure-kit'),
		'panel'  => 'homepage_sections',
		'priority'   => 5,
		) );
		
		$wp_customize->add_setting( 'home_new_section_enable', array(
			'default' => true,
			'sanitize_callback' => 'consultera_home_news_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('home_new_section_enable', array(
			'label'    => __('Show news section', 'wpazure-kit' ),
			'section'  => 'home_news_section',
			'type' => 'checkbox',
		) );

		
		
		
		$wp_customize->add_setting( 'home_news_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Recent Blog Posts','wpazure-kit'),
		'sanitize_callback' => 'consultera_home_news_sanitize_text_content',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_news_section_title',array(
		'label'   => __('Section title','wpazure-kit'),
		'section' => 'home_news_section',
		'type' => 'text',
		));

		$wp_customize->add_setting( 'home_news_section_discription',array(
		'capability'     => 'edit_theme_options',
		'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
		'sanitize_callback' => 'consultera_home_news_sanitize_text_content',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_news_section_discription',array(
		'label'   => __('Section Description','wpazure-kit'),
		'section' => 'home_news_section',
		'type' => 'textarea',
		));
		
		if ( ! function_exists( 'consultera_home_news_sanitize_text_content' ) ) :
		
			function consultera_home_news_sanitize_text_content( $input, $setting ) {

				return ( stripslashes( wp_filter_post_kses( addslashes( $input ) ) ) );

			}
		endif;
		
		function consultera_home_news_sanitize_checkbox( $checked ) {
			// Boolean check.
			return ( ( isset( $checked ) && true == $checked ) ? true : false );
		}

}

add_action( 'customize_register', 'wpazure_kit_consultera_section_setting' );


	

/**
 * Add selective refresh for latest new section.
 */
function wpazure_kit_consultera_home_news_section_partials( $wp_customize ){

	// Info one selective refresh
	$wp_customize->selective_refresh->add_partial( 'home_news_section_title', array(
		'selector'            => '.blog .section-heading h2',
		'settings'            => 'home_news_section_title',
		'render_callback' => 'wpazure_kit_consultera_news_section_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'home_news_section_discription', array(
		'selector'            => '.blog .section-heading p',
		'settings'            => 'home_news_section_discription',
		'render_callback' => 'wpazure_kit_consultera_news_section_discription_render_callback',
	
	) );
}

add_action( 'customize_register', 'wpazure_kit_consultera_home_news_section_partials' );



function wpazure_kit_consultera_news_section_title_render_callback() {
	return get_theme_mod( 'home_news_section_title' );
}

function wpazure_kit_consultera_news_section_discription_render_callback() {
	return get_theme_mod( 'home_news_section_discription' );
}



