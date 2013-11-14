<?php get_header(); 

$posts = get_posts(array(
	'post_type'		=> 'book',
	'posts_per_page'=> 10,
	'meta_key'		=> 'rating',
	'orderby'		=> 'meta_value_num',
	'order'			=> 'DESC'
));

if ($posts) { ?>

<div class="title">
    <h2>Books</h2>
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