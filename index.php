<?php get_header(); ?>

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<?php $cover = get_field('cover')['sizes']['medium']; ?>

<div class="revbox clearfix">
    <div class="revleft">
        <img class="thumb" src="<?php echo $cover; ?>">
        <span><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></span>
        <span><?php echo get_field('author'); ?></span>
        <span><?php echo get_field('pagecount'); ?> pages</span>
    </div>
    <div class="revright">
        <span class="ratebg"><span class="rstar rate-<?php echo get_field('rating'); ?>"></span></span>
    </div>
</div>
<?php endwhile; ?>

<div class="navigation"><p><?php posts_nav_link('&nbsp;&nbsp;'); ?></p></div>

<?php else: ?>

<p><?php _e('Sorry, no posts matched your criteria.'); ?></p><?php endif; ?>

<?php get_footer(); ?>