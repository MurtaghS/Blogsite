<?php

require_once '../php/database.php';

$blogdate = $_POST['date'];
$blogpost = $_POST['post'];

$stmt = $db->prepare("INSERT INTO blog (date, post) VALUES (?, ?)");
$stmt->bind_param('ss', $blogdate, $blogpost);
$stmt->execute();
$stmt->close();

$maxIdSQL = "SELECT MAX(blog_id) AS blog_id FROM blog";
$maxIdResult = $db->query($maxIdSQL);
$maxIdNumrows = $maxIdResult->num_rows;

while ($row = $maxIdResult->fetch_object()) {
    $blogID = $row->blog_id;
    $result = $blogID;
}

echo $result;

?>