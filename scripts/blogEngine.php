<?php

function getPosts($type, $cat) {
    
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
    
    foreach ($tempPosts as $post) {

        if ($post["type"] == $type) {
            if ($cat == "all") {
                array_push($posts, $post);
            } else if ($post["category"] == $cat) {
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
        case "thoughts":
            $category = "Game Thoughts";
            break;
        case "pers":
            $category = "Personal";
            break;
        case "pro":
            $category = "Professional";
            break;
        case "stud":
            $category = "Student";
            break;
    }

    switch ($post["type"]) {
        case "blog" :
            $html ="<div class='post-card'>
                        <div class='post-card-img-container'>
                            <a href='../posts/?id=$postid' class='post-card-link'>
                                <img class='post-card-img' src=$img />
                            </a>
                        </div>
                        <div class='post-card-text-container'>
                            <a href='../posts/?type=blog&cat=".$post["category"]."&id=$postid' class='post-card-link'>
                                <h2 class='post-card-title'>$title</h2>
                            </a>
                            <a href='/blog/?cat=".$post["category"]."'"." class='post-card-catlink'>
                                <p class='post-card-category'>$category</p>
                            </a>
                            <p class='post-card-desc'>$desc</p>
                        </div>
                    </div>\n";

            return $html;
        
        case "works" :
            $html ="<a href='../posts/?type=works&cat=".$post["category"]."&id=$postid' class='post-card-link'>
                        <div class='post-card'>
                            <img class='post-card-img' src=$img />
                            <div class='post-card-text'>
                                <h2 class='post-card-title'>$title</h2>
                            </div>
                        </div>
                    </a>\n";

            return $html;
    }

    


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