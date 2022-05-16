<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
    text-align: center;
}
.adminlink{
font-size: 25px;
  float: right;
  width: 240px;
  padding: 10px;
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

.search {
  overflow: hidden;
  background-color: #333;
  font-family: Arial, Helvetica, sans-serif;
}

.search a {
  float: left;
  font-size: 16px;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

.dropdown {
  float: left;
  overflow: hidden;
}

.dropdown .dropbtn {
  font-size: 16px;  
  border: none;
  outline: none;
  color: white;
  padding: 14px 16px;
  background-color: inherit;
  font: inherit;
  margin: 0;
}

.search a:hover, .dropdown:hover .dropbtn {
  background-color: purple;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  width: 100%;
  left: 0;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}



.dropdown:hover .dropdown-content {
  display: block;
}

/* Create three equal columns that floats next to each other */
.column {
  float: left;
  width: 50%;
  padding: 10px;
  background-color: #ccc;
  height: 250px;
}

.column a {
  float: none;
  color: black;
  padding: 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.column a:hover {
  background-color: #ddd;
}

/* Clear floats after the columns */
.row:after {
  content: "";
  display: table;
  clear: both;
}

/* Responsive layout - makes the three columns stack on top of each other instead of next to each other */
@media screen and (max-width: 600px) {
  .column {
    width: 100%;
    height: auto;
  }
}
button {
  transition-duration: 0.4s;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 13px;
  background-color: white;
  color: black;
  border: 2px solid slateblue;
  border-radius: 12px;
  margin: auto;
  
}

button:hover {
  background-color: slateblue; 
  color: white;
  box-shadow: 0 12px 16px 0 rgba(0,0,0,0.24), 0 17px 50px 0 rgba(0,0,0,0.19);
}
.rightbuttons{
    float: right;
    margin-right: 2%;
}
</style>
</head>
<body>








      
  <header>


<nav>
<ul>
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png" alt="logo"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a class="active" href="index.php">Home</a></li>


</ul>
</nav>
</header>
    
<div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>  
        <main>
      
       
       
<div class="search">
    
    
  <div class="dropdown">
    <button class="dropbtn">Search <i class="fa fa-caret-down"></i></button>
    <div class="dropdown-content">
      <div class="row">
          
            <?php 
          $connection = mysqli_connect("localhost", "root", "root", "thecomfortzone");
        $error = mysqli_connect_error();
        if ($error != null) {
         echo "<p> connection fails </p>";
            }
            else {
             $sql="SELECT * from website"; 
             $result = mysqli_query($connection, $sql);
             $sbrand= [];
            
            while ($row = mysqli_fetch_assoc($result)) {   
             
             if (! in_array($row['Brand'], $sbrand))
             { 
             echo '<div class="column"> ';
            echo '<h3>'.$row['Brand'].'</h3>';
             $sbrand[]=$row['Brand'];        
             $sql2="SELECT * from website WHERE Brand='".$row['Brand']."'"; 
             $result2 = mysqli_query($connection, $sql2);       
             while ($row2 = mysqli_fetch_assoc($result2)) {
               echo '<a href="item.php?id='.$row2['id'].'"  >'.$row2['website_name'].'</a>'  ;   //************************************************************************************-->   
               
             }//end inner while
             
              echo '</div>';
             }//end if
             
             }//end outerwhile 
            
   ?>  
</div>
    </div>
  </div> 
   </div>
            
<br>
<button type="button" class="rightbuttons" onclick="window.location.href='login.php';">Admin</button>   
<br><br><br><br><br><br><br>

<div class = "container">
   <?php
   
    
             $sql3="SELECT * from website"; 
             $result3 = mysqli_query($connection, $sql3);
             
            while ($row3 = mysqli_fetch_assoc($result3)) {
            echo '<div class="gallery">';                
            echo '<a href="item.php?id='.$row3['id'].'"  >';// <!--************************************************************************************-->
            echo '<img src="upload/'.$row3['website_image'].'" alt="'.$row3['website_name'].'"></a>'  ;    
            echo '</div>';                
               
            }//end while
            }//end else
   ?>   
</div>



<br><br><br>
<footer>
         <br>   
            <div style="color: white;">
              All rights reserved for group 1 2022  
            </div> 
			<br>
        </footer>
</body>
</html>




