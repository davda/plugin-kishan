<?php
    function load_style()
    {
        wp_enqueue_style('stylee', plugin_dir_url(__FILE__). 'CSS/stylee.css');
    }

    add_action('wp_enqueue_scripts', 'load_style');
?>