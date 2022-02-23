<?php
			
           global $post;
			$postslist = get_posts( [
				'post_type' => 'infographics',
				'infographic-cat' => 'rasmlar',
				'order'=> 'ASC',
				'orderby' => 'title',
			] ); 
			 ?>








<section class="content-section" style="padding-top: 0;">

    <div class="content-container">
		<div class="tabs-content">

			
			<div class="custom-grid-1-4 photo-gallery">
				<?php 
				foreach( $postslist as $post ){

                        setup_postdata($post);
						
						
                        ?>
						<?php 
							if(has_post_thumbnail()){
								?>
									<div>
										<div class="video-21-9-rate-wrapepr img_url ">
												<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>" data-gallery="ig" data-toggle="lightbox">
												<img src="<?php echo the_post_thumbnail_url() ?>" class="video-21-9-rate-images">									
												</a>
											</div>
										</div>
								<?php
							}
						?>

                   <?php
                    }

                    wp_reset_postdata();
                    ?>


			</div>



				

				
			

			
		</div>
    </div>
		<script>
			//  Lighbox
			jQuery(document).on('click', '[data-toggle="lightbox"]', function (event) {
				event.preventDefault();
				jQuery(this).ekkoLightbox();
			});
						
		</script>			
</section>