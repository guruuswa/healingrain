<?php get_header(); 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$pageTitle = get_bloginfo('name');

$posts = get_posts(array(
	'post_type'		=> 'book',
	'posts_per_page'=> 10,
	'orderby'		=> 'title',
	'order'			=> 'ASC',
	'paged'			=> $paged
));

if ($posts) : ?>

<?php get_template_part( 'partials/title', 'page' ); ?>

<?php foreach( $posts as $post ) : ?>

<?php get_template_part( 'partials/loop', 'page' ); ?>

<?php endforeach; ?>

<?php get_template_part( 'partials/foot', 'page' ); ?>

<?php endif; ?>

<?php get_footer(); ?>