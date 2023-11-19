<?php
include("config.php");

$action = $_GET['action'];

switch ($action) {
    case 'get_posts':
        getPosts();
        break;
    case 'add_post':
        addPost();
        break;
    default:
        break;
}

function getPosts() {
    global $conn;
    $result = $conn->query("SELECT * FROM posts");
    $posts = [];

    while ($row = $result->fetch_assoc()) {
        $posts[] = $row;
    }

    echo json_encode($posts);
}

function addPost() {
    global $conn;

    $title = $_POST['title'];
    $content = $_POST['content'];

    $stmt = $conn->prepare("INSERT INTO posts (title, content) VALUES (?, ?)");
    $stmt->bind_param("ss", $title, $content);

    $success = $stmt->execute();
    
    $response = ['success' => $success];
    echo json_encode($response);
}
?>
