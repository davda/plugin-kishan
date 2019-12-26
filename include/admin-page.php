<?php
    function options_page()
    {

        

        ///$added = add_post_meta( $post_id, 'meta_key', 'The new value', $unique = true );
        ///$value = get_post_meta( $post_id, 'meta_key', true );

        global $options_url_twitter;

        ob_start();
        ?>
            <div class="wrap">
                <center>
                <h1>options <?php echo do_shortcode('[myshortcodee "Kishan" "Pintu"]'); ?></h1>
                
                <form method="post" action="options.php">
                
                    <?php settings_fields('settings_group'); ?>




                    <p style="margin:20px 0px 0px 0px;">Enable/Disable Twitter URL link </p><br>
                    <input type="checkbox" name="settings[enable]" id="settings[enable]" value="1" <?php checked('1', $options_url_twitter['enable']); ?> />

                
                    <p style="margin:20px 0px 0px 0px;">Enter Twitter URL</p><br>
                    <input type="text" 
                        id="settings[twitter_url]" 
                        name="settings[twitter_url]" 
                        value="<?php echo $options_url_twitter['twitter_url']; ?>"
                        style="margin:0px 0px 5px 0px ;"/><br>


                    <?php //////// Below Input tag is for naming of link ?>

                    <input type="text"                           
                        id="settings[message]" 
                        name="settings[message]" 
                        value="<?php echo $options_url_twitter['message']; ?>"
                        style="margin:0px 0px 5px 0px ;"/><br>


                    <input type="submit" class="button-primary" value="Save Options"/>

                </form>
                
                <?php 
                    global $wpdb;
                    $results = $wpdb->get_row( "SELECT * FROM leoplesss where ID=5");
                    echo '<h1>Name : '.$results->first_name.'<br> Surname : '.$results->last_name.'<br> Email : '.$results->email.'</h1>';

                    global $wpdb;
                    $customers = $wpdb->get_results("SELECT * FROM leoplesss");
                    ?>
                    <br><br>
            <table border=1 style="" class="table table-hover">
                    <th style="padding:10px;" ><center>ID</center></th>
                    <th style="padding:10px;" ><center>Name</center></th>
                    <th style="padding:10px;" ><center>Surname</center></th>
                    <th style="padding:10px;" ><center>Email</center></th>
                    <?php foreach($customers as $customer){ ?>

                    <tr>
                    <td style="padding:10px;" ><center><?php echo $customer->ID; ?></center></td>
                    <td style="padding:10px;" ><center><?php echo $customer->first_name; ?></center></td>
                    <td style="padding:10px;" ><center><?php echo $customer->last_name; ?></center></td>
                    <td style="padding:10px;" ><center><?php echo $customer->email; ?></center></td>
                    </tr>

                    <?php } ?>

            </table>

                            <?php
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
            echo "<h1>No Posts</h1>";
        }
        /* Restore original Post Data */
        /*wp_reset_postdata();

 */
        

                ?>

                </center>
            </div>
        <?php
        echo ob_get_clean();
    }

function options_page2()
{
    ob_start();
        ?>

            <center><h1> Hello</h1></center>
        <?php
}

    function add_options()
    {
        add_options_page('First Option', 'First Option', 'manage_options','kishan-optionssssss','options_page');
        add_options_page('Optionssss', 'Davda', 'manage_options','kishan-optionsssssss','options_page2');
    }
    add_action('admin_menu','add_options');

    function register_settings()
    {
        register_setting('settings_group','settings');
    }
    add_action('admin_init', 'register_settings');
    
    function my_shortcode_functionnn() 
    { 
            $i = 'Hiii ';
            return $i;
    } 
    add_shortcode('myshortcodeee', 'my_shortcode_functionnn');





/* template name: Posts by Category! */
 ?>
<center>
		<div id="container">
			<div id="content" role="main">

			<?php
			// get all the categories from the database
			$cats = get_categories(); 

				// loop through the categries
				foreach ($cats as $cat) {
					// setup the cateogory ID
					$cat_id= $cat->term_id;
					// Make a header for the cateogry
					//echo "<center><h2>".$cat->name."</h2>";
					// create a custom wordpress query
                    //query_posts("cat=&posts_per_page=100");
                    // start the wordpress loop!
                }
 ?>


                <?php 
                    /* foreach ( $b as $termmm ) { ?>
								
                        <?php $termmm->the_title. '<br>';?>
                    <?php
                }?> */







                
                    
                    ?>
					


			</div><!-- #content -->
		</div><!-- #container -->

    
    
        </center>