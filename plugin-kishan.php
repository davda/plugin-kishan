<?php
/**
 * Plugin Name: plugin-kishan
 * version: 1.0.0
 * Author: Kishan Davda
 * Description: Created for learning purposes in the beginning. Learnt from pippinsplugins.com
 */

 
/************************************************************************************************************************************
 * includes
 ***********************************************************************************************************************************/

 include('include/scripts.php');
 include('include/data-processing.php');
 include('include/display-functions.php');
 include('include/admin-page.php');                /// plugin options page in HTML.




/************************************************************************************************************************************
 * global variables
 ***********************************************************************************************************************************/
$options_url_twitter = get_option('settings');





//// To create custom database table


/* function pw_sample_plugin_create_table() {
 
	$created = dbDelta(
	  "CREATE TABLE Detailsss (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		first_name varchar(60) NOT NULL DEFAULT '',
		last_name varchar(64) NOT NULL DEFAULT '',
		email varchar(100) NOT NULL DEFAULT '',
		PRIMARY KEY (ID),
		KEY email (email)
	  ) CHARACTER SET utf8 COLLATE utf8_general_ci;"
	);
   
  }
  register_activation_hook( __FILE__, 'pw_sample_plugin_create_table' ); */
  











function pluginkishan() {
	//echo 'Hello World'; echo '  sffsds Hello World'; exit;

	$a = add_metadata('post', 7, 'first_meta', 'KKKKKKKKKKKKKK', true);
	$a = add_metadata('post', 8, 'first_meta', 'AAAAAAAAAAAAAA', true);

			$abc = get_metadata('post', 7,'first_meta');
			$abd = get_metadata('post', 8,'first_meta');
			echo '<center><h1>'.$abc[0].'</h1></center><br>';
			echo '<center><h1>'.$abd[0].'</h1></center>';
			echo ob_get_clean();
			echo ob_get_clean();

}


add_action('admin_head', 'pluginkishan');







function register_book_post_type() {
 
	$labels = array(
		'name'               => 'Booksssssssssss',
		'singular_name'      => 'Booksssssssssssssssssssssssss',
		'add_new'            => 'Add New',
		'add_new_item'       => 'Add New Book',
		'edit_item'          => 'Edit Book',
		'new_item'           => 'New Book',
		'all_items'          => 'All Books',
		'view_item'          => 'View Book',
		'search_items'       => 'Search Books',
		'not_found'          =>  'No books found',
		'not_found_in_trash' => 'No books found in Trash',
		'parent_item_colon'  => '',
		'menu_name'          => 'Bookies'
	);
 
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'publicly_queryable' => true,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'book' ),
		'capability_type'    => 'post',
		'has_archive'        => true,
		'hierarchical'       => false,
		'menu_position'      => null,
		'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' )
	);
 
	register_post_type( 'book', $args );
 
}
add_action( 'init', 'register_book_post_type' );







 
function wporg_register_taxonomy_course()
{
    $labels = [
        'name'      => _x('Courses', 'taxonomy general name'),
'singular_name'     => _x('Course', 'taxonomy singular name'),
'search_items'      => __('Search Courses'),
'all_items'         => __('All Courses'),
'parent_item'       => __('Parent Course'),
'parent_item_colon' => __('Parent Course:'),
'edit_item'         => __('Edit Course'),
'update_item'       => __('Update Course'),
'add_new_item'      => __('Add New Course'),
'new_item_name'     => __('New Course Name'),
'menu_name'         => __('Course'),
];
$args = [
'hierarchical'      => true, // make it hierarchical (like categories)
'labels'            => $labels,
'show_ui'           => true,
'show_admin_column' => true,
'query_var'         => true,
'rewrite'           => ['slug' => 'course'],
];
register_taxonomy('book', ['book'], $args);
}
add_action('init', 'wporg_register_taxonomy_course');









?>
