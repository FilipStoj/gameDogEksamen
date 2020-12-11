<?php
    // Fejltekster som kommer frem hvis du skriver noget forkert i input felterne 
    $wrongPass = ""; 


    // Login
    // Den første kodelinje kontrollerer, om formularen er indsendt eller ej
    // Navnet på afsenderknappen er "submit". Når der trykkes på knappen login, $_POST['submit'] indstilles og IF-betingelsen bliver sand. I dette tilfælde viser vi det navn, der er indtastet af brugeren. Hvis formularen ikke indsendes, vil IF-betingelsen være FALSK, da der ikke er nogen værdier i, $_POST['submit']og PHP-kode ikke vil blive udført.

    if(isset($_POST['submit'])){
        require_once("connect.php");
        $username = $conn->real_escape_string($_POST['username']);
        $password = sha1($_POST['password']);
        $read = "SELECT * FROM users WHERE username = '$username' AND `password` = '$password' LIMIT 1";
        $check = $conn->query($read);
        $conn->close();
        // Check if query return anything, if not no match in database and user has to register
        if(!$check->num_rows == 1){
            $wrongPass ="<p style='color:white;'> Invalid username or password </p>";  
        }
        else{
            // PHP session start
            session_start();
            $_SESSION['username'] = $username; 
            $_SESSION['logged_in'] = true;
            // Redirect to index.php where my game is and stop present code
            header('Location: index.php');
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <!-- Boootstrap --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

     <!-- GOOGLE FONTS ROBOTO --> 
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- Stylesheet --> 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>
</head>


<body>
        <!-- LOGO I VENSTRE HJØRNE --> 
            <nav class="navbar navbar-expand-lg navbar-light">
                <a class="navbar-brand" href="index.php"><img src="images/boneheadlogo.png" alt="Logo" width="90" height="70"></a>
            </nav>

<!-- LOGIN FORM I EN CONTAINER SAMT JUMBOTRON -->
<div class="container">
    <div class="row">
        <div class="col-sm-12 col-md-8 ml-auto mr-auto">
            <div class="jumbotron">
                        <h1 class="overskriftLogin">Login to play</h1>
                        <p><span><?php echo " $wrongPass " ?> </span></p>
                            
                        <!-- PHP_SELF er en variabel, der returnerer det aktuelle script, der udføres. Variabel returnerer navnet og stien til den aktuelle fil. --> 
                            <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" class="form-control" name="username" placeholder="Username">
                                </div>
                        
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" class="form-control" name="password" placeholder="Password">
                                </div>
                                
                                <input class="loginButton" type="submit" name="submit" value="Login">
                            </form>
                            <br>
                            <p class="createacc"><a href="register.php">Create account</a></p>
            </div>    
        </div>
    </div>
</div>

</body>
</html>




