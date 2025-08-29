<?php
session_start();
include("db.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $role = $_POST['role'];

    $sql = "INSERT INTO users (name, email, password, role) VALUES ('$name', '$email', '$pass', '$role')";
    if(mysqli_query($conn, $sql)){
        echo "Registration successful. <a href='login.php'>Login here</a>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<form method="post">
  <h2>Register</h2>
  <input type="text" name="name" placeholder="Full Name" required><br>
  <input type="email" name="email" placeholder="Email" required><br>
  <input type="password" name="password" placeholder="Password" required><br>
  <select name="role">
      <option value="student">Student</option>
      <option value="teacher">Teacher</option>
  </select><br>
  <button type="submit">Register</button>
</form>