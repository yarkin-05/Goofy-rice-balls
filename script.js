document.addEventListener('DOMContentLoaded', function () {
    fetchPosts();
    document.getElementById('add-post-form').addEventListener('submit', addPost);
});

function fetchPosts() {
    fetch('api.php')
        .then(response => response.json())
        .then(data => displayPosts(data))
        .catch(error => console.error('Error:', error));
}

function displayPosts(posts) {
    const postsList = document.getElementById('posts-list');
    postsList.innerHTML = '';
    posts.forEach(post => {
        const postDiv = document.createElement('div');
        postDiv.innerHTML = `<h2>${post.title}</h2><p>${post.content}</p><small>${post.created_at}</small>`;
        postsList.appendChild(postDiv);
    });
}

function addPost(event) {
    event.preventDefault();
    const formData = new FormData(event.target);
    fetch('api.php', {
        method: 'POST',
        body: formData
    })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchPosts();
                document.getElementById('add-post-form').reset();
                document.getElementById('post-form').style.display = 'none';
            } else {
                console.error('Error:', data.message);
            }
        })
        .catch(error => console.error('Error:', error));
}

function showForm() {
    document.getElementById('post-form').style.display = 'block';
}
    
