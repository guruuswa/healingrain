<?php get_header();

$search = get_search_query(); 

$args = array(
   'post_type' => 'book',
   'posts_per_page' => 10,
   'meta_query' => array(
      'relation' => 'OR',
       array(
           'key' => 'title',
           'value' => $search,
           'compare' => 'LIKE',
       ),   
       array(
           'key' => 'author',
           'value' => $search,
           'compare' => 'LIKE',
       ),  
        array(
           'key' => 'description',
           'value' => $search,
           'compare' => 'LIKE',
       )
   )
 );

$args['paged'] = max( get_query_var( 'paged' ), 1 );

$query = new WP_Query( $args );

?>

<div class="title">
    <h2> <?php echo good_english_result($query->post_count); ?> <em><?php the_search_query() ?></em></h2>
</div>

<?php if ( $query->have_posts() ) : ?>

	<?php while ( $query->have_posts() ) : $query->the_post(); ?>

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
	<?php endwhile; ?>

<?php endif; ?>

<div id="main">
  	<div class="navigation button-link">
		<p>
			<?php posts_nav_link('&nbsp;&nbsp;'); ?>
		</p>
	</div>
  <div class="search">
		<?php get_search_form(); ?>
	</div>
</div>

<?php get_footer(); ?>