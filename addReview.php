<?php
ini_set('display_errors', 1);
 $connection = mysqli_connect("localhost", "root", "root", "thecomfortzone");
 $error = mysqli_connect_error();
  
            if ($error != null) {
              echo "<p> connection failed </p>";
            }
            else {
                
                    $review = mysqli_real_escape_string($connection,$_POST['comment']);
                    $id= $_GET['id'];
                    $type= mysqli_real_escape_string($connection,$_POST['name']);
                    
                    //no image uploaded
                    if(!file_exists($_FILES['files']['tmp_name']) || !is_uploaded_file($_FILES['files']['tmp_name'])){    
                    $sql="INSERT INTO review (website_id, comment,title) VALUES ($id ,'$review','$type')";
                    } 
                    
                       // image uploaded 
                       else{
                        $reviewImage=$_FILES['files']['name'];
                        $sql ="INSERT INTO review (website_id, comment, title, image) VALUES ($id,'$review','$type','$reviewImage')";
                        move_uploaded_file($_FILES['files']['tmp_name'],'upload/'.$reviewImage);
                       
                       }
                    
                    
                   
                    
                    if (mysqli_query($connection, $sql)){
                      
                        echo '<script> alert("Your Review Has Been Posted Successfuly !!"); </script>';
                         
                        echo ('<script LANGUAGE="JavaScript"> location.href="item.php?id='.$id.'"; </script>');
                        exit();
                        
                    }
                    else {
                        echo mysqli_error($connection);
                        echo '<script> alert("Failed to add your review please try again !!");' ;
                        echo ('<script LANGUAGE="JavaScript"> location.href="item.php?id='.$id.'"; </script>');
                        exit();
                    }
                    
                    
                    
                    
                
                    
            


                
            }
?>

