<?php
  
 $connection = mysqli_connect("localhost", "root", "root", "thecomfortzone");
  $error = mysqli_connect_error();
  
            if ($error != null) {
              echo "<p> connection failed </p>";
            }
            else {
               $id = $_GET['id'];
               $sql="select * from website where id =$id";
               $query= mysqli_query($connection, $sql);
               $row = mysqli_fetch_assoc($query);

?>
<?php
//session_start();
include 'config.php';
include("functions.php");

error_reporting(0); // For not showing any error


 
 
?>




<html>
    <head>
        <title>item page</title>
        <link rel="stylesheet" href="item.css">
        <script src="itemvalidate.js"></script>
        <meta charset="UTF-8">
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
<li class="logo"><img src="THE_COMFORT_ZONE-resize.png" alt="logo"></li>
<li><a href="#news" style=" font-weight: 900;"><pre>THE COMFORT ZONE    </pre></a></li>
 <li class = 'link'><a href="index.php">Home ></a></li>
 <li class = 'link'><a class="active" <?php echo "href='item.php?id=$id'";?> >Item</a></li>

</ul>
</nav>
</header>
     			      <div class="bg"></div>
<div class="bg bg2"></div>
<div class="bg bg3"></div>  
            
        <main>
            
            
           
            <h1><?php echo $row['website_name']; ?></h1>
            <?php echo '<img src="upload/'.$row["website_image"].'" alt="websitelogo" id="websitelogo">'; ?> 
            <p> <?php echo $row['description']; ?></p>
            
            
          
            
        
        
            
            
                      
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
			  $sql = "select * from review where website_id = $id ";
			$result = mysqli_query($conn, $sql);
			if (mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {

			?>
			<div class="single-item">
				<h4><?php echo $row['title']; ?></h4>
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
                       
                        <?php echo '<form class="form" name="reviewForm" action= "addReview.php?id='.$id.'" method = "POST"   enctype="multipart/form-data" onsubmit="return validateForm();">'; ?>
			<div class="rw">
				<div class="input-group">
					<label for="name">Title</label>
					<input type="text" name="name" id="name" placeholder="Please write the title of the review" required>
				</div>

			</div>
			<div class="input-group textarea">
				<label for="comment">Review</label>
				<textarea id="comment" name="comment" placeholder="Enter your review" required></textarea>
			</div>
                          
                    <div class="input-group">
                     <label for="attachment">Photo</label>
                    <input type="file" id = "img" name="files" multiple onchange ="validationImage()">	  
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

<?php
            }
?>