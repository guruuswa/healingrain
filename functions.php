<?php

function create_book_type() {
    
    $labels = array(
		'name'               => _x( 'Books', 'post type general name' ),
		'singular_name'      => _x( 'Book', 'post type singular name' ),
		'add_new'            => _x( 'Add new', 'book' ),
		'add_new_item'       => __( 'Add new book' ),
		'edit_item'          => __( 'Edit book' ),
		'new_item'           => __( 'New book' ),
		'all_items'          => __( 'All books' ),
		'view_item'          => __( 'View book' ),
		'search_items'       => __( 'Search books' ),
		'not_found'          => __( 'No books found' ),
		'not_found_in_trash' => __( 'No books found in the Trash' ), 
		'parent_item_colon'  => '',
		'menu_name'          => 'Books'
	);

    $args = array(
		'labels'        => $labels,
		'description'   => 'Holds library data',
		'public'        => true,
		'menu_position' => 2,
		'supports'      => array('title'),
		'has_archive'   => true,
		'menu_icon' 	=> get_bloginfo('template_directory') . '/img/16.png'
	);

    register_post_type( 'book', $args);
	remove_post_type_support('book', 'editor');
}

function create_book_genres() {
	$labels = array(
		'name'              => _x( 'Genres', 'taxonomy general name' ),
		'singular_name'     => _x( 'Genre', 'taxonomy singular name' ),
		'search_items'      => __( 'Search genres' ),
		'all_items'         => __( 'All genres' ),
		'parent_item'       => __( 'Parent genre' ),
		'parent_item_colon' => __( 'Parent genre:' ),
		'edit_item'         => __( 'Edit genre' ), 
		'update_item'       => __( 'Update genre' ),
		'add_new_item'      => __( 'Add new genre' ),
		'new_item_name'     => __( 'New genre' ),
		'menu_name'         => __( 'Genres' ),
	);

	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
	);
	
	register_taxonomy('book_genre', 'book', $args);
}

function book_updated_messages( $messages ) {
  global $post, $post_ID;

  $messages['book'] = array(
    0 => '', 
    1 => sprintf( __('Book updated. <a href="%s">View book</a>'), esc_url( get_permalink($post_ID) ) ),
    4 => __('Book updated.'),
    6 => sprintf( __('Book published. <a href="%s">View book</a>'), esc_url( get_permalink($post_ID) ) ),
    7 => __('Book saved.'),
    8 => sprintf( __('Book submitted. <a target="_blank" href="%s">Preview book</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
    9 => sprintf( __('Book scheduled for: <strong>%1$s</strong>. <a target="_blank" href="%2$s">Preview book</a>'),
      date_i18n( __( 'M j, Y @ G:i' ), strtotime( $post->post_date ) ), esc_url( get_permalink($post_ID) ) ),
    10 => sprintf( __('Book draft updated. <a target="_blank" href="%s">Preview book</a>'), esc_url( add_query_arg( 'preview', 'true', get_permalink($post_ID) ) ) ),
  );

  return $messages;
}

function book_admin_columns($book_columns) {	
	$columns['title'] = _x('Title', 'title');
	$columns['author'] = __('Author');
	$columns['rating'] = __('Rating');

	return $columns;
}

function book_rating_custom_column( $column, $post_id ) {
    switch ( $column ) {
      case 'rating':
        echo get_post_meta( $post_id , 'rating' , true ); 
        break;
    }
}

function book_register_sortable_columns( $columns ) {
    $columns['author'] = 'author';
    $columns['rating'] = 'rating';

    return $columns;
}

function book_orderby( $query ) {
	if( ! is_admin() )
		return;

	$orderby = $query->get( 'orderby');

	if( 'rating' == $orderby ) {
		$query->set('meta_key','rating');
		$query->set('orderby','meta_value_num');
	}

	if( 'author' == $orderby ) {
		$query->set('meta_key','author');
		$query->set('orderby','meta_value');
	}
}

function book_author_name( $name ) {
	global $post;
	return get_post_meta( $post->ID, 'author', true );
}

function book_change_login_image() {
	echo "
	<style>
	body.login #login h1 a {
	background: url('".get_bloginfo('template_url')."/img/logo.png') 8px 0 no-repeat transparent;
	height:100px; width:320px; }
	</style>
	";
}


add_action('init', 'create_book_type');
add_action('pre_get_posts', 'book_orderby');
add_action('init', 'create_book_genres', 0) ;
add_action("login_head", "book_change_login_image");

add_filter('the_author', 'book_author_name');
add_filter('get_the_author_display_name', 'book_author_name');
add_filter('post_updated_messages', 'book_updated_messages');
add_filter('manage_book_posts_columns', 'book_admin_columns');
add_filter('manage_edit-book_sortable_columns', 'book_register_sortable_columns');
add_action('manage_book_posts_custom_column' , 'book_rating_custom_column', 10, 2);

?>