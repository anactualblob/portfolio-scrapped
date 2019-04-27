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

<body id="body" class="post">
    <button onclick="toggleSidebar()" id="panel-toggle">
        <img src="https://via.placeholder.com/64x64"/>
    </button>
    
    <?php 
        include("../sidebar.php");
        include("../scripts/blogEngine.php");
        $postID = $_GET["id"];
        $postType = $_GET["type"];
    ?>



    <main id="main">
        <h1 id="page-title">
            <?php
                $post = getPostFromID( getPosts($postType, "all"), $postID);
                echo $post["title"];
            ?>
            
        </h1>

        <div id="main-view">
            <div id="post-container">

            </div>

            <script>
                let md = new Remarkable();
                document.getElementById("post-container").insertAdjacentHTML("beforeend", md.render(<?= getMD($post) ?>));

                let type = "<?= $postType ?>";
                let subitems;

                switch (type) {
                    case "blog" :
                        document.getElementById("body").className += " blog";
                        subitems = document.getElementById("nav-blog-sub").querySelectorAll(".nav-subitem");
                        for (i = 0; i < subitems.length; i++) {
                            subitems[i].style.display = "block";
                        }
                        break;

                    case "works" :
                        document.getElementById("body").className += " projects";
                        subitems = document.getElementById("nav-projects-sub").querySelectorAll(".nav-subitem");
                        for (i = 0; i < subitems.length; i++) {
                            subitems[i].style.display = "block";
                        }
                        break;
                }



                // include this js snippet in pages where ?cat is defined
                let cat = "<?= $_GET["cat"] ?>";
                elems = document.querySelectorAll("#" + cat);
                for (i=0; i<elems.length ; i++) {
                    elems[i].className += " nav-subitem-active";
                }

            </script>
            
            
            
        </div>


    </main>
    

    


</body>
</html>