<?php 

if (!empty($_GET)) {
    $post = $_GET['p'];
    $cat = $_GET['cat'];
}

if (empty($post) && empty($cat)) {
    echo "home";
} elseif(!empty($post)) {
    echo "single";
} elseif (!empty($post)) {
    echo "cat";
}

?>