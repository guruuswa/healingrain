<?php $cover = get_field('cover')['sizes']['medium']; ?>

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