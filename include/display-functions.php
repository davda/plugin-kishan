<?php





/* display extra content with functions */

function add_content($content)
{   

        global $options_url_twitter;

        
               


        


        if($options_url_twitter['enable'] == true){
                $a = ['myshortcode'];
                $content_extra = '<center>[myshortcode][myshortcodee "Kishan" "Davda"]-----<a class="msg" href="'. $options_url_twitter['twitter_url'] .'"><h2>'.$options_url_twitter['message'].'</h2></a>-----</center>';
                $content .= $content_extra;
                return $content;
        }
}
add_filter('the_content', 'add_content');

function my_shortcode_function() 
{ 
        $i = 'Hiii ';
        return $i;
} 
add_shortcode('myshortcode', 'my_shortcode_function');

////////////// Parameterised Short Code
function my_shortcode_functionn($a) 
{ 
        $i = $a[0].' '.$a[1];
        return $i;
} 
add_shortcode('myshortcodee', 'my_shortcode_functionn');


?>

<?php


?>