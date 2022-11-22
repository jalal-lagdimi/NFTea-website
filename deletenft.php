
<?php
        include_once 'connect.php';
        $idcoll =$_GET['idcoll'];
        $id =$_GET['id'];
        $select=mysqli_query($conn,"DELETE FROM nft WHERE id = $id");
        header('Location:NFTs.php?id='.$idcoll);
       
?>