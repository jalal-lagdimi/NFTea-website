<?php
        include 'connect.php';
       
        $id =$_GET['id'];
        mysqli_query($conn,"DELETE FROM collection WHERE id = $id");
        header('Location:index.php');
       
?>