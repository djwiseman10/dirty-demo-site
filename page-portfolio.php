<?php

get_header();

if (have_posts()) :
	while (have_posts()) : the_post(); ?>

		<article class="post page">
			
		

			<!--column-container -->
			<div class="column-container clearfix">

			
				<!-- Title Column -->
				<div class="title-column">				
					<h2><?php the_title();?></h2>
				</div><!-- /title coumn-->	

				<!-- text-column -->
				<div class="text-column">				
					<?php the_content(); ?>
				</div><!-- /title coumn-->		


			</div> <!--/column-container-->

		
		</article>


	<?php endwhile;

	else :
		echo '<p>No Content Found</p>';

	endif;

get_footer();

?>

