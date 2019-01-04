<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Lucas Martinez - Portfolio</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="post_layout.css">
    <script src="../scripts/lib/remarkable.min.js"></script>
    <script src="../scripts/main.js"></script>
</head>

<body id="body">
    <button onclick="toggleSidebar()" id="panel-toggle">
        <img src="https://via.placeholder.com/64x64"/>
    </button>
    
    <?php 
        include("../sidebar.php");
        include("../scripts/blogEngine.php");
        $postID = $_GET["id"];
    ?>



    <main id="main">
        <h1 id="page-title">
            <?php
                $post = getPostFromID( getPosts("all"), $postID);
                echo $post["title"];
            ?>
            
        </h1>

        <div id="main-view">
            <script>
                let md = new Remarkable();
                document.getElementById("main-view").insertAdjacentHTML("beforeend", md.render(<?= getMD($post) ?>));
            </script>

        </div>


    </main>
    

    


</body>
</html>