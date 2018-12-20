var md = new Remarkable();

console.log(md.render('# hey'));




async function loadPosts() {
    let list = await fetch("../posts/_list.json").then( r => r.json());
    let posts = {};
    for (let i = 0; i < list.body.length; i++) {
        let postname = "post" + i;
        posts[postname] = {};

        posts[postname].text = await fetch("../posts/" + list.body[i]).then(r => r.text());
        posts[postname].meta = await fetch("../posts/" + list.meta[i]).then(r => r.json());

    }

    return posts;
}
