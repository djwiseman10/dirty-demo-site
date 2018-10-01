<?php get_header(); 



//Declare Variables

//Get the featured image
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
}

//Get Movie Picture Field 
if( get_field('movie_picture')) {
	$movie_picture = get_field('movie_picture');
}

//Get Release Date Field 
if( get_field('movie_release_date')) {
	$release_date = get_field('movie_release_date', false, false);
	$releaseDate = new DateTime($release_date);
}

//Get Movie Country Field 
if( get_field('movie_country')) {
	$country = get_field('movie_country');
}

//Get Movie Language Field 
if( get_field('main_language')) {
	$language = get_field('main_language');
}

//Get Movie Budget Field 
if( get_field('movie_budget')) {
	$number = get_field('movie_budget');
	// print as international format
	setlocale(LC_MONETARY, 'en_US.UTF-8');
	$budget = money_format('%.2n', $number);
}

//Get Opening Weekend Revenue Field 
if( get_field('opening_weekend_revenue')) {
	$number = get_field('opening_weekend_revenue');
// print as international format
	setlocale(LC_MONETARY, 'en_US.UTF-8');
	$opening_weekend = money_format('%.2n', $number);
}


//Get Movie Plot Field 
if( get_field('movie_plot')) {
	$movie_plot = get_field('movie_plot');
} ?>



<div id="main" class="main-content clearfix">

<?php if (have_posts()) :
	while (have_posts()) : the_post(); ?>
		<div class="banner-section clearfix" style="background-image: url(<?php echo $featuredimg ?>);">
			<div class="container-movies">
				<div class="col column1 clearfix">
				<div class="col column2 clearfix">
					<h1 class="post-title"><?php get_the_title(); ?></h1>
					<div class="post-details">
						<p class="genre">
							<?php 
								foreach( $genres as $genre){
								echo '<span>' . $genre . '</span>';
								}
							?> <span class="duration">| <?php echo $duration . ' mins'; ?></span>
						</p>
						<p class="rating">Rating:<?php echo $ratin; ?></p>
					</div>
				</div>
			</div>
		</div>
		<div class="body-section clearfix">
			<div class="container-movies">
				<div class="col column1 clearfix">
					<div class="movie-image" style="background-image: url(<?php echo $movie_picture; ?>);">
						
					</div>
					<h2>Movie Info</h2>
					<div class="movieinfo">
						<p><strong>Release Date:</strong><?php echo $releaseDate->format('j F Y'); ?> (<?php echo $country; ?>)</p>
						<p class="genre2"><strong>Genres:</strong>
							<?php 
								foreach ($genres as $genre){
									echo '<span>' . $genre .'</span>';
								}	
							?>
						</p>
						<p><strong>Country:</strong><?php echo $country; ?></p>
						<p><strong>Language:</strong><?php echo $language; ?></p>
						<p><strong>Budget:</strong><?php echo $budget; ?> (estimated)</p>
						<p><strong>Opening Weekend:</strong><?php echo $opening_weekend; ?></p>
					</div>
				</div>
				<div class="col column2 clearfix">
					<div class="storyline">
						<h2> Movie Storyline</h2>
						<p><?php echo $movie_plot; ?></p>
					</div>
					<div class="trailer">
						<h2>Trailer</h2>
						<div class="video-frames">
							<?php // get trailer fields 
								if(have_rows('trailers')){
									while(have_rows('trailers')):the_row();
										// Subfields
										if(get_sub_field('trailer_url')){
											$trailer_url = get_sub_field('trailer_url');
											echo 'div class="embed-container"><iframe width="560" height="315" src="'. $trailer_url . '" frameborder="0" allowfullscreen></iframe></div>';
										}
									endwhile;	
								}
							?>
						</div>
					</div>
					<div class="cast">
						<h2>Cast</h2>
						<div class="cast-list clearfix">
							<?php // get cast fields
								if(have_rows('cast_members')){
									while(have_rows('cast_members')): the_row();
									//Subfields 
										if(get_sub_field('cast_member_image')){
											$cast_member_image = get_sub_field('cast_member_image');
										}
										if(get_sub_field('cast_member_real_name')){
											$cast_member_real_name = get_sub_field('cast_member_real_name');
										}
										if(get_sub_field('cast_member_movie_name')){
											$cast_member_movie_name = get_sub_field('cast_member_movie_name');
										}
										echo '<div class="casts">';
										echo 'img src="' . $cast_member_image . '" alt="">';
										echo '<h3 class="cast-real-name">' . $cast_member_real_name . '</h3>';
										echo '<p class="cast-char-name"> as <strong>' . $cast_member_movie_name . '</strong></p>';
										echo '</div>';
									endwhile;
								}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>














		

	<?php endwhile;

	else :
		echo '<p>No Content Found</p>';

	endif; ?>

</div>




<?php get_footer(); ?>

