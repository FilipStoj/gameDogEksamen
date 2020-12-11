<?php
    //  Sikrer sig brugeren er logget ind, så vises nedestående html
    session_start();
    if ($_SESSION['logged_in'] == true)
    { 
?>
<?php 
    include "connect.php"; 
    include "inkluder/navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>

    <!-- Bootstrap link CSS --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

    <!-- GOOGLE FONTS ROBOTO --> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    
    <!-- MAIN CSS --> 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
</head>


<body>


<?php
    // Connect to database
    $conn = new mysqli("localhost", "root", "root", "gamedog");
    if($conn->connect_error){
        echo "Failed to connect to MySQL: ".$conn->connect_error." (".$conn->connect_error.")";
        exit();
    }
    // Set character set to utf8
    $conn->set_charset("utf8");
?> 

<?php 

    $username = $_SESSION['username'];
    if($_SESSION['logged_in']) {
        $sql =  "SELECT * FROM users WHERE username = '". $username . "'";
        $check = mysqli_query($conn, $sql) or die("Query virker ikke");
        $user = mysqli_fetch_assoc($check); 
    } 
?>


<div class="container d-flex justify-content-center">
        <div class="row">
            <div class="col-lg-3">
                <!-- DIV ID MED RESULTATER, BONES, TIME-LEFT & LIVES --> 

                <div id="resultater">
                <h1 style='color:white;'>Your gaming profile</h2>
                    <br>
                    <p style='color:white;'>Username: <span> <?php echo $user['username']; ?>  </span></p>
                    <p style='color:white;'>E-mail: <span>  <?php echo $user['email']; ?>  </span></p>     
                    </div> 
                </div>

                <!-- DIV CLASS MED SPILLE REGLER --> 
                
            </div>
        </div>   
    </div>

</body>
</html>


<?php
    }  
        else 
    {
        header("location: login.php");
    }
?>


