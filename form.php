<?php
/* form.php */
session_start();
$_SESSION['message'] = '';

require 'validate.php';

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
    <input type="email" placeholder="Email" name="email" required />
    <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
    <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
    <div class="submit">
        <input type="submit" value="Register" name="register" class="btn btn-block btn-primary" />
    </div>
</form>


</body>
</html>



