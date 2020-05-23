<?php
/**
 * Testimonial section
 */
if ( ! function_exists( 'news_consultera_section' ) ) :
	function news_consultera_section() {
		
		// Get Service section data
		$HomeNewsEnable = get_theme_mod('home_new_section_enable',true);
		$HomeNewsSectionTitle = get_theme_mod('home_news_section_title','Recent Blog Posts');
		$HomeNewsSectionDes = get_theme_mod('home_news_section_discription','It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.');
		
	
		if($HomeNewsEnable == true){?>
		<!-- BLOG SECTION START -->
		<section class="section-padding-100 blog bg-white">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-12">
						<div class="section-heading text-center">
							<?php if(!empty($HomeNewsSectionTitle)){?>
							<h2 class="title"><?php echo esc_html($HomeNewsSectionTitle);?></h2>
							<?php } if(!empty($HomeNewsSectionDes)){?>
							<p>
								<?php echo esc_html($HomeNewsSectionDes);?>
							</p>
							<?php }?>
						</div>
					</div>
				</div>
				<div class="row"> <?php 
				$args = array( 'post_type' => 'post','posts_per_page' => 3,'post__not_in'=>get_option("sticky_posts")) ; 	
						query_posts( $args );
						if(query_posts( $args ))
					{	
						while(have_posts()):the_post();
					{?>
						<div class="col-md-4 col-12" id="news-section">
				            <div class="item">
				            	<div class="post-wrapper">
									<div class="post-thumb">
										<?php consultera_post_thumbnail(); 
											consultera_all_categories();
										?>
									</div>
									<div class="post-content">
										<h1 class="post-title">
											<a href="<?php the_permalink(); ?>"><?php the_title();?></a>
										</h1>
										<div class="entry-content">
											<?php the_content(__('Read More','herrobiz')); ?>
										</div>
										
										<div class="post-meta mt-3">
											<ul>
												<?php consultera_posted_by();
												consultera_get_comments_number();
												consultera_posted_on(); ?>
												
											</ul>
										</div>
									</div>
								</div>
				            </div>
					    </div>
					<?php }
					endwhile;
					}
					?>
				</div>
		</section>
		<!-- BLOG SECTION END -->
		<?php 
		} 
	}

endif;

if ( function_exists( 'news_consultera_section' ) ) {
$homepage_section_priority = apply_filters( 'wpazur_kit_homepage_section_priority', 20, 'news_consultera_section' );
add_action( 'consultera_homepage_sections', 'news_consultera_section', absint( $homepage_section_priority ) );

}