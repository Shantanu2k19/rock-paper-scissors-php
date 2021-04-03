<?php 

    if ( isset($_POST['cancel'] ) ) {
        // Redirect the browser to game.php
        header("Location: index.php");
        return;
    }

    $salt = 'XyZzy12*_';
    $stored_hash = '1a52e17fa899cf40fb04cfc42e6352f1';  //
    //$stored_hash = 'a8609e8d62c043243c4e201cbb342862';  // Pw is meow123
    //pass meow123

    $failure = false;  // If we have no POST data

    // Check to see if we have some POST data, if we do process it
    if ( isset($_POST['who']) && isset($_POST['pass']) ) {
        if ( strlen($_POST['who']) < 1 || strlen($_POST['pass']) < 1 ) {
            $failure = "User name and password are required";
        } else {
            $check = hash('md5', $salt.$_POST['pass']);
            if ( $check == $stored_hash ) {
                // Redirect the browser to game.php
                header("Location: game.php?name=".urlencode($_POST['who']));
                return;
            } else {
                $failure = "Incorrect password";
            }
        }
    }

?>



<!DOCTYPE html>
<html>
    <head>
        <title>Shantanu Singh's Login Page</title>
        <style>
            body{
                padding : 40px;
                font-family: Arial, sans-serif;
            }
        </style>
    </head>
<body>

<h1>Please Log In</h1>
    <?php
    if ( $failure !== false ) {
        echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
    }
    ?>
    <form method="POST">
        <label for="nam">User Name</label>
        <input type="text" name="who" id="nam"><br/>

        <label for="id_1723">Password</label>
        <input type="text" name="pass" id="id_1723"><br/>

        <input type="submit" value="Log In">
        <input type="submit" name="cancel" value="Cancel">
        <p style="font-size: small; color: gray;"><br>hint : php123<p>
    </form>
</body>
