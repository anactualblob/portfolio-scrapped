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


    $title = $post["title"];
    $desc = $post["desc"];
    $img = $post["image"];
    $postid = $post["id"];
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

    $html ="<a href='../posts/?id=$postid' class='post-card-link'>
                <div class='post-card'>
                    <img class='post-card-img' src=$img />
                    <h2 class='post-card-title'>$title</h2>
                    <p class='post-card-category'>$category</p>
                    <p class='post-card-desc'>$desc</p>
                </div>
            </a>\n";

    return $html;


}


// given an array of post metas and a post id, return path to markdown file of corresponding post
function getPostFromID ($posts, $id) {
    $filename = "";
    foreach ($posts as $post) {
        if ($post["id"] == $id) {
            return $post;
            break;
        } 
    }   

}


// given a post meta, returns content of associated .md post file
function getMD ($post) {
    $md = file_get_contents("../posts\/". $post['file'] );
    return json_encode($md);
}

?>