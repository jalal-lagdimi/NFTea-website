<?php
    require("connect.php");
    $select = mysqli_query($conn,"SELECT *FROM nft");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>statistics</h1>
    <?php 
        $total = mysqli_query($conn,"SELECT COUNT(*) as ttl from nft");
        $plus = mysqli_query($conn,"SELECT  MAX(CAST(prix as int)) as c from nft");
        $pl = mysqli_fetch_assoc($plus);
        $minus = mysqli_query($conn,"SELECT  MIN(CAST(prix as int)) as c from nft");
        $mi = mysqli_fetch_assoc($minus);
        $numpl = $pl['c'];
        $nummi = $mi['c'];
        $p = mysqli_query($conn,"SELECT *FROM nft WHERE prix = $numpl ");
        $p2 = mysqli_query($conn,"SELECT *FROM nft WHERE prix = $nummi ");
        

        $data = mysqli_fetch_assoc($total);
        
        echo '<span class="statistics">' ."the total is".' '.$data['ttl'].'</span> <br> <br>';
        while($p1 = mysqli_fetch_assoc($p)){
            echo '<span class="statistics">' ."le plus cher est".' '.$p1['prix'].' '.$p1['nom'].' '.$p1['description'].' </span> <br> <br>';
        }
        while($p3 = mysqli_fetch_assoc($p2)){
            echo '<span class="statistics">' ."le moins cher est".' '.$p3['prix'].' '.$p3['nom'].' '.$p3['description'].' </span> <br> <br>';
        }
        
    ?>
</body>
</html>