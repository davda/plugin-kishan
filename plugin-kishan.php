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



require_once(ABSPATH . 'wp-admin/includes/upgrade.php');

//// To create custom database table


function pw_sample_plugin_create_table() {
 
	$created = dbDelta(
	  "CREATE TABLE leoplesss (
		ID bigint(20) unsigned NOT NULL AUTO_INCREMENT,
		first_name varchar(60) NOT NULL DEFAULT '',
		last_name varchar(64) NOT NULL DEFAULT '',
		email varchar(100) NOT NULL DEFAULT '',
		PRIMARY KEY (ID),
		KEY email (email)
	  ) CHARACTER SET utf8 COLLATE utf8_general_ci;"
	);
	
  }
  register_activation_hook( __FILE__, 'pw_sample_plugin_create_table' );


  global $wpdb;
  $table = 'leoplesss';
/*$data = array('first_name' => 'Kishan', 'last_name' => 'Kishan', 'email' => 'kishan.davda');
$format = array('%s','%d');
$a=$wpdb->insert($table,$data);
$my_id = $wpdb->insert_id; */
//Insert Query working $a= $wpdb->insert( $table, array('first_name' => 'Kishan', 'last_name' => 'Kishan', 'email' => 'kishan.davda'));
//Update Query working $wpdb->update($table, array('email'=> 'kishan.davda333@gmail.com'), array('email'=>'kishan.davda'));
// Delete Query working $b = $wpdb->delete($table, array('ID'=>3));
if($b)
{
	echo '<center><h1>Deleted '.$b.' row.</center></h1>';
}
else
{//echo '<center><h1>Not Done'.$a.'</center></h1>';
}

  //wpdb::insert('Detailsssss', array('first_name' => 'Kishan', 'last_name' => 'Kishan', 'email' => 'kishan.davda333@gmail.com'));


/* 
  CREATE TABLE `wp_postmeta` (
	  `meta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
	  `post_id` bigint(20) unsigned NOT NULL DEFAULT '0',
	  `meta_key` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
	  `meta_value` longtext COLLATE utf8mb4_unicode_ci,
	  PRIMARY KEY (`meta_id`),   KEY `post_id` (`post_id`),
	  KEY `meta_key` (`meta_key`(191))) 
	  ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; 





  CREATE TABLE `wp_affiliate_wp_affiliatemeta` (
	  `meta_id` bigint(20) NOT NULL AUTO_INCREMENT,
	  `affiliate_id` bigint(20) NOT NULL DEFAULT '0',
	  `meta_key` varchar(255) DEFAULT NULL,
	  `meta_value` longtext,
	  PRIMARY KEY (`meta_id`),
	  KEY `affiliate_id` (`affiliate_id`),
	  KEY `meta_key` (`meta_key`)) 
	  ENGINE=InnoDB DEFAULT CHARSET=utf8; */


/* 
  function pw_register_metadata_table() 
  	{	
	  global $wpdb;	
	  $wpdb->affiliatemeta = $wpdb->prefix . 'affiliate_wp_affiliate_meta';
	}
	add_action( 'plugins_loaded', 'pw_register_metadata_table' ); */


/* 
  $added = add_metadata( 'affiliate', $affiliate_id, 'first_name', 'Kishan' ); */


/* 

  ///////Fatal error: Uncaught Error: Call to undefined function dbDelta() in 
  C:\xampp\htdocs\wordpress\wp-content\plugins\plugin-kishan\plugin-kishan.php:36 
  Stack trace: 
  #0 C:\xampp\htdocs\wordpress\wp-includes\class-wp-hook.php(288): 
  pw_sample_plugin_create_table('') 
  '#1 C:\xampp\htdocs\wordpress\wp-includes\class-wp-hook.php(312): 
  WP_Hook->apply_filters('', Array) 
  #2 C:\xampp\htdocs\wordpress\wp-includes\plugin.php(478): WP_Hook->do_action(Array) 
  #3 C:\xampp\htdocs\wordpress\wp-admin\plugins.php(177): do_action('activate_plugin...') 
  #4 {main} thrown in C:\xampp\htdocs\wordpress\wp-content\plugins\plugin-kishan\plugin-kishan.php 
  on line 36 */










function pluginkishan() {
	//echo 'Hello World'; echo '  sffsds Hello World'; exit;


	/* $abcd = 'Transient value Example';

	set_transient( 'tr1', $abcd);
	$cdef = get_transient('tr1');

		echo "<center><h1>".$cdef."</h1></center><br>";
	*/
/* 
	$a = add_metadata('post', 9, 'first_meta', 'Meta Data Value Example 1', true);
	$a = add_metadata('post', 10, 'first_meta', 'Meta Data Value Example 2', true);

			$abc = get_metadata('post', 9,'first_meta');
			$abd = get_metadata('post', 10,'first_meta');
			echo '<center><h1>'.$abc[0].'</h1></center><br>';
			echo '<center><h1>'.$abd[0].'</h1></center>'; */



			
			echo ob_get_clean();
			echo ob_get_clean();

}


//add_action('admin_head', 'pluginkishan');







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
        'name'      => _x('Book Category', 'taxonomy general name'),
'singular_name'     => _x('Book Category', 'taxonomy singular name'),
'search_items'      => __('Search Book Category'),
'all_items'         => __('All Book Category'),
'parent_item'       => __('Parent Book Category'),
'parent_item_colon' => __('Parent Book Category:'),
'edit_item'         => __('Edit Book Category'),
'update_item'       => __('Update Book Category'),
'add_new_item'      => __('Add New Book Category'),
'new_item_name'     => __('New Book Category Name'),
'menu_name'         => __('Book Category'),
];
$args = [
'hierarchical'      => true, // make it hierarchical (like categories)
'labels'            => $labels,
'show_ui'           => true,
'show_admin_column' => true,
'query_var'         => true,
'rewrite'           => ['slug' => 'course'],
];
register_taxonomy('category', ['book'], $args);
}
add_action('init', 'wporg_register_taxonomy_course');


function wporg_register_taxonomy_coursee()
{
    $labels = [
        'name'      => _x('Book Tag', 'taxonomy general name'),
'singular_name'     => _x('Book Tag', 'taxonomy singular name'),
'search_items'      => __('Search Book Tag'),
'all_items'         => __('All Book Tags'),
'parent_item'       => __('Parent Book Tag'),
'parent_item_colon' => __('Parent Book Tag:'),
'edit_item'         => __('Edit Book Tag'),
'update_item'       => __('Update Book Tag'),
'add_new_item'      => __('Add New Book Tag'),
'new_item_name'     => __('New Book Tag Name'),
'menu_name'         => __('Book Tag'),
];
$args = [
'hierarchical'      => false,
'labels'            => $labels,
'show_ui'           => true,
'show_admin_column' => true,
'query_var'         => true,
'rewrite'           => ['slug' => 'book_tag'],
];
register_taxonomy('book1', ['book'], $args);
}
add_action('init', 'wporg_register_taxonomy_coursee');









/***Custom Meta Box* */
function book_info_meta_box()
{
    $screens = ['book', 'wporg_cpt'];
    foreach ($screens as $screen) {
        add_meta_box(
            'box_id',           // Unique ID
            'Book Info',  // Box title
            'book_info_meta_box_html',  // Content callback, must be of type callable
            $screen                   // Post type
        );
    }
}
add_action('add_meta_boxes', 'book_info_meta_box');
function book_info_meta_box_html($post)
{
    ?>
    <table align="center">
	<tr>
		<td><label for="author_nm">Author Name</label></td>
    	<td><input type="text" name="author_nm" id="author_nm"/></td>
	</tr>
	<tr>
		<td><label for="price">Price</label></td>
		<td><input type="text" name="price" id="price"/></td>
	</tr>
	<tr>
		<td><label for="publ">Publisher</label></td>
    	<td><input type="text" name="publ" id="publ"/></td>
	</tr>
	<tr>
		<td><label for="isbn">ISBN number</label></td>
    	<td><input type="text" name="isbn" id="isbn"/></td>
	</tr>
	<tr>
		<td><label for="year">Year</label></td>
    	<td><input type="text" name="year" id="year"/></td>
	</tr>
	<tr>
		<td><label for="edition">Edition</label></td>
    	<td><input type="text" name="edition" id="edition"/></td>
	</tr>
	<tr>
		<td><label for="url">Url</label></td>
		<td><input type="text" name="url" id="url"/></td>
	</tr>
	</table>
<?php } 



/**
 * Add a widget to the dashboard.
 *
 * This function is hooked into the 'wp_dashboard_setup' action below.
 */
function add_dashboard_widget() {
	wp_add_dashboard_widget(
		'wporg_dashboard_widget',                          // Widget slug.
		esc_html__( 'Book Category Widget', 'mywid' ), // Title.
		'add_dashboard_widget_content'                    // Display function.
	); 
}
add_action( 'wp_dashboard_setup', 'add_dashboard_widget' );
 
/**
 * Create the function to output the content of our Dashboard Widget.
 */
function add_dashboard_widget_content() {
	// Display whatever you want to show.
	?>
	<?php






$termsss = wp_list_categories('number=5&show_count=1&orderby=count&order=DESC&title_li=');
// Get the taxonomy's terms
$terms = get_terms(
    array(
        'taxonomy'   => 'book',
        'hide_empty' => false,
    )
);

// Check if any term exists
if ( ! empty( $termsss ) && is_array( $termsss ) ) {
	// Run a loop and print them all
	?><ul><?php
    foreach ( $termsss as $term ) { ?>
        <li>
            <?php echo $term->name.'<br>'; ?>
        </li><?php
	}?>
	</ul><?php
} 

}

 /* 
        // The Query
        $the_query = new WP_Query( $args );
        
        // The Loop
        if ( $the_query->have_posts() ) {
        echo '<ul>';
        while ( $the_query->have_posts() ) {
                $the_query->the_post();
                echo '<li>' . get_the_title() . '</li>';
        }
        echo '</ul>';
        } else {
        // no posts found
        }
        /* Restore original Post Data */
        /*wp_reset_postdata(); */















		add_action( 'widgets_init', 'category_sidebars' );
		/**
		 * Create widgetized sidebars for each category
		 *
		 * This function is attached to the 'widgets_init' action hook.
		 *
		 * @uses	register_sidebar()
		 * @uses	get_categories()
		 * @uses	get_cat_name()
		 */
		function category_sidebars() {
			$categories = get_categories( array( 'hide_empty'=> 0 ) );
		
			foreach ( $categories as $category ) {
				if ( 0 == $category->parent )
					register_sidebar( array(
						'name' => $category->cat_name,
						'id' => $category->category_nicename . '-sidebar',
						'description' => 'This is the ' . $category->cat_name . ' widgetized area',
						'before_widget' => '<aside id="%1$s" class="widget %2$s">',
						'after_widget' => '</aside>',
						'before_title' => '<h3 class="widget-title">',
						'after_title' => '</h3>',
					) );
			}
		}

		add_action( 'widgets_init', 'my_awesome_sidebar' );
		function my_awesome_sidebar() {
		  $args = array(
			'name'          => 'Awesome Sidebar',
			'id'            => 'awesome-sidebar',
			'description'   => 'The Awesome Sidebar is shown on the left hand side of blog pages in this theme',
			'class'         => '',
			'before_widget' => '<li id="%1$s" class="widget %2$s">',
			'after_widget'  => '</li>',
			'before_title'  => '<h2 class="widgettitle">',
			'after_title'   => '</h2>' 
		  );
		
		  register_sidebar( $args );
		
		}




//Add settings to menu
add_action( 'admin_menu', 'book_add_page' );
function book_add_page() {
//  add_submenu_page('edit.php?post_type=events', 'Events Admin', 'Events Settings', 'edit_posts', basename(__FILE__), 'events_options_do_page');
    add_submenu_page('edit.php?post_type=book', 'Book Admin', 'Book Settings', 'edit_posts', basename(__FILE__), 'book_s');
}

function book_s(){
	echo "Setting In Books";
}




class custom_widget extends WP_Widget {

	private $selected_category;

	function __construct() {
		parent::__construct(
		// widget ID
		'custom_widget',
		// widget name
		__('Custom Widget KISHAN', 'custom_widget_domain'),
		// widget description
		array ( 'description' => __( 'Custom Widget Tutorial', 'custom_widget_domain' ), )
		);
		}


		public function widget( $args, $instance ) {
			$title = apply_filters( 'widget_title', $instance['title'] );
			echo $args['before widget'];
			//if title is present
			If ( ! empty ( $title ) )
			Echo $args['before_title'] . $title . $args['after_title'];
			//output



			$termsss = get_categories('show_count=1&title_li=');
			// Get the taxonomy's terms		
			echo '<form action="#" method="post">Select Category : <select name="category">';
			// Check if any term exists
			if ( ! empty( $termsss ) && is_array( $termsss ) ) {
				// Run a loop and print them all
				?><?php
				foreach ( $termsss as $term ) { ?>
					
						<?php echo '<option>'.$term->name.'</option>';?>
					<?php
				}?>
				<?php
				
			echo '</select> <input type="submit" name="submit" value="Show Posts" /></form><br><br>';
			
			if(isset($_POST['submit'])){
			
			set_transient('selected',$_POST['category']);
			}
			} 
			global $wpdb;
			$transient_var_category = get_transient('selected');
			$categoryy = $wpdb->get_row("SELECT term_id FROM wp_terms WHERE name='$transient_var_category'");

			$args = array(
				'post_type' => 'book',
				'cat' => ''.(int)$categoryy->term_id
			);
			echo '<br>';
		    $postss = query_posts($args);
			if ( ! empty( $postss ) && is_array( $postss ) ) {
				// Run a loop and print them all
				?><?php $i=1;
				foreach ( $postss as $termm ) { ?>
					
						<?php echo ' '.$i.' '.$termm->post_title. '<br>';$i++;?>
					<?php
				}
			}
			
			
			
			
			
			echo $args['after_widget'];
		}
			
		public function form( $instance ) {
			if ( isset( $instance[ 'title' ] ) )
			$title = $instance[ 'title' ];
			else
			$title = __( 'Default Title', 'hstngr_widget_domain' );
			?>
			<p>

						<?php
						
?>


			<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e( 'Title:' ); ?></label>
			

			
			
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			</p>
			<?php
			}

			public function update( $new_instance, $old_instance ) {
				$instance = array();
				$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
				return $instance;
				}
			function SetSelectedItem()
			{
			}

} 

function register_custom_widget() {
	register_widget( 'custom_widget' );
	}
	add_action( 'widgets_init', 'register_custom_widget' );