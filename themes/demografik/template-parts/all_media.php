<?php
			
           global $post;
			$postslist = get_posts( [
				'post_type' => 'infographics',
				'posts_per_page' => 10,
				'order'=> 'ASC',
				'orderby' => 'title'
			] ); 
			 ?>








				<section class="content-section" style="padding-top: 0;">
    <div class="content-container">
		<div class="tabs-content">

			<div class="">
				<div class="header-with-lines">
					<h2 class="common-heading underline-text">
						Фотографии					</h2>

					<hr>
				</div>



				<?php 
				foreach( $postslist as $post ){

                        setup_postdata($post);
						
                
                        ?>
						<div class="custom-grid-1-4 photo-gallery">
						<div>
							<div class="video-21-9-rate-wrapepr img_url ">
								<a data-id="32" class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>" data-gallery="ig">
									<img src="<?php echo the_post_thumbnail_url() ?>" class="video-21-9-rate-images">
										<div class="video-21-9-rate-block-img-text">
											<img src="<?php echo get_the_post_thumbnail_url(); ?>" class="video-21-9-rate-block-img">
										</div>
									
								</a>
							</div>
						</div>
					</div>
                   <?php
                    }

                    wp_reset_postdata();
                    ?>





				

				
			

			
			</div>
		</div>
    </div>
</section>