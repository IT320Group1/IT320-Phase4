<?php
session_start();
include 'config.php';
include("functions.php");


if (isset($_POST['ID']) && isset($_POST['pass'])) {
 
    $username = $_POST['ID'];
    $pass = $_POST['pass'];

    if (empty($username)) {
        echo "<script>alert('Username is required!');</script>"; 
    }
    if(empty($pass)){
        echo "<script>alert('Password is required!');</script>"; 
    }
    
    //end validate
    else{

         //sanatizing user inputs:
       $username = mysqli_real_escape_string($conn, $_POST['ID']);
       $pass = mysqli_real_escape_string($conn, $_POST['pass']);
        
    
       $hash = md5($pass);
        
       $sql = "SELECT * FROM admin WHERE username='$username' AND password='$hash'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            //$passUnHashed = md5($pass);
            if ($row['username'] === $username && $row['password'] === $hash) {

                //adding to session var
                $_SESSION['id'] = $row['id'];
                $_SESSION['role'] = "Admin";
                //$_SESSION['first_name'] = $row['first_name'];
                //$_SESSION['last_name'] = $row['last_name'];
                //$_SESSION['last_name'] = $row['last_name'];
                //$_SESSION['job_title'] = $row['job_title'];
                //$_SESSION['username'] = $row['username'];
                //$_SESSION['password'] = $row['password'];
    
                header("Location: adminHome.php");


            }
            
            else{
                echo "<script>alert('Sorry, Username or password is incorrect, Please try again');</script>"; 
                header("Location: login.php");
            }

        }
        else{

             echo "<script>alert('Sorry, Username or password is incorrect, Please try again');</script>"; 
        }

    }

}

?>



<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <title>Admin Log-in</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="forms.css">
    <link rel="stylesheet"  href="addUpdate.css">

</head>

<body>
      <header>


<nav>
<ul>
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png" alt="logo"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a href="index.php">Home ></a></li>
 <li class = 'link'><a class="active" href="login.php">Log-in</a></li>

</ul>
</nav>
</header>
	 			      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>  
        <main>	
<h1>Welcome Back!</h1>
<br>
<br>
        
          <div class="formbg">
            <div class="content-padding">
              <p>Log in to your account</p>
             <form  method = "POST" enctype = "" action = "login.php" id = "formEmpLog">
                 
                <div class="field">
                  <label for="ID">Username</label>
                  <input type="text" name="ID" placeholder = "xxxxxxxxxx" required>
                </div>
                <div class="field">
                  
                    <label for="password">Password</label>     
                  <input type="password" name="pass" required>		  
                </div>
               
                <div class="field">
                  <input type="submit" name="submit" id = "emp" value="Log in">
                </div>
				
				<div class = "field">
				Are you new? <a href="signup.php">Sign-up</a>
				</div>
              </form>
			  
			  
            </div>
          </div>
      <footer>
	  <br>
            <div style="color: white;">
              All rights reserved for group 1 2022  
            </div>
<br>			
        </footer>
    </body>   
        
      
</body>

</html>