<?php
//session_start();
include 'config.php';
include("functions.php");

error_reporting(0); // For not showing any error


if (isset($_POST['submit'])) { 
	$name = $_POST['name']; 
	$comment = $_POST['comment']; 
        $rid = random_num(4);
        $filename = $_FILES['files']['name'];
        
          move_uploaded_file($_FILES['files']['tmp_name'],'upload/'.$filename);
          $sql2= "INSERT INTO review (id, website_name ,comment,image,name) VALUES ('$rid','Farfetch','$comment', '$filename', '$name')";
          $result2 = mysqli_query($conn, $sql2);

        
        if ($result2) {
		echo "<script>alert('Review added successfully.')</script>";
	} else {
		echo "<script>alert('Review does not add.')</script>";
               
	}
}//end submitting

 
 
?>


<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<html>
    <head>
        <title>item page</title>
        <link rel="stylesheet" href="item.css">
        <script src="itemvalidate.js"></script>
       
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <link rel="stylesheet"  href="addUpdate.css">
         
         <style>
 @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');



.wrapper {
    padding: 20px;
    background:#dedcef;
    box-shadow: 0 5px 10px rgba(0,0,0,0.3);
    width: 1300px;
    min-height: 400px;
    margin:20px auto ;
}

.wrapper .row {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
}

.wrapper .form .row .input-group {
    padding: 0 10px;
    display: block;
}

.wrapper .form .row .input-group:first-child {
    padding-left: 0;
}

.wrapper .form .row .input-group:last-child {
    padding-right: 0;
}

.wrapper .form .input-group {
    width: 100%;
    height: 50px;
    margin-bottom: 50px;
}

.wrapper .form .input-group label {
    font-weight: 600;
    margin-bottom: 5px;
    display: block;
}

.wrapper .form .input-group .btn {
    margin: 20px 0;
    display: block;
    padding: .7rem 2rem;
    opacity: .8;
    color: white;
    background: #1a1f36;
    border: none;
    outline: none;
    border-radius: 3px;
    cursor: pointer;
    font-size: 1rem;
    transition: .3s ease-in;
}

.wrapper .form .input-group .btn:hover {
    opacity: 1;
}

.wrapper .form .input-group input, .wrapper .form .input-group textarea {
    width: 100%;
    height: 100%;
    border: 1px solid #dedcef;;
    outline: none;
    padding: 5px 10px;
}

.wrapper .form .input-group.textarea {
    height: 200px;
}

.wrapper .form .input-group.textarea textarea {
    resize: none;
}

.wrapper .prev-comments {
    margin-top: 50px;
}

.wrapper .prev-comments .single-item {
    background: #FFF;
    box-shadow: 0 5px 10px rgba(0,0,0,0.2);
    padding: 10px 20px;
    text-align: left;
    margin-bottom: 25px;
}

.wrapper .prev-comments .single-item h4 {
    font-size: 1.3rem;
    font-weight: 800;
    color: #111;
}

.wrapper .prev-comments .single-item a {
    margin: 10px 0;
    font-size: 1rem;
    color: #111;
    text-decoration: none;
    display: inline-block;
}

.wrapper .prev-comments .single-item p {
    font-size: .9rem;
    color: #111;
}

.center {
  display: block;
  margin-left: auto;
  margin-right: auto;
  width: 50%;
}
.rev {
     text-align: left;
}

hr {
  display: block;
  margin-top: 0.5em;
  margin-bottom: 0.5em;
  margin-left: auto;
  margin-right: auto;
  border-style: inset;
  border-width: 1px;
}
         </style>


          
    </head>
    <body>
        <header>


<nav>
<ul>
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a href="index.php">Home ></a></li>
 <li class = 'link'><a class="active" href="farfetch.php">Item</a></li>
 


</ul>
</nav>
</header>
 			      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>  
        <main>
            

            <h1>Farfetch</h1>
            <img src="logo-Farfetch.png" alt="farfetchlogo" id="websitelogo">
            <p>FarFetch is an e-commerce platform that aims to connect creators, boutiques, 
                and customers from all around the world. Made for fashion lovers, this platform
                is all about luxury fashion items, which can get pretty pricey</p>
            
            <br>
            <br>
            
            

          
          
         
        
	<div class="wrapper">

		<div class="prev-comments">
                    <h2 >Reviews:</h2>
                    <br>
                    <br>
                    <br>
                    <br>
			<?php 
			include 'config.php';
                        //webnname
			$sql = "SELECT * FROM review WHERE website_name = 'Farfetch'";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['name']; ?></h4>
                                <br>
                                <hr>
                                <br>
		                <p class="rev"><?php echo $row['comment']; ?></p>
                                <br>
                                 <h3> Photo:</h3>
                                <?php
                                  if ($row['image'] != ''){
                                      
                                     echo "<img src='upload/".$row['image']."' width=\"25%\" height=\"30%\" class=\"center\" >";
                                  }
                                  else {
                                      echo "<span style=\"color:grey;\">no photo was submitted. </span>";
                                  }

                                
                                ?>
			</div>
			<?php

				}
			}
			
			?>
		</div> 
            
            
            
                       <br>
                       <br>
                       <br>
                       <h3 align = "left">Add your review:</h3>
                       <br>
                       <br>
                       
                       <form action="" method="POST" class="form" enctype="multipart/form-data"  onsubmit="return validationRequest2()">
			<div class="rw">
				<div class="input-group">
					<label for="name">Name</label>
					<input type="text" name="name" id="name" placeholder="Enter your Name" required>
				</div>

			</div>
			<div class="input-group textarea">
				<label for="comment">Review</label>
				<textarea id="comment" name="comment" placeholder="Enter your review" required></textarea>
			</div>
                          
                    <div class="input-group">
                     <label for="attachment">Photo</label>
                    <input type="file" id = "att" name="files" multiple onchange ="filesnum(this)">	  
                </div>
                            
			<div class="input-group">
				<button name="submit" class="btn">Post Review</button>
			</div>
		</form>
	</div>
            
            
            
            
        </main>


    <div id="imagePreview"></div>
 <br>
 
 
		<br>
          <footer>
            <br>
            <div style="color: white;">
              All rights reserved for group 1 2022  
            </div> 
	
           <br>
        </footer>


                
    
    
   
    </body>
</html>
