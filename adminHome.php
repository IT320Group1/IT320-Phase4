<?php
session_start();
if (!isset($_SESSION['id']))
	header('Location:index.php');
?>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="item.css">

  <link rel="stylesheet"  href="addUpdate.css">
<style>
#logo {
    width:200px;
    hieght:1200px;
}
hr{
   border-top: 2.5px solid slateblue;
}
footer {
    
	position:absolute;
}


.container
{
    display: flex;
  justify-content: center;
}
div.gallery {
  margin: 5px;
  border: 1px solid #ccc;
  float: left;
  width: 15%;
  display:inline-block;
}

div.gallery:hover {
  border: 1px solid #777;
}

div.gallery img {
  width: 100%;
  height: auto;
}

div.desc {
  padding: 15px;
  text-align: center;
}

* {
  box-sizing: border-box;
}

body {
  margin: 0;
}


</style>
</head>
<body>

<header>


<nav>
<ul>
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png" alt="logo"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a class="active" href="adminHome.php">Home</a></li>
 <li class='logout'><button type="button" class="logoubutton" onclick="window.location.href='signOut.php'">Log-out</button></li>



</ul>
</nav>
</header>


 			      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>
  <br>
<br>
<br>
<div class='centerButton'>
<button type="button" class="rightbuttons" onclick="window.location.href='add.html';">+ Add</button>      
				  </div>
				  
				  <br><br><br>
        <main>

<div class = "container">
  <?php
    $connection = mysqli_connect("localhost", "root", "root", "thecomfortzone");
        $error = mysqli_connect_error();
        if ($error != null) {
         echo "<p> connection fails </p>";
            }
            else {
    
             $sql3="SELECT * from website"; 
             $result3 = mysqli_query($connection, $sql3);
             
            while ($row3 = mysqli_fetch_assoc($result3)) {
            echo '<div class="gallery">';                
            echo '<a href="adminItem.php?id='.$row3['id'].'"  >';// <!--************************************************************************************-->
            echo '<img src="upload/'.$row3['website_image'].'" alt="'.$row3['website_name'].'"></a>'  ;    
            echo '</div>';                
               
            }//end while
            }//end else
   ?>  
</div>

<br>
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






