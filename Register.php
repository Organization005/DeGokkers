<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
if ( isset($_GET['message'])){
    echo $_GET['message'];
}

?>
<form action="app.php" method="post">
    <div class="form-group">
        <label for="email">Voor hier uw email in</label>
        <input type="email" name="email" id="email">
    </div>
    <div class="form-group">
        <label for="password">Voor hier uw password in</label>
        <input type="password" name="password" id="password">
    </div>

</body>
</html>

