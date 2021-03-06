<?php
/* form.php */
session_start();
$_SESSION['message'] = ' ';
$_SESSION['logmessage'] = ' ';

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
    <link rel="stylesheet" href="style.css" type="text/css">

</head>
<body>

<header>
<h1>De Gokkers</h1>

<div class="login">

    <form class="form" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
        <div class="alert alert-error"><?= $_SESSION['message'] ?></div>
        <input type="email" placeholder="Email" name="logemail" required />
        <input type="password" placeholder="Password" name="logpassword" autocomplete="new-password" required />
        <div class="submit">
            <div class="loginbtn">
            <input  class="button" type="submit" value="login" name="login"/>
            </div>
        </div>
    </form>
    <button class="button" id="myBtn">Register</button>

    <!-- The Modal -->
    <div id="myModal" class="modal">

        <!-- Modal content -->
        <div class="modal-content">
            <span class="close">&times; </span>
            <div class="register">

                <form class="form2" action="index.php" method="post" enctype="multipart/form-data" autocomplete="off">
                    <div class="password">
                        <input type="email" placeholder="Email" name="email" required />
                    </div>
                    <div class="password">
                        <input type="password" placeholder="Password" name="password" autocomplete="new-password" required />
                    </div>
                    <div class="password">
                    <input type="password" placeholder="Confirm Password" name="confirmpassword" autocomplete="new-password" required />
                    </div>
                    <div class="requirements">
                    <p>Password must contain a Capital letter, a number and needs to be at least 7 characters long.</p>
                    </div>
                    <div class="submit2">
                        <input type="submit" value="register" name="register" id="submit"/>
                    </div>
                    <div class="terms">
                        <input type="checkbox" required name="terms"> I accept the <a href="terms.php">Terms and Conditions</a></p>
                    </div>
            </div>
        </div>
        </form>
    </div>
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
<div class="banner">
    <video autoplay loop>
        <source src="img/trailer.mp4" type="video/mp4">
        <source src="img/trailer.ogg" type="video/ogg">
        Your browser does not support the video tag.

    </video>
</div>
<div class="image">
<div class="game">
<div class="main-content">
    <h2>Information about this game.</h2>

        <h3>What the game is about</h3>
    <div class="aboutgame">
        <p>In this game you can bet on an elephant, if you choose the elephant that reaches the end first,
            you win your bet times 2. </p>
    </div>
        <h3>How to get the game</h3>
    <div class="aboutgame">
        <p>To get the game you first have to download it, after that you can run the .exe file and play the game.
        Then you can bet on an elephant you think is going to win and then choose how much you want to bet.
        And finally hit start and see what kind of fortune you earn. </p>
    </div>
</div>
</div>
</div>

<div class="download">
    <div class="back">
            <?php
            $logincheck ? 'true' : 'false';
            if ($logincheck == true) {
                ?><p>Click <a href="program/The_Gambalers.exe">here</a> to download now!!!!!</p>
            <?php
                }else{
                ?><p>To download you need to login!</p> <?php
            }
            ?>
    </div>
</div>
</body>
</html>



