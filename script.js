document.addEventListener("DOMContentLoaded", function () {
    loadPosts();
});

function loadPosts() {
    fetch("functions.php?action=get_posts")
        .then(response => response.json())
        .then(data => {
            const postsDiv = document.getElementById("posts");
            postsDiv.innerHTML = "";

            data.forEach(post => {
                const postElement = document.createElement("div");
                postElement.innerHTML = `<h2>${post.title}</h2><p>${post.content}</p>`;
                postsDiv.appendChild(postElement);
            });
        });
}

function savePost() {
    const title = document.getElementById("title").value;
    const content = document.getElementById("content").value;

    fetch("functions.php?action=add_post", {
        method: "POST",
        headers: {
            "Content-Type": "application/x-www-form-urlencoded",
        },
        body: `title=${encodeURIComponent(title)}&content=${encodeURIComponent(content)}`,
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                loadPosts();
                document.getElementById("postForm").reset();
            } else {
                alert("Error saving post");
            }
        });
}
