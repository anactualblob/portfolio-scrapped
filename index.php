<!DOCTYPE html>

<html>
<head>
    <meta charset="utf-8"/>
    <title>Lucas Martinez - Portfolio</title>
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro" rel="stylesheet"> 
    <link rel="stylesheet" type="text/css" href="main.css">
    <link rel="stylesheet" type="text/css" href="index_layout.css">
    <script src="./scripts/lib/remarkable.min.js"></script>
    <script src="./scripts/main.js"></script>
</head>

<body id="body" class="home">
    <button onclick="toggleSidebar()" id="panel-toggle">
        <img src="https://via.placeholder.com/64x64"/>
    </button>
    <?php
        include("sidebar.php");
    ?>

    <main id="main">
        <h1 id="page-title">
            Home
        </h1>

        <div id="main-view">
            <div id="about" class="home-section">
                <h2>About Me</h2>
                <h3>Hi! My name is Lucas, I make games.</h3>
                <p> 
                    placeholder placeholder placeholder placeholder
                    placeholder placeholder placeholder placeholder
                    placeholder placeholder placeholder placeholder 
                </p>

            </div>

            <div id="projects" class="home-section">
                <h2>Projects</h2>
                <div id="projects-flex">
                    <div class="home-project">
                        <div class="home-project-titlebar"></div>
                    </div>
                    <div class="home-project">
                        <div class="home-project-titlebar"></div>
                    </div>
                    <div class="home-project">
                        <div class="home-project-titlebar"></div>
                    </div>
                </div>

                <h3 id="home-projects-more">See More</h3>
            </div>

            <div id="posts" class="home-section">
                <h2>Blog Posts</h2>
                <div id="posts-container">
                    <div class = "home-post">

                    </div>
                    <div class = "home-post">
                        
                    </div>
                    <div class = "home-post">
                        
                    </div>
                </div>
            </div>

        </div>


    </main>
    

    


</body>
</html>