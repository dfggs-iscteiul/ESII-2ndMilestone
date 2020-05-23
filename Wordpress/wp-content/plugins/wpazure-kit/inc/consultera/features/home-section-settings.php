<?php
function consultera_homepage_section_setting( $wp_customize ) {
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';
	
	
	class Customizer_Library_Section_Separator extends WP_Customize_Control {
			public function render_content() { 
			echo "<hr>";
			}
		}
	
	/* Frontpage Section */
	$wp_customize->add_panel( 'homepage_sections', array(
		'priority' => 95,
		'capability' => 'edit_theme_options',
		'title' => __('Homepage section settings', 'wpazure-kit'),
	) );

	
	/* Slider Section */
	$wp_customize->add_section( 'slider_section' , array(
		'title'      => __('Slider settings', 'wpazure-kit'),
		'panel'  => 'homepage_sections',
		'priority'   => 1,
   	) );
		
		// Enable slider
		$wp_customize->add_setting( 'slider_section_enable', array(
			'default' => true,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('slider_section_enable', array(
			'label'    => __('Enable slider section', 'wpazure-kit' ),
			'section'  => 'slider_section',
			'type' => 'checkbox',
		) );

		
		//Slider Image
		$wp_customize->add_setting( 'slider_image',array('default' =>  WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/slider/banner.jpg',
		'sanitize_callback' => 'esc_url_raw', 'transport' => $selective_refresh,));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'slider_image',
				array(
					'type'        => 'upload',
					'label' => __('Image','wpazure-extra'),
					'settings' =>'slider_image',
					'section' => 'slider_section',
					
				)
			)
		);
		
		//slider overlay
		$wp_customize->add_setting( 'slider_overlay', array(
			'default' => true,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('slider_overlay', array(
			'label'    => __('Enable slider overlay', 'wpazure-kit' ),
			'section'  => 'slider_section',
			'type' => 'checkbox',
		) );
		
		//Slider Background Overlay Color
		$wp_customize->add_setting( 'slider_overlay_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'rgba(0,0,0,0.30)',
            ) );	
            
		$wp_customize->add_control(new Consultera_Customize_Alpha_Color_Control( $wp_customize,'slider_overlay_color', array(
		   'label'      => __('Slider image overlay color','wpazure-kit' ),
			'palette' => true,
			'section' => 'slider_section')
		) );
	
		// Slider title
		$wp_customize->add_setting( 'slider_title',array(
		'default' => 'It is a long established fact that a reader',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'slider_title',array(
		'label'   => __('Title','wpazure-kit'),
		'section' => 'slider_section',
		'type' => 'text',
		));	
		
		//Slider discription
		$wp_customize->add_setting( 'slider_discription',array(
		'default' => 'It is a long established fact that a reader.',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'slider_discription',array(
		'label'   => __('Description','wpazure-kit'),
		'section' => 'slider_section',
		'type' => 'textarea',
		));
		
		
		// Slider button text
		$wp_customize->add_setting( 'slider_btn_txt',array(
		'default' => __('Read more','wpazure-extra'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'slider_btn_txt',array(
		'label'   => __('Button Text','wpazure-kit'),
		'section' => 'slider_section',
		'type' => 'text',
		));
		
		// Slider button link
		$wp_customize->add_setting( 'slider_btn_link',array(
		'default' => '#',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'slider_btn_link',array(
		'label'   => __('Button Link','wpazure-kit'),
		'section' => 'slider_section',
		'type' => 'text',
		));
		
		// Slider button target
		$wp_customize->add_setting(
		'slider_btn_target', 
			array(
			'default'        => true));
		$wp_customize->add_control('slider_btn_target', array(
			'label'   => __('Open link in new tab', 'wpazure-kit'),
			'section' => 'slider_section',
			'type' => 'checkbox',
		));
		
		/* Slider Section End */
		
		/* Service Section Start */
		
		$wp_customize->add_section( 'services_section' , array(
		'title'      => __('Service settings', 'wpazure-kit'),
		'panel'  => 'homepage_sections',
		'priority'   => 2,
		) );
		
		$wp_customize->add_setting( 'service_section_enable', array(
			'default' => true,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('service_section_enable', array(
			'label'    => __('Show service section', 'wpazure-kit' ),
			'section'  => 'services_section',
			'type' => 'checkbox',
		) );

		
		
		// Service section title
		$wp_customize->add_setting( 'service_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Featured Services','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_section_title',array(
		'label'   => __('Section title','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));

		//Service section discription
		$wp_customize->add_setting( 'service_section_discription',array(
		'capability'     => 'edit_theme_options',
		'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_section_discription',array(
		'label'   => __('Section Description','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'textarea',
		));
		
		
		$wp_customize->add_setting( 'service_section_separator', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Customizer_Library_Section_Separator(
			$wp_customize,
			'service_section_separator',
				array(
					'section'				=> 'services_section',
					'settings'				=> 'service_section_separator',
				)
			)
		);

		
		// Service icon feature setting
		$wp_customize->add_setting( 'service_one_icon',array(
		'default' => 'fa-pie-chart',
		));	
		$wp_customize->add_control( 'service_one_icon',array(
		'label'   => __('Service Icon','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));	
		
		
		
		// Service section title
		$wp_customize->add_setting( 'service_one_title',array(
		'default' => __('Market Analysis','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_one_title',array(
		'label'   => __('Title','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));	
		
		//Service section discription
		$wp_customize->add_setting( 'service_one_desc',array(
		'default' => 'laoreet Pellentesque molestie laoreet laoreet.',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_one_desc',array(
		'label'   => __('Description','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'textarea',
		));
		
		
		// service read more button text
		$wp_customize->add_setting( 'service_one_btn_text',array(
		'default' => __('Read more','wpazure-extra'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_one_btn_text',array(
		'label'   => __('Button Text','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));
		
		// service read more button link
		$wp_customize->add_setting( 'service_one_btn_link',array(
		'default' => __('#','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_one_btn_link',array(
		'label'   => __('Button Link','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));
		
		// service read more button tab
		$wp_customize->add_setting(
		'service_one_btn_tab', 
			array(
			'default'        => false,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		));
		$wp_customize->add_control('service_one_btn_tab', array(
			'label'   => __('Open link in new tab/window', 'wpazure-kit'),
			'section' => 'services_section',
			'type' => 'checkbox',
		));
		
		
		/* Service One Separator */
		$wp_customize->add_setting( 'service_one_separator', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Customizer_Library_Section_Separator(
			$wp_customize,
			'service_one_separator',
				array(
					'section'				=> 'services_section',
					'settings'				=> 'service_one_separator',
				)
			)
		);
		
		
		// Service icon two feature setting
		$wp_customize->add_setting( 'service_two_icon',array(
		'default' => 'fa-line-chart',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		));	
		$wp_customize->add_control( 'service_two_icon',array(
		'label'   => __('Service Icon','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));	
		
		
		
		// Service section title
		$wp_customize->add_setting( 'service_two_title',array(
		'default' => __('Growth strategies','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_two_title',array(
		'label'   => __('Title','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));	
		
		//Service section discription
		$wp_customize->add_setting( 'service_two_desc',array(
		'default' => 'laoreet Pellentesque molestie laoreet laoreet.',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_two_desc',array(
		'label'   => __('Description','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'textarea',
		));
		
		
		// service read more button text
		$wp_customize->add_setting( 'service_two_btn_text',array(
		'default' => __('Read more','wpazure-extra'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_two_btn_text',array(
		'label'   => __('Button Text','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));
		
		// service read more button link
		$wp_customize->add_setting( 'service_two_btn_link',array(
		'default' => '#',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_two_btn_link',array(
		'label'   => __('Button Link','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));
		
		// service read more button tab
		$wp_customize->add_setting(
		'service_two_btn_tab', 
			array(
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
			'default'        => false,


		));
		$wp_customize->add_control('service_two_btn_tab', array(
			'label'   => __('Open link in new tab/window', 'wpazure-kit'),
			'section' => 'services_section',
			'type' => 'checkbox',
		));
		
		
		/* Service two Separator */
		$wp_customize->add_setting( 'service_two_separator', array(
			'capability'			=> 'edit_theme_options',
			'sanitize_callback'	=> 'wp_filter_nohtml_kses',
		));
		$wp_customize->add_control(
			new Customizer_Library_Section_Separator(
			$wp_customize,
			'service_two_separator',
				array(
					'section'				=> 'services_section',
					'settings'				=> 'service_two_separator',
				)
			)
		);
		
		
		// Service icon three feature setting
		$wp_customize->add_setting( 'service_three_icon',array(
		'default' => 'fa-users',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		));	
		$wp_customize->add_control( 'service_three_icon',array(
		'label'   => __('Service Icon','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));	
		
		
		
		// Service section title
		$wp_customize->add_setting( 'service_three_title',array(
		'default' => __('Employee Benefits','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_three_title',array(
		'label'   => __('Title','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));	
		
		//Service section discription
		$wp_customize->add_setting( 'service_three_desc',array(
		'default' => 'laoreet Pellentesque molestie laoreet laoreet.',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_three_desc',array(
		'label'   => __('Description','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'textarea',
		));
		
		
		// service read more button text
		$wp_customize->add_setting( 'service_three_btn_text',array(
		'default' => __('Read more','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_three_btn_text',array(
		'label'   => __('Button Text','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));
		
		// service read more button link
		$wp_customize->add_setting( 'service_three_btn_link',array(
		'default' => '#',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'service_three_btn_link',array(
		'label'   => __('Button Link','wpazure-kit'),
		'section' => 'services_section',
		'type' => 'text',
		));
		
		// service read more button tab
		$wp_customize->add_setting(
		'service_three_btn_tab', 
			array(
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
			'default'        => false,
		));
		$wp_customize->add_control('service_three_btn_tab', array(
			'label'   => __('Open link in new tab/window', 'wpazure-extra'),
			'section' => 'services_section',
			'type' => 'checkbox',
		));
		
		/* Service Section End */
		
		
		
		/* Project Section Start */
		$wp_customize->add_section( 'project_section' , array(
				'title'      => __('Project/Portfolio settings', 'wpazure-kit'),
				'panel'  => 'homepage_sections',
				'priority'   => 3,
			) );
			
			// Enable slider
		
			$wp_customize->add_setting( 'project_section_enable', array(
				'default' => true,
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
			) );
			
			$wp_customize->add_control('project_section_enable', array(
				'label'    => __('Enable project section', 'wpazure-kit' ),
				'section'  => 'project_section',
				'type' => 'checkbox',
			) );
			
			// project section title
			$wp_customize->add_setting( 'project_section_title',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => __('Our Latest Work','wpazure-kit'),
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'project_section_title',array(
			'label'   => __('Title','wpazure-kit'),
			'section' => 'project_section',
			'type' => 'text',
			));	
			
			//project section discription
			$wp_customize->add_setting( 'project_section_description',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'project_section_description',array(
			'label'   => __('Description','wpazure-kit'),
			'section' => 'project_section',
			'type' => 'textarea',
			));	
			
			/* Project Section Separator */
			$wp_customize->add_setting( 'project_separator', array(
				'capability'			=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Customizer_Library_Section_Separator(
				$wp_customize,
				'project_separator',
					array(
						'section'				=> 'project_section',
						'settings'				=> 'project_separator',
					)
				)
			);
		 
		 
			//project one image
			$wp_customize->add_setting( 'project_image_one',array('default' => WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/project/project1.jpg',
			'sanitize_callback' => 'esc_url_raw', 'transport' => $selective_refresh, ));
		 
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'project_image_one',
					array(
						'label' => __('Image','wpazure-kit'),
						'settings' =>'project_image_one',
						'section' => 'project_section',
						'type' => 'upload',
					)
				)
			);
			
			
			//project one Title
			$wp_customize->add_setting(
			'project_title_one', array(
				'default'        => __('Creative Image','wpazure-kit'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('project_title_one', array(
				'label'   => __('Title', 'wpazure-kit'),
				'section' => 'project_section',
				'type' => 'text',
			));
			
			//project one description
			$wp_customize->add_setting(
			'project_desc_one', array(
				'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit..',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('project_desc_one', array(
				'label'   => __('Description', 'wpazure-kit'),
				'section' => 'project_section',
				'type' => 'text',
			));
			
			/* Project One Separator */
			$wp_customize->add_setting( 'project_one_separator', array(
				'capability'			=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Customizer_Library_Section_Separator(
				$wp_customize,
				'project_one_separator',
					array(
						'section'				=> 'project_section',
						'settings'				=> 'project_one_separator',
					)
				)
			);
			
			
			
			//project two image
			$wp_customize->add_setting( 'project_image_two',array('default' => WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/project/project2.jpg',
			'sanitize_callback' => 'esc_url_raw','transport'         => $selective_refresh,));
		 
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'project_image_two',
					array(
						'label' => __('Image','wpazure-kit'),
						'settings' =>'project_image_two',
						'section' => 'project_section',
						'type' => 'upload',
					)
				)
			);
			
			
			//project two Title
			$wp_customize->add_setting(
			'project_title_two', array(
				'default'        => __('Awesome Illustration','wpazure-kit'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('project_title_two', array(
				'label'   => __('Title', 'wpazure-kit'),
				'section' => 'project_section',
				'type' => 'text',
			));
			
			//project two description
			$wp_customize->add_setting(
			'project_desc_two', array(
				'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit..',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('project_desc_two', array(
				'label'   => __('Description', 'wpazure-kit'),
				'section' => 'project_section',
				'type' => 'text',
			));
			
			//project three image
			$wp_customize->add_setting( 'project_image_three',array('default' => WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/project/project3.jpg',
			'sanitize_callback' => 'esc_url_raw',
			'transport'         => $selective_refresh,
			));
		 
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'project_image_three',
					array(
						'label' => __('Image','wpazure-kit'),
						'settings' =>'project_image_three',
						'section' => 'project_section',
						'type' => 'upload',
					)
				)
			);
			
			
			/* Project Three Separator */
			$wp_customize->add_setting( 'project_three_separator', array(
				'capability'			=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Customizer_Library_Section_Separator(
				$wp_customize,
				'project_three_separator',
					array(
						'section'				=> 'project_section',
						'settings'				=> 'project_three_separator',
					)
				)
			);
			
			//Portfolio three Title
			$wp_customize->add_setting(
			'project_title_three', array(
				'default'        => __('3D Model','wpazure-kit'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('project_title_three', array(
				'label'   => __('Title', 'wpazure-kit'),
				'section' => 'project_section',
				'type' => 'text',
			));
			
			//Portfolio three description
			$wp_customize->add_setting(
			'project_desc_three', array(
				'default'        => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit..',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('project_desc_three', array(
				'label'   => __('Description', 'wpazure-kit'),
				'section' => 'project_section',
				'type' => 'text',
			));
			
			/* Project section setting Ends */
			
			
			
			/* start woo product section settings*/
			
		$wp_customize->add_section( 'product_section' , array(
				'title'      => __('Product settings', 'wpazure-kit'),
				'panel'  => 'homepage_sections',
				'priority'   => 5,
			) );
			
			// Enable Product section
		
			$wp_customize->add_setting( 'product_section_enable', array(
				'default' => true,
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
			) );
			
			$wp_customize->add_control('product_section_enable', array(
				'label'    => __('Enable Product section', 'wpazure-kit' ),
				'section'  => 'product_section',
				'type' => 'checkbox',
			) );
			
			// testimonial section title
			$wp_customize->add_setting( 'product_section_title',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => __('Our products','wpazure-kit'),
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'product_section_title',array(
			'label'   => __('Title','wpazure-kit'),
			'section' => 'product_section',
			'type' => 'text',
			));	
			
			//testimonial section discription
			$wp_customize->add_setting( 'product_section_description',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'product_section_description',array(
			'label'   => __('Description','wpazure-kit'),
			'section' => 'product_section',
			'type' => 'textarea',
			));	
			/*End Woo product section settings*/
			
			
			
			/* Testimonial Section Start */
		$wp_customize->add_section( 'testimonial_section' , array(
				'title'      => __('Testimonial settings', 'wpazure-kit'),
				'panel'  => 'homepage_sections',
				'priority'   => 4,
			) );
			
			// Enable testimonial
		
			$wp_customize->add_setting( 'testimonial_section_enable', array(
				'default' => true,
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
			) );
			
			$wp_customize->add_control('testimonial_section_enable', array(
				'label'    => __('Enable Testimonial section', 'wpazure-kit' ),
				'section'  => 'testimonial_section',
				'type' => 'checkbox',
			) );
			
			// testimonial section title
			$wp_customize->add_setting( 'testimonial_section_title',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => __('What Clients Say','wpazure-kit'),
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'testimonial_section_title',array(
			'label'   => __('Title','wpazure-kit'),
			'section' => 'testimonial_section',
			'type' => 'text',
			));	
			
			//testimonial section discription
			$wp_customize->add_setting( 'testimonial_section_description',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'testimonial_section_description',array(
			'label'   => __('Description','wpazure-kit'),
			'section' => 'testimonial_section',
			'type' => 'textarea',
			));	
			
			/* testimonial Section Separator */
			$wp_customize->add_setting( 'testimonial_separator', array(
				'capability'			=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Customizer_Library_Section_Separator(
				$wp_customize,
				'testimonial_separator',
					array(
						'section'				=> 'testimonial_section',
						'settings'				=> 'testimonial_separator',
					)
				)
			);
		 
		 
			//testimonial one image
			$wp_customize->add_setting( 'testimonial_image_one',array('default' => WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/testimonial/test1.jpg',
			'sanitize_callback' => 'esc_url_raw', 'transport' => $selective_refresh, ));
		 
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'testimonial_image_one',
					array(
						'label' => __('Image','wpazure-kit'),
						'settings' =>'testimonial_image_one',
						'section' => 'testimonial_section',
						'type' => 'upload',
					)
				)
			);
			
			
			//testimonial one Name
			$wp_customize->add_setting(
			'testimonial_name_one', array(
				'default'        => __('Petrik Johnson','wpazure-kit'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('testimonial_name_one', array(
				'label'   => __('Name', 'wpazure-kit'),
				'section' => 'testimonial_section',
				'type' => 'text',
			));
			
			//testimonial one designation
			$wp_customize->add_setting(
			'testimonial_desi_one', array(
				'default'        => 'CEO John Softwares',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('testimonial_desi_one', array(
				'label'   => __('Designation', 'wpazure-kit'),
				'section' => 'testimonial_section',
				'type' => 'text',
			));
			
			$wp_customize->add_setting( 'testimonial_des_one',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'testimonial_des_one',array(
			'label'   => __('Description','wpazure-kit'),
			'section' => 'testimonial_section',
			'type' => 'textarea',
			));
			
			/* testimonial One Separator */
			$wp_customize->add_setting( 'testimonial_one_separator', array(
				'capability'			=> 'edit_theme_options',
				'sanitize_callback'	=> 'wp_filter_nohtml_kses',
			));
			$wp_customize->add_control(
				new Customizer_Library_Section_Separator(
				$wp_customize,
				'testimonial_one_separator',
					array(
						'section'				=> 'testimonial_section',
						'settings'				=> 'testimonial_one_separator',
					)
				)
			);
			
			//testimonial Two image
			$wp_customize->add_setting( 'testimonial_image_two',array('default' => WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/testimonial/test2.jpg',
			'sanitize_callback' => 'esc_url_raw', 'transport' => $selective_refresh, ));
		 
			$wp_customize->add_control(
				new WP_Customize_Image_Control(
					$wp_customize,
					'testimonial_image_two',
					array(
						'label' => __('Image','wpazure-kit'),
						'settings' =>'testimonial_image_two',
						'section' => 'testimonial_section',
						'type' => 'upload',
					)
				)
			);
			
			
			//testimonial one Title
			$wp_customize->add_setting(
			'testimonial_name_two', array(
				'default'        => __('Petrik Johnson','wpazure-kit'),
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('testimonial_name_two', array(
				'label'   => __('Name', 'wpazure-kit'),
				'section' => 'testimonial_section',
				'type' => 'text',
			));
			
			//testimonial one designation
			$wp_customize->add_setting(
			'testimonial_desi_two', array(
				'default'        => 'CEO John Softwares',
				'capability'     => 'edit_theme_options',
				'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
				'transport'         => $selective_refresh,
			));
			$wp_customize->add_control('testimonial_desi_two', array(
				'label'   => __('Designation', 'wpazure-kit'),
				'section' => 'testimonial_section',
				'type' => 'text',
			));
			
			$wp_customize->add_setting( 'testimonial_des_two',array(
			'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
			'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
			'transport'         => $selective_refresh,
			));	
			$wp_customize->add_control( 'testimonial_des_two',array(
			'label'   => __('Description','wpazure-kit'),
			'section' => 'testimonial_section',
			'type' => 'textarea',
			));
			
		/* CTA Section */
		$wp_customize->add_section( 'cta_section' , array(
			'title'      => __('CTA settings', 'wpazure-kit'),
			'panel'  => 'homepage_sections',
			
		) );
		
		// CTA slider
		$wp_customize->add_setting( 'cta_section_enable', array(
			'default' => true,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('cta_section_enable', array(
			'label'    => __('Enable CTA section', 'wpazure-kit' ),
			'section'  => 'cta_section',
			'type' => 'checkbox',
		) );

		
		//CTA Image
		$wp_customize->add_setting( 'cta_bg_image',array('default' =>  WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/fun-facts.jpg',
		'sanitize_callback' => 'esc_url_raw',));
 
		$wp_customize->add_control(
			new WP_Customize_Image_Control(
				$wp_customize,
				'cta_bg_image',
				array(
					'type'        => 'upload',
					'label' => __('Image','wpazure-kit'),
					'settings' =>'cta_bg_image',
					'section' => 'cta_section',
					
				)
			)
		);
		
		//CTA overlay
		$wp_customize->add_setting( 'cta_overlay', array(
			'default' => true,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('cta_overlay', array(
			'label'    => __('Enable CTA overlay', 'wpazure-kit' ),
			'section'  => 'cta_section',
			'type' => 'checkbox',
		) );
		
		//CTA Background Overlay Color
		$wp_customize->add_setting( 'cta_overlay_color', array(
			'sanitize_callback' => 'sanitize_text_field',
			'default' => 'rgba(9,60,129,0.8)',
            ) );	
            
		$wp_customize->add_control(new Consultera_Customize_Alpha_Color_Control( $wp_customize,'cta_overlay_color', array(
		   'label'      => __('CTA overlay color','wpazure-kit' ),
			'palette' => true,
			'section' => 'cta_section')
		) );
	
		// CTA title
		$wp_customize->add_setting( 'cta_title',array(
		'default' => 'We Provide the Best Solution with great team Effort',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'cta_title',array(
		'label'   => __('Title','wpazure-kit'),
		'section' => 'cta_section',
		'type' => 'text',
		));	
		
		//CTA discription
		$wp_customize->add_setting( 'cta_discription',array(
		'default' => 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'cta_discription',array(
		'label'   => __('Description','wpazure-kit'),
		'section' => 'cta_section',
		'type' => 'textarea',
		));
		
		
		// CTA button text
		$wp_customize->add_setting( 'cta_btn_txt',array(
		'default' => __('Contact Us','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'cta_btn_txt',array(
		'label'   => __('Button Text','wpazure-kit'),
		'section' => 'cta_section',
		'type' => 'text',
		));
		
		// CTA button link
		$wp_customize->add_setting( 'cta_btn_link',array(
		'default' => '#',
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'cta_btn_link',array(
		'label'   => __('Button Link','wpazure-kit'),
		'section' => 'cta_section',
		'type' => 'text',
		));
		
		// CTA button target
		$wp_customize->add_setting(
		'cta_btn_target', 
			array(
			'default'        => true));
		$wp_customize->add_control('cta_btn_target', array(
			'label'   => __('Open link in new tab', 'wpazure-kit'),
			'section' => 'cta_section',
			'type' => 'checkbox',
		));
		
		/* CTA Section End */
			
			
		/* News Section Start */
		
		$wp_customize->add_section( 'home_news_section' , array(
		'title'      => __('Latest news settings', 'wpazure-kit'),
		'panel'  => 'homepage_sections',
		
		) );
		
		$wp_customize->add_setting( 'home_new_section_enable', array(
			'default' => true,
			'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_checkbox',
		) );
		
		$wp_customize->add_control('home_new_section_enable', array(
			'label'    => __('Show news section', 'wpazure-kit' ),
			'section'  => 'home_news_section',
			'type' => 'checkbox',
		) );

		
		
		
		$wp_customize->add_setting( 'home_news_section_title',array(
		'capability'     => 'edit_theme_options',
		'default' => __('Recent Blog Posts','wpazure-kit'),
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
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
		'sanitize_callback' => 'wpazure_kit_consultera_home_section_sanitize_text',
		'transport'         => $selective_refresh,
		));	
		$wp_customize->add_control( 'home_news_section_discription',array(
		'label'   => __('Section Description','wpazure-kit'),
		'section' => 'home_news_section',
		'type' => 'textarea',
		));
	
		
	}
	add_action( 'customize_register', 'consultera_homepage_section_setting' );
	
	//Sanatize text validation
	if ( ! function_exists( 'wpazure_kit_consultera_home_section_sanitize_text' ) ) :
		function wpazure_kit_consultera_home_section_sanitize_text( $input ) {

				return wp_kses_post( force_balance_tags( $input ) );
		}
	endif;

	if ( ! function_exists( 'wpazure_kit_consultera_home_section_sanitize_checkbox' ) ) :
		function wpazure_kit_consultera_home_section_sanitize_checkbox( $input ) {
				// Boolean check 
		return ( ( isset( $input ) && true == $input ) ? true : false );
		
		}
	endif;
	
	
	/**
	 * Add selective refresh for Front page Slider section controls.
	*/
	function wpazure_kit_consultera_register_slider_section_partials( $wp_customize ){

		
		
		$wp_customize->selective_refresh->add_partial( 'slider_image', array(
			'selector'            => '.main-slider .slider-item',
			'settings'            => 'slider_image',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'slider_title', array(
			'selector'            => '.main-slider .slider-text h1',
			'settings'            => 'slider_title',
			'render_callback'  => 'wpazure_kit_consultera_slider_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'slider_discription', array(
			'selector'            => '.main-slider .slider-text p',
			'settings'            => 'slider_discription',
			'render_callback'  => 'wpazure_kit_consultera_slider_description_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'slider_btn_txt', array(
			'selector'            => '.main-slider .btn-text',
			'settings'            => 'slider_btn_txt',
			'render_callback'  => 'wpazure_kit_consultera_slider_btn_render_callback',
		
		) );
	}

	add_action( 'customize_register', 'wpazure_kit_consultera_register_slider_section_partials' );


	function wpazure_kit_consultera_slider_title_render_callback() {
		return get_theme_mod( 'slider_title' );
	}

	function wpazure_kit_consultera_slider_description_render_callback() {
		return get_theme_mod( 'slider_discription' );
	}

	function wpazure_kit_consultera_slider_btn_render_callback() {
		return get_theme_mod( 'slider_btn_txt' );
	}
	
	
	/**
	 * Add selective refresh for Front page Service section controls.
	*/
	function wpazure_kit_consultera_register_service_section_partials( $wp_customize ){

		
		
		$wp_customize->selective_refresh->add_partial( 'service_section_title', array(
			'selector'            => '.services-section .section-heading h2',
			'settings'            => 'service_section_title',
			'render_callback'	  => 'wpazure_kit_consultera_service_section_title_render_callback',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_section_discription', array(
			'selector'            => '.services-section .section-heading p',
			'settings'            => 'service_section_discription',
			'render_callback'  => 'wpazure_kit_consultera_service_section_description_render_callback',
		
		) );
		
		// service one selective refresh
		$wp_customize->selective_refresh->add_partial( 'service_one_icon', array(
			'selector'            => '.services-section .service-one .box-icon',
			'settings'            => 'service_one_icon',
			'render_callback'  => 'wpazure_kit_consultera_service_one_icon_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_one_title', array(
			'selector'            => '.services-section .service-one h3',
			'settings'            => 'service_one_title',
			'render_callback'  => 'wpazure_kit_consultera_service_one_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_one_desc', array(
			'selector'            => '.services-section .service-one p',
			'settings'            => 'service_one_desc',
			'render_callback'  => 'wpazure_kit_consultera_service_one_desc_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_one_btn_text', array(
			'selector'            => '.services-section .service-one .read-more',
			'settings'            => 'service_one_btn_text',
			'render_callback'  => 'wpazure_kit_consultera_service_one_btn_render_callback',
		
		) );
		
		// service two selective refresh
		$wp_customize->selective_refresh->add_partial( 'service_two_icon', array(
			'selector'            => '.services-section .service-two .box-icon',
			'settings'            => 'service_two_icon',
			'render_callback'  => 'wpazure_kit_consultera_service_two_icon_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_two_title', array(
			'selector'            => '.services-section .service-two h3',
			'settings'            => 'service_two_title',
			'render_callback'  => 'wpazure_kit_consultera_service_two_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_two_desc', array(
			'selector'            => '.services-section .service-two p',
			'settings'            => 'service_two_desc',
			'render_callback'  => 'wpazure_kit_consultera_service_two_desc_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_two_btn_text', array(
			'selector'            => '.services-section .service-two .read-more',
			'settings'            => 'service_two_btn_text',
			'render_callback'  => 'wpazure_kit_consultera_service_two_btn_render_callback',
		
		) );
		
		// service three selective refresh
		$wp_customize->selective_refresh->add_partial( 'service_three_icon', array(
			'selector'            => '.services-section .service-three .box-icon',
			'settings'            => 'service_three_icon',
			'render_callback'  => 'wpazure_kit_consultera_service_three_icon_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_three_title', array(
			'selector'            => '.services-section .service-three h3',
			'settings'            => 'service_three_title',
			'render_callback'  => 'wpazure_kit_consultera_service_three_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_three_desc', array(
			'selector'            => '.services-section .service-three p',
			'settings'            => 'service_three_desc',
			'render_callback'  => 'wpazure_kit_consultera_service_three_desc_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'service_three_btn_text', array(
			'selector'            => '.services-section .service-three .read-more',
			'settings'            => 'service_three_btn_text',
			'render_callback'  => 'wpazure_kit_consultera_service_three_btn_render_callback',
		
		) );
	}

	add_action( 'customize_register', 'wpazure_kit_consultera_register_service_section_partials' );
	
	// Service section render callback function
	function wpazure_kit_consultera_service_section_title_render_callback() {
		return get_theme_mod( 'service_section_title' );
	}
	
	function wpazure_kit_consultera_service_section_description_render_callback() {
		return get_theme_mod( 'service_section_discription' );
	}
	
	function wpazure_kit_consultera_service_one_icon_render_callback() {
		return get_theme_mod( 'service_one_icon' );
	}
	function wpazure_kit_consultera_service_one_title_render_callback() {
		return get_theme_mod( 'service_one_title' );
	}
	function wpazure_kit_consultera_service_one_desc_render_callback() {
		return get_theme_mod( 'service_one_desc' );
	}
	function wpazure_kit_consultera_service_one_btn_render_callback(){
		return get_theme_mod( 'service_one_btn_text' );
	}
	function wpazure_kit_consultera_service_two_icon_render_callback() {
		return get_theme_mod( 'service_two_icon' );
	}
	function wpazure_kit_consultera_service_two_title_render_callback() {
		return get_theme_mod( 'service_two_title' );
	}
	function wpazure_kit_consultera_service_two_desc_render_callback() {
		return get_theme_mod( 'service_two_desc' );
	}
	function wpazure_kit_consultera_service_two_btn_render_callback(){
		return get_theme_mod( 'service_two_btn_text' );
	}
	function wpazure_kit_consultera_service_three_icon_render_callback() {
		return get_theme_mod( 'service_three_icon' );
	}
	function wpazure_kit_consultera_service_three_title_render_callback() {
		return get_theme_mod( 'service_three_title' );
	}
	function wpazure_kit_consultera_service_three_desc_render_callback() {
		return get_theme_mod( 'service_three_desc' );
	}
	function wpazure_kit_consultera_service_three_btn_render_callback(){
		return get_theme_mod( 'service_three_btn_text' );
	}
	
	/**
	 * Add selective refresh for Front page project section controls.
	*/
	function wpazure_kit_consultera_register_project_section_partials( $wp_customize ){

		
		
		$wp_customize->selective_refresh->add_partial( 'project_section_title', array(
			'selector'            => '.project-section .section-heading h2',
			'settings'            => 'project_section_title',
			'render_callback'	  => 'wpazure_kit_consultera_project_section_title_render_callback',
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_section_description', array(
			'selector'            => '.project-section .section-heading p',
			'settings'            => 'project_section_description',
			'render_callback'  => 'wpazure_kit_consultera_project_section_description_render_callback',
		
		) );
		
		// Project one selective refresh
		$wp_customize->selective_refresh->add_partial( 'project_image_one', array(
			'selector'            => '.project-section .project-one .ce-item img',
			'settings'            => 'project_image_one',
			//'render_callback'  => 'wpazure_kit_consultera_project_one_img_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_title_one', array(
			'selector'            => '.project-section .project-one .box-content .item-title',
			'settings'            => 'project_title_one',
			'render_callback'  => 'wpazure_kit_consultera_project_one_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_desc_one', array(
			'selector'            => '.project-section .project-one .box-content .ce-des',
			'settings'            => 'project_desc_one',
			'render_callback'  => 'wpazure_kit_consultera_project_one_desc_render_callback',
		
		) );
		
		// Project two selective refresh
		$wp_customize->selective_refresh->add_partial( 'project_image_two', array(
			'selector'            => '.project-section .project-two .ce-item img',
			'settings'            => 'project_image_two',
			//'render_callback'  => 'wpazure_kit_consultera_project_two_img_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_title_two', array(
			'selector'            => '.project-section .project-two .box-content .item-title',
			'settings'            => 'project_title_two',
			'render_callback'  => 'wpazure_kit_consultera_project_two_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_desc_two', array(
			'selector'            => '.project-section .project-two .box-content .ce-des',
			'settings'            => 'project_desc_two',
			'render_callback'  => 'wpazure_kit_consultera_project_two_desc_render_callback',
		
		) );
		
		// Project three selective refresh
		$wp_customize->selective_refresh->add_partial( 'project_image_three', array(
			'selector'            => '.project-section .project-three .ce-item img',
			'settings'            => 'project_image_three',
			//'render_callback'  => 'wpazure_kit_consultera_project_three_img_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_title_three', array(
			'selector'            => '.project-section .project-three .box-content .item-title',
			'settings'            => 'project_title_three',
			'render_callback'  => 'wpazure_kit_consultera_project_three_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'project_desc_three', array(
			'selector'            => '.project-section .project-three .box-content .ce-des',
			'settings'            => 'project_desc_three',
			'render_callback'  => 'wpazure_kit_consultera_project_three_desc_render_callback',
		
		) );
	}

	add_action( 'customize_register', 'wpazure_kit_consultera_register_project_section_partials' );
	
	// Project section render callback function
	function wpazure_kit_consultera_project_section_title_render_callback() {
		return get_theme_mod( 'project_section_title' );
	}
	
	function wpazure_kit_consultera_project_section_description_render_callback() {
		return get_theme_mod( 'project_section_description' );
	}
	
	function wpazure_kit_consultera_project_one_img_render_callback() {
		return get_theme_mod( 'project_image_one' );
	}
	function wpazure_kit_consultera_project_one_title_render_callback() {
		return get_theme_mod( 'project_title_one' );
	}
	function wpazure_kit_consultera_project_one_desc_render_callback() {
		return get_theme_mod( 'project_desc_one' );
	}
	
	function wpazure_kit_consultera_project_two_img_render_callback() {
		return get_theme_mod( 'project_image_two' );
	}
	function wpazure_kit_consultera_project_two_title_render_callback() {
		return get_theme_mod( 'project_title_two' );
	}
	function wpazure_kit_consultera_project_two_desc_render_callback() {
		return get_theme_mod( 'project_desc_two' );
	}
	
	function wpazure_kit_consultera_project_three_img_render_callback() {
		return get_theme_mod( 'project_image_three' );
	}
	function wpazure_kit_consultera_project_three_title_render_callback() {
		return get_theme_mod( 'project_title_three' );
	}
	function wpazure_kit_consultera_project_three_desc_render_callback() {
		return get_theme_mod( 'project_desc_three' );
	}
	
	/**
	 * Add selective refresh for Front page Testimonial section controls.
	*/
	function wpazure_kit_consultera_register_testimonial_section_partials( $wp_customize ){
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_section_title', array(
			'selector'            => '.testimonial-section .section-heading h2',
			'settings'            => 'testimonial_section_title',
			'render_callback'  => 'wpazure_kit_consultera_test_section_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_section_description', array(
			'selector'            => '.testimonial-section .section-heading p',
			'settings'            => 'testimonial_section_description',
			'render_callback'  => 'wpazure_kit_consultera_test_section_desc_render_callback',
		
		) );

		
		// testimonial One
		$wp_customize->selective_refresh->add_partial( 'testimonial_image_one', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testimonial-one .testimonial-detail .testimonial-img img',
			'settings'            => 'testimonial_image_one',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_name_one', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testimonial-one .testimonial-detail strong.text-blue',
			'settings'            => 'testimonial_name_one',
			'render_callback'  => 'wpazure_kit_consultera_test_name_one_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_desi_one', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testimonial-one .testimonial-detail .testimonial-designation',
			'settings'            => 'testimonial_desi_one',
			'render_callback'  => 'wpazure_kit_consultera_test_desg_one_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_des_one', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testimonial-one .testimonial-text p',
			'settings'            => 'testimonial_des_one',
			'render_callback'  => 'wpazure_kit_consultera_test_desc_one_render_callback',
		
		) );
		
		// testimonial two
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_image_two', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testimonial-two .testimonial-detail .testimonial-img img',
			'settings'            => 'testimonial_image_two',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_name_two', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testi-two .testimonial-two .testimonial-detail strong.text-blue',
			'settings'            => 'testimonial_name_two',
			'render_callback'  => 'wpazure_kit_consultera_test_name_two_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_desi_two', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testi-two .testimonial-detail .testimonial-designation',
			'settings'            => 'testimonial_desi_two',
			'render_callback'  => 'wpazure_kit_consultera_test_desg_two_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'testimonial_des_two', array(
			'selector'            => '.testimonial-section .testimonial-wrapper .testimonial-text p',
			'settings'            => 'testimonial_des_two',
			'render_callback'  => 'wpazure_kit_consultera_test_desc_two_render_callback',
		
		) );
		
	}

	add_action( 'customize_register', 'wpazure_kit_consultera_register_testimonial_section_partials' );
	
	
	
	
	
	
	function wpazure_kit_consultera_test_section_title_render_callback() {
		return get_theme_mod( 'testimonial_section_title' );
	}

	function wpazure_kit_consultera_test_section_desc_render_callback() {
		return get_theme_mod( 'testimonial_section_description' );
	}
	
	

	function wpazure_kit_consultera_test_name_one_render_callback() {
		return get_theme_mod( 'testimonial_name_one' );
	}

	function wpazure_kit_consultera_test_desg_one_render_callback() {
		return get_theme_mod( 'testimonial_desi_one' );
	}

	function wpazure_kit_consultera_test_desc_one_render_callback() {
		return get_theme_mod( 'testimonial_des_one' );
	}
	
	function wpazure_kit_consultera_test_name_two_render_callback() {
		return get_theme_mod( 'testimonial_name_two' );
	}

	function wpazure_kit_consultera_test_desg_two_render_callback() {
		return get_theme_mod( 'testimonial_desi_two' );
	}

	function wpazure_kit_consultera_test_desc_two_render_callback() {
		return get_theme_mod( 'testimonial_des_two' );
	}
	
	
	/**
	 * Add selective refresh for Front page Product section controls.
	*/
	function wpazure_kit_consultera_register_product_section_partials( $wp_customize ){
		
		$wp_customize->selective_refresh->add_partial( 'product_section_title', array(
			'selector'            => '.product-section .section-heading h2',
			'settings'            => 'product_section_title',
			'render_callback'  => 'wpazure_kit_consultera_product_section_title_render_callback',
		
		) );
		
		$wp_customize->selective_refresh->add_partial( 'product_section_description', array(
			'selector'            => '.product-section .section-heading p',
			'settings'            => 'product_section_description',
			'render_callback'  => 'wpazure_kit_consultera_product_section_desc_render_callback',
		
		) );
	
	}

	add_action( 'customize_register', 'wpazure_kit_consultera_register_product_section_partials' );
	
	function wpazure_kit_consultera_product_section_title_render_callback() {
		return get_theme_mod( 'product_section_title' );
	}

	function wpazure_kit_consultera_product_section_desc_render_callback() {
		return get_theme_mod( 'product_section_description' );
	}
	
	
	
	
/**
 * Add selective refresh for CTA section.
 */
function wpazure_kit_consultera_home_cta_section_partials( $wp_customize ){

	
	$wp_customize->selective_refresh->add_partial( 'cta_title', array(
		'selector'            => '.cta-section .section-heading .title',
		'settings'            => 'cta_title',
		'render_callback' => 'wpazure_kit_consultera_cta_section_title_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'cta_discription', array(
		'selector'            => '.cta-section .section-heading p',
		'settings'            => 'cta_discription',
		'render_callback' => 'wpazure_kit_consultera_cta_section_discription_render_callback',
	
	) );
	
	$wp_customize->selective_refresh->add_partial( 'cta_btn_txt', array(
		'selector'            => '.cta-section .section-heading .button-md',
		'settings'            => 'cta_btn_txt',
		'render_callback' => 'wpazure_kit_consultera_cta_section_button_render_callback',
	
	) );
}
	
	add_action( 'customize_register', 'wpazure_kit_consultera_home_cta_section_partials' );
	
	
	
	function wpazure_kit_consultera_cta_section_title_render_callback() {
	return get_theme_mod( 'cta_title' );
	}

	function wpazure_kit_consultera_cta_section_discription_render_callback() {
		return get_theme_mod( 'cta_discription' );
	}

	function wpazure_kit_consultera_cta_section_button_render_callback() {
		return get_theme_mod( 'cta_btn_txt' );
	}
	
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
	