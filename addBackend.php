<?php
session_start();
ini_set('display_errors', 1);
include 'connection.php';

function random_num($length)
{

	$text = "";
	if($length < 5)
	{
		$length = 5;
	}

	$len = rand(4,$length);

	for ($i=0; $i < $len; $i++) { 
		# code...

		$text .= rand(0,9);
	}

	return $text;
}

function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}

//end functions


if(empty($_POST['description']) || empty($_POST['Wname']) || empty($_POST['brand']) || !file_exists($_FILES['image']['tmp_name']) ){
    
   alert('please fill in all the form');
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='add.html';
    </script>");
    exit();
}
else
{
    $target_file =  basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  
   alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
   echo ("<script LANGUAGE='JavaScript'>
    window.location.href='add.html';
    </script>");
}  
}

$description = mysqli_real_escape_string($connection,$_POST['description']);;
$websiteName = mysqli_real_escape_string($connection,$_POST['Wname']);
$brand = mysqli_real_escape_string($connection,$_POST['brand']);
$websiteImage= $_FILES['image']['name'];
$admin_id=$_SESSION['id'];
$webId= random_num(6);

      $sqlcheck="SELECT id FROM website WHERE website_name='$websiteName'";

if($result=mysqli_query($connection,$sqlcheck)){
    $row = mysqli_num_rows($result);
    if($row){
     alert('website name already exist');
   echo ("<script LANGUAGE='JavaScript'>
    window.location.href='add.html';
    </script>");
   exit();
}  

    }


$sql ="INSERT INTO website (id,website_name ,description,website_image,Brand, admin_id) VALUES ($webId,'$websiteName','$description','$websiteImage','$brand',$admin_id )";   

if(mysqli_query($connection, $sql)){
 
    move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$websiteImage);

    alert('The website is added');
    
       echo ("<script LANGUAGE='JavaScript'>
    window.location.href='adminHome.php';
    </script>");
       exit();
} 
 
else{
    alert('The website has not been added succesfully');
      echo ("<script LANGUAGE='JavaScript'>
    window.location.href='add.html';
    </script>");
      exit();
} 

