<?php
/* Template Name: Title page */


get_header();
?>
	<main id="main">
		<div class="stm_titlebox stm_titlebox_style_2 stm_titlebox_text-center">
			<div class="container">
				<div class="stm_flex stm_flex_last stm_flex_center">
					<div class="stm_titlebox__inner">
						<h1 class="h1 stm_titlebox__title no_line text-transform stm_mgb_2"><?php echo get_the_title();?></h1>					
					</div>
				</div>
			</div>
		</div>
		<?php 
		while ( have_posts() ) :
			the_post();
			the_content();

		endwhile; // End of the loop. 
		?>
	</main>

<?php
get_footer();
