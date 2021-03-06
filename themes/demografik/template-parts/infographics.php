
<?php
$postslistinfografika = get_posts( [
	'posts_per_page' => 100,
	'post_type' => 'infographics',
	'infographic-cat' => 'infografika',
	'order'=> 'DESC',
	'orderby' => 'date',
] ); 
$postslistrasm = get_posts( [
	'posts_per_page' => 100,
	'post_type' => 'infographics',
	'infographic-cat' => 'rasmlar',
	'order'=> 'DESC',
	'orderby' => 'date',
] ); 
$postslistvideo = get_posts( [
	'posts_per_page' => 100,
	'post_type' => 'infographics',
	'infographic-cat' => 'video',
	'order'=> 'DESC',
	'orderby' => 'date',
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
			<div data-hash="tab_infographics" class="admiral-active">
				<div class="tab-title">Infografika</div>
				<div class="tab-new-label"><?php echo $countinfografika; ?></div>
			</div>
			<div data-hash="tab_images">
				<div class="tab-title">Rasm</div>
				<div class="tab-new-label"><?php echo $countrasm; ?></div>
			</div>
			<div data-hash="tab_video">
				<div class="tab-title">Video</div>
				<div class="tab-new-label"><?php echo $countvideo; ?></div>
			</div>
		</div>
	</div>
</section>
<section class="content-section" style="padding-top: 0;">
	<div class="container">
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
					foreach( $postslistinfografika as $post ):
						setup_postdata($post);
						if(has_post_thumbnail()):
							?>
							<div>
								<div class="video-21-9-rate-wrapepr img_url ">
									<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>"
										data-gallery="infograpics" data-toggle="lightbox" data-target=".bd-example-modal-lg">
										<img src="<?php echo the_post_thumbnail_url() ?>" class="video-21-9-rate-images">
										<?php the_title(); ?>
									</a>
								</div>
							</div>
						<?php
						endif;
					endforeach;
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
					foreach( $postslistrasm as $post ):
						setup_postdata($post);
						if(has_post_thumbnail()):
							?>
							<div>
								<div class="video-21-9-rate-wrapepr img_url ">
									<a class="href_img" href="<?php echo get_the_post_thumbnail_url(); ?>" data-gallery="images"
										data-toggle="lightbox" data-target=".bd-example-modal-lg">
										<img src="<?php echo the_post_thumbnail_url() ?>" class="video-21-9-rate-images">
										<?php the_title(); ?>
									</a>
								</div>
							</div>
							<?php
						endif;
					endforeach;
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
					foreach( $postslistvideo as $post ):
						setup_postdata($post);
						if(has_post_thumbnail()):
							?>
							<div>
								<div class="video-21-9-rate-wrapepr img_url ">
									<a class="href_img" href="<?php the_field('video_link'); ?>" data-gallery="videos"
										data-toggle="lightbox" data-target="<?php the_ID() ?>">
										<img src="<?php echo the_post_thumbnail_url() ?>" class="video-21-9-rate-images">
										<?php the_title(); ?>
									</a>
								</div>
							</div>
							<div class="modal fade" id="<?php the_ID() ?>" tabindex="-1" role="dialog" aria-hidden="true">
								<div class="modal-dialog" role="document">
									<div class="modal-content">
										<div class="modal-body">
											<div class="embed-responsive embed-responsive-16by9">
												<?php the_field('video_link'); ?>
											</div>
										</div>
									</div>
								</div>
							</div>
							<?php
						endif;
					endforeach;
					wp_reset_postdata();
					?>
				</div>
			</div>
		</div>
	</div>
</section>