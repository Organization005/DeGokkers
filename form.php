<?php
/* form.php */
session_start();
$_SESSION['message'] = '';
$_SESSION['logmessage'] = '';

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

<header>


<div class="login">

    <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['logmessage'] ?></div>
        <input type="email" placeholder="Email" name="logemail" required />
        <input type="password" placeholder="Password" name="logpassword" autocomplete="new-password" required />
        <div class="submit">
            <input type="submit" value="login" name="login"/>
        </div>
    </form>
</div>
    <button id="myBtn">Register</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times;</span>
            <div class="register">

                <form class="form" action="form.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
                    <input type="email" placeholder="Email" name="email" required />
                    <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
                    <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
                    <div class="submit">
                        <input type="submit" value="register" name="register"/>
                    </div>
            </div>
        </div>
        </form>
    </div>
<script>
    // Get the modal
    var modal = document.getElementById('myModal');

    // Get the button that opens the modal
    var btn = document.getElementById("myBtn");

    // Get the <span> element that closes the modal
    var span = document.getElementsByClassName("close")[0];

    // When the user clicks the button, open the modal
    btn.onclick = function() {
        modal.style.display = "block";
    }

    // When the user clicks on <span> (x), close the modal
    span.onclick = function() {
        modal.style.display = "none";
    }

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }
</script>
</header>
</body>
</html>



