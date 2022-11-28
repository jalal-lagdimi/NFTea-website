
<?php
        include 'connect.php';
        $idcoll =$_GET['idcoll'];
        $id =$_GET['id'];
        mysqli_query($conn,"DELETE FROM nft WHERE id = $id");
        header('Location:NFTs.php?id='.$idcoll);
?>