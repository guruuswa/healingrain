<?php get_header(); 

$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

$posts = get_posts(array(
	'post_type'		=> 'book',
	'posts_per_page'=> 10,
	'orderby'		=> 'title',
	'order'			=> 'ASC',
	'paged'			=> $paged
));

if ($posts) { ?>

<div class="title">
    <h2><?php bloginfo('name'); ?></h2>
</div>

<?php 

foreach( $posts as $post ) { 

$cover = get_field('cover')['sizes']['medium']; 

?>

<div class="revbox clearfix">
    <div class="revleft">
        <img class="thumb" src="<?php echo $cover; ?>">
        <span><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></span>
        <span><?php echo get_field('author'); ?></span>
        <span><?php echo get_field('pagecount'); ?> pages</span>
    </div>
    <div class="revright">
        <span class="ratebg">
        	<span class="rstar rate-<?php echo get_field('rating'); ?>"></span>
        </span>
    </div>
</div>
<?php } ?>

<div class="navigation"><p><?php posts_nav_link('&nbsp;&nbsp;'); ?></p></div>

<?php } else { ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php } ?>

<?php get_footer(); ?>