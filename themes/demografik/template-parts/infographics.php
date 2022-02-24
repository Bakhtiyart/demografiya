<?php
					global $post;
					$postslistinfografika = get_posts( [
						'post_type' => 'infographics',
						'infographic-cat' => 'infografika',
						'order'=> 'ASC',
						'orderby' => 'title',
					] ); 
					$postslistrasm = get_posts( [
						'post_type' => 'infographics',
						'infographic-cat' => 'rasmlar',
						'order'=> 'ASC',
						'orderby' => 'title',
					] ); 
					$postslistvideo = get_posts( [
						'post_type' => 'infographics',
						'infographic-cat' => 'video',
						'order'=> 'ASC',
						'orderby' => 'title',
					] ); 

					$countinfografika = 0;
					foreach( $postslistinfografika as $post ){

						setup_postdata($post);
							
						if(has_post_thumbnail()){
								$countinfografika++;		
							}
						}
						wp_reset_postdata();

					$countrasm = 0;
					foreach( $postslistrasm as $post ){

						setup_postdata($post);
							
						if(has_post_thumbnail()){
								$countrasm++;		
							}
						}
						wp_reset_postdata();

					$countvideo = 0;
					foreach( $postslistvideo as $post ){

						setup_postdata($post);
							
						if(has_post_thumbnail()){
								$countvideo++;		
							}
						}
						wp_reset_postdata();
					?>

<section class="grey-bg-section">
	<div class="tabs-wrapper">
		<div data-admiral-tabs=".tabs-content" class="media-page-tabs">
			<div data-hash="tab_images" class="admiral-active">
				<div class="tab-title">Infografika</div>
				<div class="tab-new-label"><?php echo $countinfografika; ?></div>
			</div>
			<div data-hash="tab_videos">
				<div class="tab-title">Rasm</div>
				<div class="tab-new-label"><?php echo $countrasm; ?></div>
			</div>
			<div data-hash="tab_infographics">
				<div class="tab-title">Video</div>
				<div class="tab-new-label"><?php echo $countvideo; ?></div>
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
							<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>" data-gallery="infograpics"
								data-toggle="lightbox" data-target=".bd-example-modal-lg">
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
					<h2 class="common-heading underline-text">Rasmlar</h2>

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
							<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>" data-gallery="images"
								data-toggle="lightbox" data-target=".bd-example-modal-lg">
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
					<h2 class="common-heading underline-text">Video</h2>

					<hr>
				</div>
				<div class="custom-grid-1-4 photo-gallery">


					<?php 
					foreach( $postslistvideo as $post ){

							setup_postdata($post);
							
							
							?>
					<?php 
								if(has_post_thumbnail()){
							?>
					<div>
						<div class="video-21-9-rate-wrapepr img_url ">
							<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>" data-gallery="videos"
								data-toggle="lightbox" data-target=".bd-example-modal-lg">
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
			jQuery(this).ekkoLightbox({
				alwaysShowClose: true
			}, );
		});
	</script>
</section>