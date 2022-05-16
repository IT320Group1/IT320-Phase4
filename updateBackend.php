<?php
include 'connection.php';


function alert($msg) {
    echo "<script type='text/javascript'>alert('$msg');</script>";
}
//end functions

if(isset($_GET['id'])){
$wid = $_GET['id'];

}


if(empty($_POST['description']) || empty($_POST['Wname']) || empty($_POST['brand'])){
    
   alert('please fill in all the form');
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='update.php?id=$wid';
    </script>");
    exit();
}
else
    if(!empty($_POST['description']) && !empty($_POST['Wname']) && !empty($_POST['brand'])){
    $description = mysqli_real_escape_string($connection,$_POST['description']);
    $Wname = mysqli_real_escape_string($connection,$_POST['Wname']);
    $brand = mysqli_real_escape_string($connection,$_POST['brand']);
    
     $sql = "UPDATE website SET website_name='$Wname',description='$description', Brand='$brand' WHERE id=$wid";
    
      $sqlcheck="SELECT id FROM website WHERE website_name='$Wname'";

if($result= mysqli_query($connection,$sqlcheck)){
    $row = mysqli_fetch_assoc($result);
    if($row['id'] != $wid && !empty($row['id'])){
     alert('website name already exist');
   echo ("<script LANGUAGE='JavaScript'>
    window.location.href='update.php?id=$wid';
    </script>");
   exit();
    }
} 
   
    
    
    $ifFileUp = false;
    
//if user didnt want to change the file in the server bail files
if(!file_exists($_FILES['image']['tmp_name']) || !is_uploaded_file($_FILES['image']['tmp_name'])){ 
    $ifFileUp = true;
}
// user uploaded files, need updating
else
{
    $target_file =  basename($_FILES["image"]["name"]);
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  
   alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');
   echo ("<script LANGUAGE='JavaScript'>
    window.location.href='update.php?id=$wid';
    </script>");
   exit();
}  
        
        $filename = $_FILES['image']['name'];
       
        $sql3 = "UPDATE website SET website_image='$filename' WHERE id='$wid'";
         if(mysqli_query($connection,$sql3)){
                   $ifFileUp = true;      
        }
       
                   move_uploaded_file($_FILES['image']['tmp_name'],'upload/'.$filename);

        }
    
   
   
   
    if(mysqli_query($connection,$sql) && $ifFileUp){
        echo $ifFileUp;
     alert('The website is updated');
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='adminItem.php?id=$wid';
    </script>");
    exit();
    }
    else{
    alert('updating the website failed!');
    echo ("<script LANGUAGE='JavaScript'>
    window.location.href='update.php?id=$wid';
    </script>");
    exit();
    }
    }

  

?>

