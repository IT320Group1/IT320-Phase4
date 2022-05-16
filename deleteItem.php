<?php
  $connection = mysqli_connect("localhost", "root", "root", "thecomfortzone");
  $error = mysqli_connect_error();
  
            if ($error != null) {
              echo "<p> connection failed </p>";
            }
            else {
             $id = $_GET['id'];
            
             $sql= "delete from website where id = $id"; 
          
             
              if (mysqli_query($connection, $sql) ){
                  echo '<script> alert("Item deleted successfuly!"); window.location.href="adminHome.php";  </script>';
              } 
              else {
                  echo '<script> alert("Cant delete item please try again!"); window.location.href="adminItem.php?id='.$id.'";  </script>'; 
              }
              
            }
            
 

?>