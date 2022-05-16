<!DOCTYPE html>
<?php
session_start();
include 'connection.php';


if (!isset($_SESSION['id']))
	header('Location:index.php');

if(isset($_GET['id'])){
   $sql = "SELECT  website_name, description, website_image,Brand FROM website WHERE id ='".$_GET['id']."'";
  if($result = mysqli_query($connection, $sql))
          $row = mysqli_fetch_assoc($result); 
  
}
$wid = $_GET['id'];

?>
<html>
<head>
  <meta charset="utf-8">
  <title>Update Website</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet"  href="addUpdate.css">
<script src = "logInSignup.js"></script>
</head>


<body>

<header>


<nav>
<ul>
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png" alt="logo"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a href="adminHome.php">Home ></a></li>
 <li class = 'link'><a href=<?php echo"'adminItem.php?id=$wid'"?>>Item ></a></li>
  <li class = 'link'> <a class="active" href=<?php echo"'update.php?id=$wid'";?>>update</a></li>

</ul>
</nav>
</header>
		
<h1>Update a website</h1>
<br>
<br>
        
 			      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div> 

	
          <div class="formbg">
            <div class="content-padding">
              <p>Update a website information</p>
			  <form name="form" method = "POST" <?php echo "action='updateBackend.php?id=$wid'";?> enctype = "multipart/form-data" onsubmit="return validationRequestUpdate();">
                  <div class="field">
                  <label for="webName">Website name:</label>
                  <input type="text" name="Wname" required  <?php
                         if(isset($row['website_name']))
                           echo  "value ='".$row['website_name']."'"; 
                         ?>
                         >
                </div>
                <div class="field">
 
                      <label for="description">Description</label>
                  
                   <textarea name = "description" rows = "6" cols = "55" placeholder = "please put a description about the website" required><?php
                   if(isset($row['description'])) echo  $row['description']; ?></textarea>
                </div> 
                  
                 <div class="field">
                  <label for="brand">Provided brand:</label>
                  <input type="text" name="brand" required  <?php
                         if(isset($row['Brand']))
                           echo  "value ='".$row['Brand']."'"; 
                         ?>
                         >
                </div> 
                
				
               <div class="field">
                  <label for="attachment">Website image</label>
                  <input type="file" id = "image" name="image" onchange="validationImage()">
				  
                </div>
				
                <div class="field">
                  <input type="submit" name="submit" value="Update">
                </div>
				
              </form>
			  
			  
            </div>
			
          </div>
<div id="imagePreview">
    <?php
    if(isset($row['website_image']))
     echo"<script>document.getElementById('imagePreview').style.visibility='visible';</script>";

    ?>
      Uploaded image: <br> <br> 
      <img src=
          <?php
                           echo  "'upload/".$row['website_image']."'";
                           echo "alt='".$row['website_omage']."'"?>
           >
</div>
      <footer>
            <br>
            <div style="color: white;">
              All rights reserved for group 1 2022  
            </div> 
			<br>
        </footer>
        
      
</body>

</html>