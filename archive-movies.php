<?php

get_header(); ?>

<div class="container">
	<div class="title">
		<h2>List of Movies</h2>
	</div>

	<div class="body">	

		<?php if (have_posts()) : while (have_posts()) : the_post();?>
			
			<div class="movie-card">
				<div class="movie-card-title">
					<h3><?php the_title(); ?></h3>
				</div>
				<div class="movie-card-info">
					<a href="<?php the_permalink() ?>">Read More</a>
				

			</div>
		</div>

		<?php endwhile; endif; ?>	


		

	</div>




</div>
<?php get_footer();

?>