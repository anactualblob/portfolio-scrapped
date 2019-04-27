<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Lucas Martinez - Portfolio</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="./projects_layout.css">
    <script src="../scripts/lib/remarkable.min.js"></script>
    <script src="../scripts/main.js"></script>
</head>

<body id="body" class="projects">
    <button onclick="toggleSidebar()" id="panel-toggle">
        <img src="https://via.placeholder.com/64x64"/>
    </button>

    <?php
        include("../sidebar.php");
    ?>



    <main id="main">
        <h1 id="page-title">
            Works
        </h1>

        <div id="main-view">
            <?php
                include("../scripts/blogEngine.php");
                $category = $_GET["cat"];
                $list = getPosts("works", $category);//, JSON_UNESCAPED_SLASHES);
                
                foreach ($list as $i) {
                    echo generateHTML($i);
                }
            ?> 
        </div>

        <script>
            // include this js snippet in pages where ?cat is defined
            let cat = "<?= $_GET["cat"] ?>";
            elems = document.querySelectorAll("#" + cat);
            for (i=0; i<elems.length ; i++) {
                elems[i].className += " nav-subitem-active";
            }
        </script>


    </main>
    

    


</body>
</html>