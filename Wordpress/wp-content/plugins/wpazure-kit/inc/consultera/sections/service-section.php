<?php
/**
 * Service section
 */
if ( ! function_exists( 'wpazure_kit_consultera_service' ) ) :
	function wpazure_kit_consultera_service() {
		// Get Service section data
		$HomeServiceEnabled = get_theme_mod('service_section_enable',true);
		$HomeServiceSectionTitle = get_theme_mod('service_section_title','Featured Services');
		$HomeServiceSectionDesc = get_theme_mod('service_section_discription','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
		
		// Get Service one data
		$HomeServiceOneIcon = get_theme_mod('service_one_icon','fa-pie-chart');
		$HomeServiceOneTitle = get_theme_mod('service_one_title','Market Analysis');
		$HomeServiceOneDesc = get_theme_mod('service_one_desc','laoreet Pellentesque molestie laoreet laoreet.');
		$HomeServiceOneButtonText = get_theme_mod('service_one_btn_text','Read more');
		$HomeServiceOneButtonLink = get_theme_mod('service_one_btn_link','#');
		$HomeServiceOneButtonTarget = get_theme_mod('service_one_btn_tab',false);
		
		// Get Service Two data
		$HomeServiceTwoIcon = get_theme_mod('service_two_icon','fa-line-chart');
		$HomeServiceTwoTitle = get_theme_mod('service_two_title','Growth strategies');
		$HomeServiceTwoDesc = get_theme_mod('service_two_desc','laoreet Pellentesque molestie laoreet laoreet.');
		$HomeServiceTwoButtonText = get_theme_mod('service_two_btn_text','Read more');
		$HomeServiceTwoButtonLink = get_theme_mod('service_two_btn_link','#');
		$HomeServiceTwoButtonTarget = get_theme_mod('service_two_btn_tab',false);
		
		// Get Service Three data
		$HomeServiceThreeIcon = get_theme_mod('service_three_icon','fa-users');
		$HomeServiceThreeTitle = get_theme_mod('service_three_title','Employee Benefits');
		$HomeServiceThreeDesc = get_theme_mod('service_three_desc','laoreet Pellentesque molestie laoreet laoreet.');
		$HomeServiceThreeButtonText = get_theme_mod('service_three_btn_text','Read more');
		$HomeServiceThreeButtonLink = get_theme_mod('service_three_btn_link','#');
		$HomeServiceThreeButtonTarget = get_theme_mod('service_three_btn_tab',false);
		
	?>
	
	<!-- SERVICES SECTION START --><?php
	if($HomeServiceEnabled==true){ ?>
		<section class="section-padding-100 services-section bg-offwhite">
			<div class="container">
			<?php if(!empty($HomeServiceSectionTitle) || !empty($HomeServiceSectionDesc)){?>
				<div class="row">
					<div class="col-sm-12 col-12">
						<div class="section-heading text-center">
						<?php if(!empty($HomeServiceSectionTitle)){?>
							<h2 class="title"><?php echo esc_html($HomeServiceSectionTitle);?></h2>
						<?php } if(!empty($HomeServiceSectionDesc)){?>
							<p>
								<?php echo esc_html($HomeServiceSectionDesc);?>
							</p>
						<?php }?>
						</div>
					</div>
				</div>
			<?php }?>
				<div class="row">
					<div class="col-md-4 col-12 service-one">
						<div class="ce-box bg-white">
						<?php if(!empty($HomeServiceOneIcon)){?>
							<div class="box-icon">
								<i class="fa <?php echo esc_attr($HomeServiceOneIcon);?>" aria-hidden="true"></i>
							</div>
						<?php } if(!empty($HomeServiceOneTitle)){?>
							<h3><?php echo esc_html($HomeServiceOneTitle);?></h3>
						<?php } if(!empty($HomeServiceOneDesc)){?>
							<p>
								<?php echo esc_html($HomeServiceOneDesc);?>
							</p>
						<?php }  if(!empty($HomeServiceOneButtonText)){?>
						
							<a href="<?php echo esc_attr($HomeServiceOneButtonLink); ?>" <?php  if($HomeServiceOneButtonTarget == true){echo "target='_blank'";}?> class="read-more"><?php echo esc_html($HomeServiceOneButtonText);?> <i class="fa fa-long-arrow-right"></i></a>
						<?php }?>
						</div>
					</div>
					<div class="col-md-4 col-12 service-two">
						<div class="ce-box bg-white">
							<?php if(!empty($HomeServiceTwoIcon)){?>
							<div class="box-icon">
								<i class="fa <?php echo esc_attr($HomeServiceTwoIcon);?>" aria-hidden="true"></i>
							</div>
						<?php } if(!empty($HomeServiceTwoTitle)){?>
							<h3><?php echo esc_html($HomeServiceTwoTitle);?></h3>
						<?php } if(!empty($HomeServiceTwoDesc)){?>
							<p>
								<?php echo esc_html($HomeServiceTwoDesc);?>
							</p>
						<?php }  if(!empty($HomeServiceTwoButtonText)){?>
						
							<a href="<?php echo esc_attr($HomeServiceTwoButtonLink); ?>" <?php  if($HomeServiceTwoButtonTarget == true){echo "target='_blank'";}?> class="read-more"><?php echo esc_html($HomeServiceTwoButtonText);?> <i class="fa fa-long-arrow-right"></i></a>
						<?php }?>
						</div>
					</div>
					<div class="col-md-4 col-12 service-three">
						<div class="ce-box bg-white">
							<?php if(!empty($HomeServiceThreeIcon)){?>
							<div class="box-icon">
								<i class="fa <?php echo esc_attr($HomeServiceThreeIcon);?>" aria-hidden="true"></i>
							</div>
						<?php } if(!empty($HomeServiceThreeTitle)){?>
							<h3><?php echo esc_html($HomeServiceThreeTitle);?></h3>
						<?php } if(!empty($HomeServiceThreeDesc)){?>
							<p>
								<?php echo esc_html($HomeServiceThreeDesc);?>
							</p>
						<?php }  if(!empty($HomeServiceThreeButtonText)){?>
						
							<a href="<?php echo esc_attr($HomeServiceThreeButtonLink); ?>" <?php  if($HomeServiceThreeButtonTarget == true){echo "target='_blank'";}?> class="read-more"><?php echo esc_html($HomeServiceThreeButtonText);?> <i class="fa fa-long-arrow-right"></i></a>
						<?php }?>
						</div>
					</div>

				</div>
			</div>
		</section><?php 
	}
		?>
		<!-- SERVICES SECTION END -->
		
		
	<?php }

endif;

if ( function_exists( 'wpazure_kit_consultera_service' ) ) {
$homepage_section_priority = apply_filters( 'wpazur_kit_homepage_section_priority', 12, 'wpazure_kit_consultera_service' );
add_action( 'consultera_homepage_sections', 'wpazure_kit_consultera_service', absint( $homepage_section_priority ) );

}