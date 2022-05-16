<?php
session_start();
include 'config.php';
include("functions.php");


	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
		//something was posted
		$username = $_POST['ID'];
		$password = $_POST['pass'];
                $firstname = $_POST['firstName'];
                $lastname = $_POST['lastName'];

    
   
                //checking if one of the fields is empty
		//if(!empty($username) && !empty($password) && !empty($firstname) && !empty($lastname))
		//{         
   
      
  
                    $sql = "SELECT * FROM admin WHERE username='$username'";
                    $res = mysqli_query($conn, $sql);
                    
                if (mysqli_num_rows($res) > 0){
                    //msg redirect
                    $message = "Sorry... username is already taken, Please try again";
                    echo "<script>alert('$message');</script>";                 
                }
                
                
               else {
                   
                    //sanatizing user inputs:
                     $username = mysqli_real_escape_string($conn, $_POST['ID']);
                     $password = mysqli_real_escape_string($conn, $_POST['pass']);
                     $firstname = mysqli_real_escape_string($conn, $_POST['firstName']);
                     $lastname = mysqli_real_escape_string($conn, $_POST['lastName']);

                    
			//random num for emp_num
			$admin_id = random_num(4);
                        
                        //hash pass
                       // $hash = password_hash($password, PASSWORD_DEFAULT);
                       $hash = md5($password);
                        
                        //save to database
		       $query = "insert into admin (id,username,firstName,lastName,password) values ('$admin_id','$username','$firstname','$lastname', '$hash')";
 
			$result = mysqli_query($conn, $query);
                        
                       //        
                       if( $result ){
                          // success! check results
                           //unhash pass
                           $hash = md5($password);
    
                           $query = "SELECT * FROM admin WHERE username='$username' and password='$hash'";
                           $result = mysqli_query($conn, $query);
                           $rows = mysqli_num_rows($result);
                          if ($rows == 1){
                              /* . . . do something */
                              $row = mysqli_fetch_assoc($result); //
                              $_SESSION['id'] = $row['id'];
                              $_SESSION['role'] = "Admin";
			     header("Location: adminHome.php");
                          }
                        }
                         else{
                             echo "<script>alert('error in sign up');</script>"; 
                             }
                        
       
                        }
	//	}//end if empty
                
            //    else
	//	{
                      //header msg redirect
		//	echo "<script>alert('please fill in all the fields');</script>"; 
		//}
	}

?>



<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
-->
<html>
<head>
  <meta charset="utf-8">
  <title>Sign-up</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  href="forms.css">
   <script src = "logInSignup.js"></script>
    <link rel="stylesheet"  href="addUpdate.css">

    

</head>


<body>

   
     			      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>  
        <main>
    
        <header>


<nav>
<ul>
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png" alt="logo"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a href="index.php">Home ></a></li>
 <li class = 'link'><a href="login.php">Log-in ></a></li>
 <li class = 'link'><a class="active" href="signup.php">Sign-up</a></li>

</ul>
</nav>
</header>
		
<h1 class = "empsignup">Enroll with us!</h1>
<br>
<br>
         
          <div class="formbg">
            <div class="content-padding">
              <p>Fill out the form</p>
              <form method = "POST" enctype = "multipart/form-data" onsubmit="return validationSignup();" action = "signup.php" name = "formSign">
                <div class="field">
                  <label for="ID">Username</label>
                  <input type="text" name="ID" placeholder = "xxxxxxxxxx" required>
                </div>
				 <div class="field">
                  <label for="firstName">First name</label>
                  <input type="text" name="firstName" required>
                </div>
					 <div class="field">
                  <label for="lastName">Last name</label>
                  <input type="text" name="lastName" required >
                </div>
                   <div class="field">
                  
                    <label for="password">Password</label>
                  
                  <input type="password" name="pass" required>
				  
                </div>
               
                <div class="field">
                  <input type="submit" name="submit" value="Sign up"  >
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