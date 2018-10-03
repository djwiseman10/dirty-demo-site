<?php

get_header(); 


?>


<div class="movies-section clearfix">
	<div class="title">
		<h2>List of All Movies</h2>
	</div>

	<div class="movie-posts" >	

		<?php if (have_posts()) : while (have_posts()) : the_post();

			if( has_post_thumbnail()){
				$featuredimg = get_the_post_thumbnail_url();
				} else
				$featuredimg = '../wp-content/uploads/2018/09/20170817_092227.jpg'; 

			//Get Movie Genre Field 
			if( get_field('movie_genre')) {
				$genres = get_field('movie_genre');
			}

			//Get Duration Field 
			if( get_field('duration')) {
				$duration = get_field('duration');
			}

			//Get Movie Rating Field 
			if( get_field('movie_rating')) {
				$rating = get_field('movie_rating');
			} ?>

			
				
				<div class="movie-card" >
					<a href="<?php the_permalink() ?>"><div class="movie-card-thumbnail" style="background-image: url(<?php echo $featuredimg ?>);"></div>
					</a>
					<div class="movie-card-text">
						<div class="movie-card-title">
							<h3><?php the_title(); ?></h3>
						</div>
						<div class="movie-card-info">
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
						<div class="movie-card-link"><a href="<?php the_permalink() ?>">Read More</a>
						</div>
					</div>

				</div>

		<?php endwhile; endif; ?>	

		
		

	</div>




</div>

<?php get_footer();

?>