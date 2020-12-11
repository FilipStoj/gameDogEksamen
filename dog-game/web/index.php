<?php
    //  Sikrer sig brugeren er logget ind, så vises nedestående html
    session_start();
    if ($_SESSION['logged_in'] == true)
    { 
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Game</title>

    <!-- Bootstrap CSS LINK --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- GOOGLE FONTS ROBOTO --> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- MAIN CSS --> 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css?d=<?php echo time(); ?>" />
    
</head>
<body>

<!-- PHP INCLUDE, SOM INDEHOLDER MIN NAV BAR --> 
<?php include 'inkluder/navbar.php' ?>

<!-- TRE FORSKELLIGE H1'ER SOM DISPLAYER NÅR MAN VINDER, TABER, ELLER TIDEN GÅR UD  --> 
<h1 id="spilnavn"></h1>
<h1 id="vindertext"></h1>
<h1 id="tabertext"></h1>

<!-- HELE SPILLET ER I EN CONTAINER OG ROW --> 
<div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- DIV ID MED RESULTATER, BONES, TIME-LEFT & LIVES --> 
                <div id="resultater">
                    <div id="boxscore">Bones:</div><br>
                    <p class="score-display">Time left <span id="time-showing"></span> sec </p>
                    <p class="score-display">You have <span id="liv"></span> lives left</p>  
                </div>
                
                <!-- DIV CLASS MED SPILLE REGLER --> 
                <div class="reglerDiv mr-1" id="rulesGame">        
                            <h3 class="spilleReglerH">Rules for the game</h3>
                                <ul class="spilleRegler">
                                    <li>You have 50 seconds to reach level 3</li>
                                    <li>Collect bones as points</li>
                                    <li>You need at least 3 bones to level up</li>
                                    <li>You need at least 14 bones to win</li>
                                    <li>Avoide the bears to survive</li>
                                </ul>
                    </div>   
            </div>


            <!-- DIV CLASS MED LG --> 
            <div class="col-lg-1 mt-2"></div>
            <div class="col-lg-7 mt-2">

            <!-- SELVE SPILLET, MED ET CANVAS OG BUTTON --> 
                <center>
                    <canvas width="700" height="700" id="canvas"></canvas>
                    <button class="btn" id="startgame">Start spillet</button>
                </center>
                
            </div>
        </div>   
    </div>


    <!-- JAVASCRIPT REF --> 
    <script src="main.js"></script>    
</body>
</html>

<?php
    }
        else 
    {
        header("location: login.php");
    }
?>