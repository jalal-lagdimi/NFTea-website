<?php
<<<<<<< HEAD
 include_once 'connect.php';
 $id =$_GET['id'];
 mysqli_query($conn,"DELETE FROM collection WHERE id = $id");
 header('Location:index.php');
=======
        include 'connect.php';
       
        $id =$_GET['id'];
        mysqli_query($conn,"DELETE FROM collection WHERE id = $id");
        header('Location:index.php');
       
>>>>>>> 0f4592049ed0ad308aaef9b4bb2d7a20616b1b3e
?>