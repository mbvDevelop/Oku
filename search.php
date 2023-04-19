<?php

$user_id = $_SESSION['user_id'];
$results = [];
$show_message = false;

if (isset($_GET['search'])) {
    $search = $_GET['search'];

    // check if search query is empty
    if (empty(trim($search))) {
        header('Location: '.$_SERVER['HTTP_REFERER'].'?error=emptysearch');
        exit();
}
    $stmt = $conn->prepare("SELECT * FROM files WHERE user_id = :user_id AND (name LIKE :search OR path LIKE :search OR thumbnail LIKE :search) ORDER BY id DESC");
    $stmt->execute(['user_id' => $user_id, 'search' => '%' . $search . '%']);

    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    // check if $results array is not empty

    if (count($results) == 0) {
        $show_message = true;
    } else{
    $style = 'display:block;';
    }
} else {
    $style = 'display:none';
}
