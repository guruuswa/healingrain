<?php get_header(); 

$pageTitle = single_cat_title( '', false );

get_template_part( 'partials/title', 'page' ); 

if ( have_posts() ) : ?>

	<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'partials/loop', 'page' ); ?>

	<?php endwhile; ?>

	<?php get_template_part( 'partials/foot', 'page' ); ?>	

<?php endif; ?>

<?php get_footer(); ?>