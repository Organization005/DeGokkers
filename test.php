<?php
require 'validate.php';

$dsn = 'mysql:accounts=users;host=127.0.0.1';
$user = 'root';
$password = '';
try {
    $dbh = new PDO($dsn, $user, $password);
} catch (PDOException $e) {
    echo 'Connection failed:' . $e->getMessage;
}
$email = $_POST['email'];
$query = $dbh->prepare("SELECT email FROM users WHERE email = ?");
$query->bindValue(1, $email);
$query->execute();

if ($query->rowCount() > 0) {

//                    $sql = "INSERT INTO users (email, password) " . "VALUES ('$email', '$hashed_password')";
//
//                    if ($mysqli->query($sql) === true) {
//                        $_SESSION['message'] = "Registration succesful!";
//                    } else {
//                        $_SESSION['message'] = 'User could not be added to the database!';
//                    }
    $_SESSION['message'] = "it works now";
} else {

    $_SESSION['message'] = "the email is already in use";

}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Degokkers</title>
    <link rel="stylesheet" href="form.css" type="text/css">
</head>
<body>

<h1>Create an account</h1>
<div class="login">

<form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
<input type="email" placeholder="Email" name="email" id="email"required />

<div class="submit">
    <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
</div>
</form>


</body>
</html>
