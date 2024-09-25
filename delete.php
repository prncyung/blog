<?php
include('header.php');
include('post.php');
$post = new Post($db);

$post->deletePostBySlug($_GET['slug']);

echo "deleted successfully";
header('Location:dashboard.php');
