<?php
session_start();

$errors = [];

if ($_POST) {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $course = $_POST['course'];
    $terms = isset($_POST['terms']);

    if (!$name || !$email || !$username || !$password || !$confirm || !$age || !$gender || !$course)
        $errors[] = "All fields required";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $errors[] = "Invalid email";

    if (strlen($username) < 5)
        $errors[] = "Username too short";

    if (strlen($password) < 6)
        $errors[] = "Password too short";

    if ($password != $confirm)
        $errors[] = "Password not match";

    if ($age < 18)
        $errors[] = "Must be 18+";

    if (!$terms)
        $errors[] = "Accept terms";

    if (!$errors) {
        $_SESSION["username"] = $username;
        setcookie("username", $username, time()+(86400*30), "/");
        $success = true;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registration</title>
</head>
<body>

<h2>Student Registration</h2>

<form method="post">
Name: <input name="name"><br>
Email: <input name="email"><br>
Username: <input name="username"><br>
Password: <input type="password" name="password"><br>
Confirm: <input type="password" name="confirm"><br>
Age: <input type="number" name="age"><br>

Gender:
<input type="radio" name="gender" value="Male">Male
<input type="radio" name="gender" value="Female">Female<br>

Course:
<select name="course">
    <option value="">Select</option>
    <option value="CSE">CSE</option>
    <option value="BBA">BBA</option>
    <option value="EEE">EEE</option>
</select><br>

<input type="checkbox" name="terms">Accept<br>

<button>Submit</button>
</form>

<?php
if ($_POST) {
    if ($errors) {
        echo $errors[0]; 
    } else {
        echo "Registration Successful!<br>";
        echo "Username: " . $_SESSION["username"] . "<br>";
        echo "Course: " . $course . "<br>";

        if (isset($_COOKIE["username"])) {
            echo "Welcome back: " . $_COOKIE["username"];
        }
    }
}
?>

</body>
</html>