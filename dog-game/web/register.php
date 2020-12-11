<?php
// Fejltekster som kommer frem hvis du skriver noget forkert i input felterne
$fejlBrugernavn =""; 
$emailFejl ="";

    // Registration form
    if(isset($_POST['submit'])){
        require_once('connect.php');
        //basic security (real_escape_string) avoids SQL injection (' or 0=0 #)
        $username = $conn->real_escape_string($_POST['username']);
        $email = $conn->real_escape_string($_POST['email']);
        $password = sha1($_POST['password']);
        //Check if username exist else
        $check = $conn->query("SELECT username from users WHERE username = '$username' LIMIT 1");
        if($check->num_rows == 1) {
            $fejlBrugernavn ="<p style='color:white;'> Username already exits </p>"; 
        }
        else{
            $insert = "INSERT INTO users (username, email, `password`) VALUE ('$username', '$email', '$password')";
            if($conn->query($insert)){
                header("location:login.php"); 
            }
        }
        // Check if email exist else
        $check = $conn->query("SELECT email from users WHERE email = '$email' LIMIT 1");
        if($check->num_rows == 1) {
            $emailFejl ="<p style='color:white;'> Email already exists! </p>";
        } 
        // Else insert into database and heading to login.php
        else{
            $insert = "INSERT INTO users (username, email, password) VALUE ('$username', '$email', '$password')";
            if($conn->query($insert)){
                header("Location: login.php");
            }
            else{
                echo "<p style='color:white;'> Something went wrong with our database</p>";
            }
        }
        //close connection
        $conn->close();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>User registration</title>

    <!-- Bootstrap link CSS --> 
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

     <!-- GOOGLE FONTS ROBOTO --> 
     <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

    <!-- MAIN CSS --> 
    <link rel="stylesheet" type="text/css" media="screen" href="main.css"/>

</head>
<body>

        <!-- LOGO I VENSTRE HJØRNE --> 
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="index.php"><img src="images/boneheadlogo.png" alt="Logo" width="90" height="70"></a>
        </nav>

   <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8 ml-auto mr-auto">
                <div class="jumbotron">
                        <h1 class="overskriftRegister">Create an Account</h1>

                        <!-- Fejl meddelser som kommer frem hvis man skriver det brugernavn eller email --> 
                        <p><span><?php echo "$fejlBrugernavn $emailFejl"?></span></p>
                        <form method="POST">
                                   
                                    <div class="form-group">
                                        <label>User name <span>*</span></label>
                                        <input type="text" class="form-control" name="username" id="username" placeholder="Enter user name" required>
                                    </div>
                                    
                                    <!-- Pattern specifere hvilke krav der er til en adgangskode --> 
                                    <div class="form-group">
                                        <label>Password <span>*</span></label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{4,}$" title="You need at least one lowercase and uppercase letter and a number." required>
                                    </div>


                                    <div class="form-group">
                                        <label>Email address <span>*</span></label>
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Enter email" required>
                                    </div>
                                
                            <input class="registerButton" type="submit" name="submit" value="Create Account">
                        </form>

                        <br>
                        <p class="createacc"><a href="login.php">I have an account</a></p>

                </div>
            </div>
        </div>
    </div>
</body>
</html>