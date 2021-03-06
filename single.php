<?php 

get_header(); 

if (have_posts()) : while (have_posts()) : the_post(); 

$cats = '';
$cover = get_field('cover')['sizes']['large'];
$categories = get_the_terms(get_the_ID(), 'book_genre');
foreach($categories as $cat) {
	$cats .= sprintf('<a href="%s">%s</a>, ', get_term_link($cat), $cat->name);
}

$notes = get_field('notes');
$subtitle = get_field('subtitle');
$read = get_field('hasread') ? 'read' : 'unread';

?>

  <div class="post clearfix" id="post-2063">

    <div class="title">
        <h2><?php the_title(); ?> </h2>
    </div>

    <div class="revbox clearfix">
        <div class="revleft">
            <span><b>Author:</b> <?php echo get_field('author'); ?> </span>
            <span><b>Genre:</b> <?php echo rtrim($cats, ', '); ?></span>
        </div>
        <div class="revright">
            <span class="ratebg"><span class="rstar rate-<?php echo get_field('rating'); ?>"></span></span>
        </div>
    </div>

    <div class="entry">
        <img class="bookimg" src="<?php echo $cover; ?>">
        <div class="synopsis">
        	<?php if(!empty($subtitle)) : ?> 
                <p><b><?php echo $subtitle; ?></b></p>
            <?php endif ?>
            <?php echo get_field('description'); ?>
        </div>
    
        <?php if(!empty($notes)) : ?>
            <div class="notes">
                <?php echo $notes; ?>
            </div>
        <?php endif ?>

        <div class="clear"></div>
    </div>

    <div class="postmeta">
		<span class="<?php echo $read;?>"> <?php echo get_field('pagecount') . ' pages | ' . get_field('publisher') ?: get_field('datepublished'); ?></span>
	</div>

</div>


<div id="main">
  	<div class="navigation button-link arrows">
		<p>
			<?php previous_post_link_plus( array(
				'order_by' => 'post_title',
				'in_same_cat' => false,
				'format' => '%link',
				'link' => '&#65513;',
			) ); ?> 

			<?php next_post_link_plus( array(
				'order_by' => 'post_title',
				'in_same_cat' => false,
				'format' => '%link',
				'link' => '&#65515;',
			) ); ?>
		</p>
	</div>
</div>

<?php endwhile; else: ?>

<p><?php _e('Sorry, no books matched your criteria.'); ?></p><?php endif; ?>

<?php get_footer(); ?>