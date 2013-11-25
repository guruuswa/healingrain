<?php 

get_header(); 

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$posts = get_posts(array(
	'post_type'		=> 'book',
	'posts_per_page'=> 10,
	'orderby'		=> 'title',
	'order'			=> 'ASC',
	'paged'			=> $paged
));

$pageTitle = sprintf('%s (%d)', get_bloginfo('name'), wp_count_posts('book')->publish);

if ($posts) : 

	get_template_part( 'partials/title', 'page' );

	foreach( $posts as $post ) :

	get_template_part( 'partials/loop', 'page' );

	endforeach;

	get_template_part( 'partials/foot', 'page' );

endif;

get_footer();

?> 