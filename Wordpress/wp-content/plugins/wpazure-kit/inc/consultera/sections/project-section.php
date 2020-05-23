<?php
/**
 * Project section
 */
if ( ! function_exists( 'wpazure_kit_consultera_project' ) ) :
	function wpazure_kit_consultera_project() {
	//Get section data	
	$HomeProjectEnabled = get_theme_mod('project_section_enable',true);
	$HomeProjectSectionTitle = get_theme_mod('project_section_title','Our Latest Work');
	$HomeProjectSectionDesc = get_theme_mod('project_section_description','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
	// Get project data
	$HomeProjectOneImage = get_theme_mod('project_image_one',WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/project/project1.jpg');
	$HomeProjectOneTitle = get_theme_mod('project_title_one','Creative Image');
	$HomeProjectOneDesc = get_theme_mod('project_desc_one','Lorem ipsum dolor sit amet, consectetur adipisicing elit..');
	
	$HomeProjectTwoImage = get_theme_mod('project_image_two',WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/project/project2.jpg');
	$HomeProjectTwoTitle = get_theme_mod('project_title_two','Awesome Illustration');
	$HomeProjectTwoDesc = get_theme_mod('project_desc_two','Lorem ipsum dolor sit amet, consectetur adipisicing elit..');
	
	$HomeProjectThreeImage = get_theme_mod('project_image_three',WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/project/project3.jpg');
	$HomeProjectThreeTitle = get_theme_mod('project_title_three','3D Model');
	$HomeProjectThreeDesc = get_theme_mod('project_desc_three','Lorem ipsum dolor sit amet, consectetur adipisicing elit..');
	
		if($HomeProjectEnabled == true){ ?>
		<!-- PORTFOLIO SECTION START -->
			<section class="section-padding-100 bg-white project-section">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-12">
							<div class="section-heading text-center">
								<?php if(!empty($HomeProjectSectionTitle)){?>
								<h2 class="title"><?php echo esc_html($HomeProjectSectionTitle); ?></h2>
								<?php } if(!empty($HomeProjectSectionDesc)){?>
								<p><?php echo esc_html($HomeProjectSectionDesc);?></p>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-sm-12 col-12">
							<div class="ce-portfolio">      
								<div class="ce-filters-content">
									<div class="row ce-portfolio-grid">
										<div class="col-md-4 col-12 project-one">
											<div class="ce-item">
												<?php if(!empty($HomeProjectOneImage)){?>
												<img src="<?php echo esc_url($HomeProjectOneImage); ?>" alt="">
												<?php } ?>
												<div class="box-content">
													<?php if(!empty($HomeProjectOneTitle)){?>
													<h4 class="item-title"><?php echo esc_html($HomeProjectOneTitle);?></h4>
													<?php } if(!empty($HomeProjectOneDesc))?>
													<span class="ce-des"><?php echo esc_html($HomeProjectOneDesc);?></span>
													
												</div>
											</div>
										</div>
										<div class="col-md-4 col-12 project-two">
											<div class="ce-item">
												<?php if(!empty($HomeProjectTwoImage)){?>
												<img src="<?php echo esc_url($HomeProjectTwoImage); ?>" alt="">
												<?php } ?>
												<div class="box-content">
													<?php if(!empty($HomeProjectTwoTitle)){?>
													<h4 class="item-title"><?php echo esc_html($HomeProjectTwoTitle);?></h4>
													<?php } if(!empty($HomeProjectTwoDesc))?>
													<span class="ce-des"><?php echo esc_html($HomeProjectTwoDesc);?></span>
													
												</div>
											</div>
										</div>
										<div class="col-md-4 col-12 project-three">
											<div class="ce-item">
												<?php if(!empty($HomeProjectThreeImage)){?>
												<img src="<?php echo esc_url($HomeProjectThreeImage); ?>" alt="">
												<?php } ?>
												<div class="box-content">
													<?php if(!empty($HomeProjectThreeTitle)){?>
													<h4 class="item-title"><?php echo esc_html($HomeProjectThreeTitle);?></h4>
													<?php } if(!empty($HomeProjectThreeDesc))?>
													<span class="ce-des"><?php echo esc_html($HomeProjectThreeDesc);?></span>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- PORTFOLIO SECTION END --><?php 
		}
	}

endif;

if ( function_exists( 'wpazure_kit_consultera_project' ) ) {
$homepage_section_priority = apply_filters( 'wpazur_kit_homepage_section_priority', 14, 'wpazure_kit_consultera_project' );
add_action( 'consultera_homepage_sections', 'wpazure_kit_consultera_project', absint( $homepage_section_priority ) );

}