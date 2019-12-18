<?php





/* display extra content with functions */

function add_content($content)
{   

        global $options_url_twitter;

        
        if($options_url_twitter['enable'] == true){

                $content_extra = '<center>-----<a class="msg" href="'. $options_url_twitter['twitter_url'] .'"><h2>'.$options_url_twitter['message'].'</h2></a>-----</center>';
                $content .= $content_extra;
                return $content;
        }
}

add_filter('the_content', 'add_content');

?>