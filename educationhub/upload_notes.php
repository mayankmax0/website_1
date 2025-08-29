<?php
session_start();
include("db.php");

if($_SESSION['role'] != 'teacher'){
    die("Access denied!");
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $title = $_POST['title'];
    $content = $_POST['content'];
    $teacher_id = $_SESSION['user_id'];

    $sql = "INSERT INTO notes (title, content, uploaded_by) VALUES ('$title', '$content', '$teacher_id')";
    mysqli_query($conn, $sql);
    echo "Notes uploaded successfully!";
}
?>
<form method="post">
  <h2>Upload Notes</h2>
  <input type="text" name="title" placeholder="Title" required><br>
  <textarea name="content" placeholder="Write notes here..." rows="10" cols="40"></textarea><br>
  <button type="submit">Upload</button>
</form>