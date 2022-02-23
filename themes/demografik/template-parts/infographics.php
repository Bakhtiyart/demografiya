<div class="wrapper">
	
				<?php
					global $post;
					$postslistinfografika = get_posts( [
						'post_type' => 'infographics',
						'infographic-cat' => 'infografika',
						'order'=> 'ASC',
						'orderby' => 'title',
					] ); 
				?>
				<?php
					$postslistrasm = get_posts( [
						'post_type' => 'infographics',
						'infographic-cat' => 'rasmlar',
						'order'=> 'ASC',
						'orderby' => 'title',
					] ); 
				?>

 <section class="grey-bg-section">
	<div class="tabs-wrapper">
		<div data-admiral-tabs=".tabs-content" class="media-page-tabs">
			<div data-hash="tab_images" class="admiral-active">
				<div class="tab-title">Infografika</div>
				<div class="tab-new-label"><?php echo count($postslistinfografika); ?></div>
			</div>
			<div data-hash="tab_videos">
				<div class="tab-title">Rasm</div>
				<div class="tab-new-label"><?php echo count($postslistrasm); ?></div>
			</div>
			<div data-hash="tab_infographics">
				<div class="tab-title">Video</div>
				<div class="tab-new-label"></div>
			</div>
		</div>
	</div>
</section>
<section class="content-section" style="padding-top: 0;">
	<div class="content-container">
		<div class="tabs-content">
			<div class="admiral-active">
				<div class="header-with-lines">
					<h2 class="common-heading underline-text">
						Infografika
					</h2>

					<hr>
				</div>
			<div class="custom-grid-1-4 photo-gallery">
				
								
					<?php 
					foreach( $postslistinfografika as $post ){

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
			<div>
				<div class="header-with-lines">
					<h2 class="common-heading underline-text">
						Rasmlar
					</h2>

					<hr>
				</div>
			<div class="custom-grid-1-4 photo-gallery">
				
								
					<?php 
					foreach( $postslistrasm as $post ){

							setup_postdata($post);
							
							
							?>
							<?php 
								if(has_post_thumbnail()){
							?>
										<div>
											<div class="video-21-9-rate-wrapepr img_url ">
												<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>"  data-gallery="ig" data-toggle="lightbox">
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
		
    </div>









	<script>
			//  Lighbox
			jQuery(document).on('click', '[data-toggle="lightbox"]', function (event) {
				event.preventDefault();
				jQuery(this).ekkoLightbox();
			});
						
		</script>			
</section>
</div>