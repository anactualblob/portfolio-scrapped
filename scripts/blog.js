// RMARKABLE DECLARATION
let md = new Remarkable();

// POSTS OBJECT DECLARATION
let posts = {};

// POSTS FORMAT DECLARATION
let header = "h2";

(async function blogSetup() {
    posts = await getPosts();
    displayByTag(["testtag1"]);
})();


async function getPosts() {
    let list = await fetch("../posts/_list.json").then( r => r.json());
    let ret={};
    for (let i = 0; i < list.meta.length; i++) {
        let postname = "post" + i;

        ret[postname] = await fetch("../posts/" + list.meta[i]).then(r => r.json());
    }

    console.log("retrieved posts");
    return ret;
}





// Check if the given posts is taged with ANY of the tags in the given array of tags
// MUST GIVE AN ARRAY OF TAGS
function checkTags(post, tag_arr) {
    for (let i = 0; i < tag_arr.length; i++) {
        for (let j = 0; j < post.tags.length; ) {
            if (tag_arr[i] == post.tags[j]) {
                return true;
            }
        }
    }
    return false;
}


// Given an array of tag(s), display the posts that contain any of the tags on the page
function displayByTag (tag_arr) {
    let render = [];
    
    for (let i in posts) {        
        if ( checkTags(posts[i], tag_arr) ) {
            render.push(posts[i]);
        }
    }

    for (let i = 0; i< render.length; i++) {
        str = generateCard(render[i]);
        target = document.getElementById ("posts-view");
        target.innerHTML = str;

    }
}



// Generates HTML for a post card to be added to the page
// TODO : add a link ot go to the article page
function generateCard(post) {
    let title = "";
    let desc = "";
    let img = "";

    //TODO : display category on HTML element
    let cat = "";

    title = "<"+header+" class='post-meta-title'>" + post.title + "</"+header+">";
    desc = "<p class='post-meta-desc'>" + post.desc + "</p>";
    img = "<img src='" + post.image + "' class='post-meta-img' />";

    element = 
        "<div class='post-meta'>" +
            "<a href='../posts/_post.html' class='post-meta-link'>" +
            title + "\n" + 
            desc + "\n" + 
            img + "\n" +
            "</a>" +
        "</div>";

    return element;
}



