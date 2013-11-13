<?php get_header(); ?>
<?php if (have_posts()) : while (have_posts()) : the_post(); ?> 

<?php $image = get_field('cover'); ?>


  <div class="post clearfix" id="post-2063">

    <div class="title">
        <h2><a href="#" rel="bookmark" title=""><?php the_title(); ?></a></h2>
    </div>

    <div class="revbox clearfix">
        <div class="revleft">
            <span><strong>Author:</strong> <?php echo get_field('author'); ?> </span>
            <span><strong>Genre:</strong> <a href="#" rel="tag">Biography</a></span>
        </div>
        <div class="revright">
            <span class="ratebg"><span class="rstar rate-<?php echo get_field('rating'); ?>"></span></span>
        </div>
    </div>

    <div class="entry">
        <a class="bookshot" href="#">
        <img class="bookimg" src="<?php echo $image['sizes']['large']; ?>" alt="" width="250" height="388"></a>
        <?php echo get_field('description'); ?>
        <div class="clear"></div>
    </div>

</div>

<?php endwhile; else: ?>

<p><?php _e('Sorry, no books matched your criteria.'); ?></p><?php endif; ?>

<?php get_footer(); ?>