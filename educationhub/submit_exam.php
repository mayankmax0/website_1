<?php
session_start();
include("db.php");

$student_id = $_SESSION['user_id'];
$exam_id = 1;
$score = 0;

$questions = mysqli_query($conn, "SELECT * FROM questions WHERE exam_id=$exam_id");
while($q = mysqli_fetch_assoc($questions)){
    $qid = $q['id'];
    if(isset($_POST["q$qid"]) && $_POST["q$qid"] == $q['correct_option']){
        $score++;
    }
}

mysqli_query($conn, "INSERT INTO results (exam_id, student_id, score) VALUES ($exam_id, $student_id, $score)");
echo "You scored: $score";
?>