<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("Location: login.php");
    exit;
}
echo "<h2>Welcome to Dashboard</h2>";

if($_SESSION['role'] == 'teacher'){
    echo "<a href='upload_notes.php'>Upload Notes</a> | <a href='create_exam.php'>Create Exam</a>";
} else {
    echo "<a href='notes.php'>View Notes</a> | <a href='exam.php'>Take Exam</a>";
}
echo " | <a href='logout.php'>Logout</a>";
?>