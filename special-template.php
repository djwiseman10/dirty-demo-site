<?php

/* 
Template Name:Special Layout
*/

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

		<article class="post page">
			<h2><?php the_title();?></h2>

			<!-- info-box -->
			<div class="info-box">

				<h4>Disclaimer Title</h4>
				<p>Interdum et malesuada fames ac ante ipsum primis in faucibus. Nulla magna odio, lacinia at vulputate ut, blandit a lectus. In hac habitasse platea dictumst. Nullam auctor ut dolor vel suscipit.</p>

			</div><!--/info-box-->

			<?php the_content(); ?>
		
		</article>


	<?php endwhile;

	else :
		echo '<p>No Content Found</p>';

	endif;

get_footer();

?>