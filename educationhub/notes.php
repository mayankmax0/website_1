<?php
session_start();
include("db.php");

$result = mysqli_query($conn, "SELECT n.*, u.name FROM notes n JOIN users u ON n.uploaded_by = u.id");

while($row = mysqli_fetch_assoc($result)){
    echo "<h3>".$row['title']."</h3>";
    echo "<p>".$row['content']."</p>";
    echo "<small>Uploaded by ".$row['name']."</small><hr>";
}
?>