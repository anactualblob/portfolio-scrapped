<?php

function getPosts($cat) {
    
    $posts = array();

    // get json meta files
    $metas = glob('./posts/*.json');
    
    foreach ($metas as $post) {
        $rawContent = file_get_contents($post);
        $jsonContent = json_decode($rawContent, true);

        array_push($posts, $jsonContent);
    }
    


    // filter posts from category
    
    // TODO

    return $posts;
}


?>