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


	<div class="movies-section clearfix">
		<div class="title clearfix">
			<h2>List of Movies</h2>
		</div>
		<div class="movie-posts clearfix">
			<?php
				$args = array(
					'post_type'			=> 'movies',
					'order'				=> 'ASC',
					'posts_per_page'	=> 3
				);
				$loop = new WP_Query ( $args );
				$postcount = 1;
				while ($loop->have_posts()) : $loop->the_post();
					if( has_post_thumbnail()){
						$featuredimg = get_the_post_thumbnail_url();
						} else
						$featuredimg = '../wp-content/uploads/2018/09/20170817_092227.jpg'; 
					$genres = get_field('movie_genre');
					$duration = get_field('duration');
					$rating = get_field('movie_rating'); 
			?>
				<div class="movie-card" >
					<a href="<?php the_permalink() ?>"><div class="movie-card-thumbnail" style="background-image: url(<?php echo $featuredimg ?>);"></div></a>
					<div class="movie-card-text clearfix">
						<div class="movie-card-title clearfix">
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="movie-card-info clearfix">
							<p class=""><strong>GENRE: </strong>
								<?php 	
									$values = get_field('movie_genre');
									if( count($values)){
   										foreach($values as $k=>$value){
       										if($k) echo ', ';
       										echo $value;
   										}
									}
							
								?>
							</p>
							<p><strong>DURATION: </strong><?php echo $duration; ?> mins</p>
							<p><strong>RATING: </strong><?php echo $rating; ?></p>
						</div>
						<div class="movie-card-link clearfix"><a href="<?php the_permalink() ?>">Read More</a>
						</div>
					</div>
				</div>
			
			<?php endwhile; ?>	
		</div> <!-- /movie-posts -->
		<div class="button clearfix">
			<a class="see-all-btn" href="<?php echo get_post_type_archive_link('movies'); ?>">View All Movies</a>
		</div>
	</div> <!-- /movies -->



	

</div><!-- /Site Content  -->

<?php get_footer(); ?>



		
		