<?php

    // Demand a GET parameter
    if ( ! isset($_GET['name']) || strlen($_GET['name']) < 1  ) {
        header('Location: error.html');
        return;
    }

    // If the user requested logout go back to index.php
    if ( isset($_POST['logout']) ) {
        header('Location: index.php');
        return;
    }

    // Set up the values for the game...
    // 0 is Rock, 1 is Paper, and 2 is Scissors
    $names = array('Rock', 'Paper', 'Scissors');
    $human = isset($_POST["human"]) ? $_POST['human']+0 : -1;

    $computer = 0; 
    //Make the computer be random
    $computer = rand(0,2);

    // This function takes as its input the computer and human play
    // and returns "Tie", "You Lose", "You Win" depending on play
    // where "You" is the human being addressed by the computer
    function check($computer, $human) {
        // For now this is a rock-savant checking function
        if($computer == 0){ //rock
            if($human == 0)
                return "Tie";
            else if($human == 1)
                return "You win";
            else if($human == 2)
                return "You Lose";

        }
        else if($computer == 1){ //paper
            if($human == 1)
                return "Tie";
            else if($human == 2)
                return "You win";
            else if($human == 0)
                return "You Lose";
        }
        else if($computer == 2){  //scissors
            if($human == 2)
                return "Tie";
            else if($human == 0)
                return "You win";
            else if($human == 1)
                return "You Lose";

        }
        return false;
    }

    // Check to see how the play happenned
    $result = check($computer, $human);

?>


<!DOCTYPE html>
<html  class="game-page-body">
    <head>
        <link rel="stylesheet" type="text/css" href="styling.css">
        <title>Shantanu's Rock,Paper,Scissors Game</title>
     <!--   <link rel="stylesheet" type="text/css" href="styling.css"> -->
        <style>
            body{
                font-family: Arial, sans-serif, monospace;
                padding : 30px; 
            }
        </style>
    </head>
        
    <body>
        <h1>Rock Paper Scissors</h1>
        <?php
        if ( isset($_REQUEST['name']) ) {
            echo "<p>Welcome: ";
            echo htmlentities($_REQUEST['name']);
            echo "</p>\n";
        }
        ?>

        <form method="post">
            <select name="human">
                <option value="-1">Select</option>
                <option value="0">Rock</option>
                <option value="1">Paper</option>
                <option value="2">Scissors</option>
                <option value="3">Test</option>
            </select>
            <div id="game-button-container">
                <input type="submit" value="Play" class="button1 button2">
                <pre>   </pre>
                <input type="submit" name="logout" value="Logout" class="button1 button2">
            </div>
        </form>

        <pre>
        <?php
        if ( $human == -1 ) {
            print "\nPlease select a strategy and press Play.\n";
        } else if ( $human == 3 ) {
            echo "\n";
            for($c=0;$c<3;$c++) {
                for($h=0;$h<3;$h++) {
                    $r = check($c, $h);
                    print "\nHuman=$names[$h] Computer=$names[$c] Result=$r";
                }
            }
        } else {
            print "\nYour Play=$names[$human] Computer Play=$names[$computer] Result=$result";
        }
        ?>
        </pre>
        </div>
    </body>
</html>
