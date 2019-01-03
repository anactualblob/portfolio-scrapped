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

    return $posts;
    
}




// given a post meta json file, generates a html div with long title, thumbnail, description, category and a link to the post page
function generateHTML($post) {

    $html = "";

    $title = $post["long_title"];
    $desc = $post["desc"];
    $img = $post["img"];
    $posturl = $post["short_title"];
    $category = "";
    switch ($post["category"]) {
        case "articles":
            $category = "Article";
            break;
        case "devlogs":
            $category = "Dev Log";
            break;
        case "diaries":
            $category = "Play Diary";
            break;
    }

    $html = "<a href='../posts/?id=$posturl' class='post-card-link'> \n
                <div class='post-card'> \n
                    <img class='post-card-img' src=$img />\n
                    <h2 class='post-card-title'>$title</h2>\n
                    <p class='post-card-category'>$category</p>\n
                    <p class='post-card-desc'>$desc</p>\n
                </div> \n
            </a>";

    return $html;


}


?>