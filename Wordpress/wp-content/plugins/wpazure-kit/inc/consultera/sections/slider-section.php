<?php
/**
 * Slider section
 */
if ( ! function_exists( 'wpazure_kit_consultera_slider' ) ) :
	function wpazure_kit_consultera_slider() {
		$HomeSliderEnabled = get_theme_mod('slider_section_enable',true);
		$HomeSliderImage = get_theme_mod('slider_image',WPAZURE_KIT_PLUGIN_URL .'inc/consultera/images/slider/banner.jpg');
		$HomeSlideOverlay = get_theme_mod('slider_overlay',true);
		$HomeSlideOverlayColor = get_theme_mod('slider_overlay_color','0,0,0,0.30');
		$HomeSlideTitle = get_theme_mod('slider_title','It is a long established fact that a reader');
		$HomeSliderDesc = get_theme_mod('slider_discription','It is a long established fact that a reader .');
		$HomeSliderButtonTxt = get_theme_mod('slider_btn_txt','Read more');
		$HomeSliderButtonLink = get_theme_mod('slider_btn_link','#');
		$HomeSliderButtonTarget = get_theme_mod('slider_btn_target',true);
		?>
	
		<!-- MAIN SLIDER SECTION START -->
		<?php	if($HomeSliderEnabled==true){
					if(!empty($HomeSliderImage)){ ?>
						<div class="main-slider">
							<div class="owl-carousel owl-theme banner-slider" id="banner-slider">
								<div class="item">
									<div class="slider-image" style="background-image: url(<?php echo esc_url($HomeSliderImage); ?>"></div>
									<div class="single-item" <?php if($HomeSlideOverlay == true){?> style="background-color:<?php echo esc_attr($HomeSlideOverlayColor); ?>" <?php }?>>
										<div class="d-table">
											<div class="d-table-cell">
												<div class="container">
													<div class="slider-text text-center">
														<?php if(!empty($HomeSlideTitle)){?>
														<h1>
															<?php echo esc_html($HomeSlideTitle);?>
														</h1>
														<?php } if(!empty($HomeSliderDesc)){?>
														<p>
															<?php echo esc_html($HomeSliderDesc);?>
														</p>
														<?php } if(!empty($HomeSliderButtonTxt)){?>
														<a href="<?php echo esc_attr($HomeSliderButtonLink); ?>" <?php if($HomeSliderButtonTarget == true){echo "target='_blank'";}?> class="default-button bg-blue button-lg effect-1">
															<span class="btn-text"><?php echo esc_html($HomeSliderButtonTxt);?></span>
														</a>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div> <?php 
					}
				} ?>
		<!-- MAIN SLIDER SECTION END -->
		
		
	<?php }

endif;

if ( function_exists( 'wpazure_kit_consultera_slider' ) ) {
	
$homepage_section_priority = apply_filters( 'wpazur_kit_homepage_section_priority', 10, 'wpazure_kit_consultera_slider' );
add_action( 'consultera_homepage_sections', 'wpazure_kit_consultera_slider', absint( $homepage_section_priority ) );

}