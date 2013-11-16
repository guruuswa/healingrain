<?php 

get_header(); 

$pageTitle = single_cat_title( '', false );

get_template_part( 'partials/title', 'page' ); 

if ( have_posts() ) : 

	while ( have_posts() ) : the_post(); 

		get_template_part( 'partials/loop', 'page' ); 

	endwhile; 

	get_template_part( 'partials/foot', 'page' ); 

endif; 

get_footer(); 

?>