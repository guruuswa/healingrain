<?php 

get_header(); 

$paged = get_query_var('paged') ? get_query_var('paged') : 1;

$pageTitle = get_bloginfo('name');

$posts = get_posts(array(
	'post_type'		=> 'book',
	'posts_per_page'=> 10,
	'orderby'		=> 'title',
	'order'			=> 'ASC',
	'paged'			=> $paged
));

if ($posts) : 

	get_template_part( 'partials/title', 'page' );

	foreach( $posts as $post ) :

		get_template_part( 'partials/loop', 'page' );

	endforeach;

	get_template_part( 'partials/foot', 'page' );

endif;

get_footer();

?>