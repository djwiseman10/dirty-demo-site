<?php

get_header(); ?>


<div class="site-content clearfix">

	<?php if (have_posts()) :
			while (have_posts()) : the_post();

			the_content();

			endwhile;

			else :
				echo '<p>No Content Found</p>';

			endif; ?>

	<!-- home-columns -->
	<div class="home-columns clearfix">
		
		<!-- one-half -->
		<div class="one-half clearfix">
			
			<?php  // Opinion post loop begins here 
			$opinionPosts = new WP_Query('cat=8&posts_per_page=2');


			if ($opinionPosts->have_posts()) :
				while ($opinionPosts->have_posts()) : $opinionPosts->the_post(); ?>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php the_excerpt(); ?>

				<?php endwhile;

				else :

			endif;
			wp_reset_postdata(); 

			?>

		</div>

		<!-- one-half -->
		<div class="one-half last clearfix">
			
			<?php // News post loop begins here 
			$newsPosts = new WP_Query('cat=7&posts_per_page=2');


			if ($newsPosts->have_posts()) :
				while ($newsPosts->have_posts()) : $newsPosts->the_post(); ?>

					<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

					<?php the_excerpt(); ?>
					
				<?php endwhile;

				else :

			endif;
			wp_reset_postdata();

 			?>
	

		</div>


	</div>



	

</div><!-- /Site Content  -->

<?php get_footer(); ?>



		
		