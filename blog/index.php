<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Lucas Martinez - Portfolio</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="../main.css">
    <link rel="stylesheet" type="text/css" href="./blog_layout.css">
    <script src="../scripts/lib/remarkable.min.js"></script>
    <script src="../scripts/main.js"></script>
</head>

<body id="body" class="blog">
    <button onclick="toggleSidebar()" id="panel-toggle">
        <img src="https://via.placeholder.com/64x64"/>
    </button>

    <?php
        include("../sidebar.php");
    ?>

    <main id="main">
        <h1 id="page-title">
            Blog
        </h1>

        <div id="main-view">

        <?php
            include("../scripts/blogEngine.php");
            $category = $_GET["cat"];
            echo getPosts($category, JSON_UNESCAPED_SLASHES);
        ?>

        </div>


    </main>
    

    


</body>
</html>