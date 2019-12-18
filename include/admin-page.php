<?php
    function options_page()
    {

        $a = add_metadata('book', 1, 'first_meta', 'KKKKKKKKKKKKKK', true);

        if($a)
        {
            echo 'Hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
        }
        else
        {
            echo 'nooooo';
        }

        ///$added = add_post_meta( $post_id, 'meta_key', 'The new value', $unique = true );
        ///$value = get_post_meta( $post_id, 'meta_key', true );

        global $options_url_twitter;

        ob_start();
        ?>
            <div class="wrap">
                <center>
                <h1>options</h1>
                
                <form method="post" action="options.php">
                
                    <?php settings_fields('settings_group'); ?>




                    <p style="margin:20px 0px 0px 0px;">Enable/Disable Twitter URL link</p><br>
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

                </center>
            </div>
        <?php
        echo ob_get_clean();
    }

    function add_options()
    {
        add_options_page('Optionsss', 'kishan-options', 'manage_options','kishan-optionssssss','options_page');
        add_options_page('Optionssss', 'Davda', 'manage_options','kishan-optionsssssss','options_page');
    }
    add_action('admin_menu','add_options');

    function register_settings()
    {
        register_setting('settings_group','settings');
    }
    add_action('admin_init', 'register_settings');