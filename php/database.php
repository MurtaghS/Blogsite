<?php

$dbConnect = array(
    'server' => 'localhost',
    'user' => '',
    'pass' => '',
    'name' => 'blogging'
);

$db = new mysqli(
    $dbConnect['server'],
    $dbConnect['user'],
    $dbConnect['pass'],
    $dbConnect['name']
);

if ($db->connect_errno>0) {
    echo "Database connection error" . $db->connect_error;
    console.log("errorshit");
    exit;
}

global $blog_id, $blogdate, $blogpost;

$stmt = $db->prepare("SELECT * FROM `blog` ORDER BY `blog_id` DESC");
$stmt->bind_result($blog_id, $blogdate, $blogpost); //Binds values from table into these variable names
$stmt->execute();


while ($stmt->fetch()){

	$blogdate = htmlentities($blogdate, ENT_QUOTES, "UTF-8");
    $blogpost = htmlentities($blogpost, ENT_QUOTES, "UTF-8");

    $output = "<li>";
    $output .= "<article>";
    $output .= "<h1><span class='delete'><img src='images/delete_icon.png'></span>$blogdate</h1>";
    $output .= "<p>$blogpost</p>";
    $output .= "</article>";
    $output .= "</li>";

    echo $output;
}

$stmt->close();

?>