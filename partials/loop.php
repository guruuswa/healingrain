<?php $cover = get_field('cover')['sizes']['medium']; ?>

<div class="revbox clearfix">
    <div class="revleft">
        <a href="<?php the_permalink(); ?>">
            <img class="thumb" src="<?php echo $cover; ?>" border="0">
        </a>
        <span><strong><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></strong></span>
        <span><?php echo get_field('author'); ?></span>
        <span><?php echo get_field('isbn'); ?></span>
    </div>
    
    <div class="revright">
        <span class="ratebg">
           <span class="rstar rate-<?php echo get_field('rating'); ?>"></span>
        </span>
    </div>
</div>