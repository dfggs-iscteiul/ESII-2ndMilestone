<?php
/**
 * Testimonial section
 */
if ( ! function_exists( 'wpazure_kit_consultera_testimonial' ) ) :
	function wpazure_kit_consultera_testimonial() {
		
		// Get Service section data
		$HomeTestiEnable = get_theme_mod('testimonial_section_enable',true);
		$HomeTestiSectionTitle = get_theme_mod('testimonial_section_title','What Clients Say');
		$HomeTestiSectionDes = get_theme_mod('testimonial_section_description','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
		// Get tesimonial one data
		$TestiOneImage = get_theme_mod('testimonial_image_one',WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/testimonial/test1.jpg');
		$TestiOneName = get_theme_mod('testimonial_name_one','Petrik Johnson');
		$TestiOneDesi = get_theme_mod('testimonial_desi_one','CEO John Softwares');
		$TestiOneDes = get_theme_mod('testimonial_des_one','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
		// Get tesimonial Two data
		$TestiTwoImage = get_theme_mod('testimonial_image_two',WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/testimonial/test2.jpg');
		$TestiTwoName = get_theme_mod('testimonial_name_two','Petrik Johnson');
		$TestiTwoDesi = get_theme_mod('testimonial_desi_two','CEO John Softwares');
		$TestiTwoDes = get_theme_mod('testimonial_des_two','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
	
		if($HomeTestiEnable == true){?>
		<!-- TESTIMONIAL SECTION START -->
			<section class="section-padding-100 testimonial-section bg-offwhite">
				<div class="container">
					<div class="row">
						<div class="col-sm-12 col-12">
							<div class="section-heading text-center">
								<?php if(!empty($HomeTestiSectionTitle)){?>
								<h2 class="title"><?php echo esc_html($HomeTestiSectionTitle);?></h2>
								<?php } if(!empty($HomeTestiSectionDes)){?>
								<p>
									<?php echo esc_html($HomeTestiSectionDes);?>
								</p>
								<?php }?>
							</div>
						</div>
					</div>
					<div class="testimonial-wrapper row">							
						<div class="col-md-6 col-12 testimonial-one bg-offwhite radius-5">
							<?php if(!empty($TestiOneDes)){?>
							<div class="testimonial-single bg-offwhite radius-5">
								<div class="testimonial-text">
									<p>
										<?php echo esc_html($TestiOneDes);?>
									</p>
									<i class="fa fa-quote-right" aria-hidden="true"></i>
								</div>
								<?php } ?>
								<div class="testimonial-detail">
									<div class="testimonial-img">
										<?php if(!empty($TestiOneImage)){?>
										<img src="<?php echo esc_url($TestiOneImage);?>">
										<?php }?>
									</div>
									<?php if(!empty($TestiOneName)){?>
									<strong class="d-block pt-3 text-blue"><?php echo esc_html($TestiOneName);?></strong>
									<?php } if(!empty($TestiOneDesi)){?>
									
									<div class="testimonial-designation"><?php echo esc_html($TestiOneDesi)?></div>
									<?php }?>
								</div>
							</div>
						</div>
				   
				  
						<div class="col-md-6 col-12 testimonial-one bg-offwhite radius-5">
							<?php if(!empty($TestiTwoDes)){?>
							<div class="testimonial-single bg-offwhite radius-5">
								<div class="testimonial-text">
									<p>
										<?php echo esc_html($TestiTwoDes);?>
									</p>
									<i class="fa fa-quote-right" aria-hidden="true"></i>
								</div>
								<?php } ?>
								<div class="testimonial-detail">
									<div class="testimonial-img">
										<?php if(!empty($TestiTwoImage)){?>
										<img src="<?php echo esc_url($TestiTwoImage);?>">
										<?php }?>
									</div>
									<?php if(!empty($TestiTwoName)){?>
									<strong class="d-block pt-3 text-blue"><?php echo esc_html($TestiTwoName);?></strong>
									<?php } if(!empty($TestiTwoDesi)){?>
									
									<div class="testimonial-designation"><?php echo esc_html($TestiTwoDesi)?></div>
									<?php }?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- TESTIMONIAL SECTION END --><?php 
		} 
	}

endif;

if ( function_exists( 'wpazure_kit_consultera_testimonial' ) ) {
$homepage_section_priority = apply_filters( 'wpazur_kit_homepage_section_priority', 16, 'wpazure_kit_consultera_testimonial' );
add_action( 'consultera_homepage_sections', 'wpazure_kit_consultera_testimonial', absint( $homepage_section_priority ) );

}