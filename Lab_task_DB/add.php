<?php
include "config.php";

$success = $error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST["name"];
    $email = $_POST["email"];
    $reg = $_POST["registration_no"];
    $dept = $_POST["department"];

    if (empty($name) || empty($email) || empty($reg) || empty($dept)) {
        $error = "Please fill all fields";
    } else {

        $sql = "INSERT INTO students(name,email,registration_no,department)
                VALUES('$name','$email','$reg','$dept')";

        if (mysqli_query($conn, $sql)) {
            $success = "Student Added";
        } else {
            $error = "Error";
        }
    }
}
?>

<h2>Add Student</h2>

<form method="post">
Name: <input name="name"><br><br>
Email: <input name="email"><br><br>
Reg No: <input name="registration_no"><br><br>
Dept: <input name="department"><br><br>
<input type="submit" value="Add">
</form>

<br>
<a href="view.php">View</a>