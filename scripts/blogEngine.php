<?php

function getPosts($cat) {
    
    $posts = array();
    $tempPosts = array();

    // get json meta files
    $metas = glob('../posts/*.json');

    
    foreach ($metas as $post) {
        $rawContent = file_get_contents($post);
        $jsonContent = json_decode($rawContent, true);

        array_push($tempPosts, $jsonContent);
    }
    
    
    // select posts according to category
    if ( $cat == "all" ) {
        $posts = $tempPosts;
    }
    else {

        foreach ($tempPosts as $post) {

            if ($post["category"] == $cat) {
                array_push($posts, $post);
            }
        }

    }

    return json_encode ($posts);
    
}




// given a post meta json file, generates a html div with long title, thumbnail, description, category and a link to the post page
function generateHTML($post) {


}


?>