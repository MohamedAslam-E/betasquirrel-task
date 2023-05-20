<?php
          $firstname="";
          $lastname="";
          $mobile="";
          $email="";
          $firstname_error = "";

          $db_server ="localhost";
          $db_user="root";
          $db_ps="";
          $db_name="schools";

         
        $conn = mysqli_connect( $db_server,$db_user,$db_ps,$db_name);
          
          if($conn){
            echo "you are connected";
          }else{
            echo" server busy";
          }
    ?>