<?php
session_start();
include("db.php");

$questions = mysqli_query($conn, "SELECT * FROM questions WHERE exam_id=1");

echo '<form id="examForm" method="post" action="submit_exam.php">';
while($q = mysqli_fetch_assoc($questions)){
    echo "<p>".$q['question_text']."</p>";
    echo "<input type='radio' name='q".$q['id']."' value='a'> ".$q['option_a']."<br>";
    echo "<input type='radio' name='q".$q['id']."' value='b'> ".$q['option_b']."<br>";
    echo "<input type='radio' name='q".$q['id']."' value='c'> ".$q['option_c']."<br>";
    echo "<input type='radio' name='q".$q['id']."' value='d'> ".$q['option_d']."<br><br>";
}
echo '<button type="submit">Submit</button></form>';
?>

<script>
let time = 300;
let timer = setInterval(function(){
    let min = Math.floor(time/60);
    let sec = time%60;
    document.title = "Time Left: "+min+":"+(sec<10?"0"+sec:sec);
    time--;
    if(time<0){
        clearInterval(timer);
        document.getElementById("examForm").submit();
    }
},1000);
</script>