<?php

get_header(); ?>


<!-- Site Content  -->

<div class="site-content clearfix">



	<!-- Main Column -->
	<div class="main-column">
		
		<?php if (have_posts()) :
		while (have_posts()) : the_post();

		get_template_part('content', get_post_format());


		endwhile;

		else :
			echo '<p>No Content Found</p>';

		endif; ?>

	</div> <!-- /Main Column -->




	

	<?php get_sidebar(); ?>

	<div class="container"><a href=""></a></div>
	

</div><!-- /Site Content  -->





<?php get_footer();

?>