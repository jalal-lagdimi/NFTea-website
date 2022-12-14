<?php

   include 'connect.php';


if (isset($_POST['add_nft'])) {

    $nft_name = $_POST['nft_name'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    if(isset($_POST['select_collection'])){
        $id_collection = $_POST['select_collection'];
    }
    $nft_image = $_FILES['nft_image']['name'];
    $nft_image_tmp_name = $_FILES['nft_image']['tmp_name'];
    $nft_image_folder = 'img/' . $nft_image;

    if (empty($nft_name) || empty($description) || empty($nft_image) || empty($id_collection) || empty($prix)) {
        $message[] = 'FILL OUT ALL';
    } else {
        $insert = "INSERT INTO nft (nom,description,prix,image,idcollection) VALUES ('$nft_name','$description','$prix','$nft_image','$id_collection')";
        $upload = mysqli_query($conn, $insert);
        if ($upload) {
            move_uploaded_file($nft_image_tmp_name, $nft_image_folder);
            $message[] = 'NEW NFT ADDED SUCCESSFULLY';
        } else {
            $message[] = 'NEW COLLECTION NOT ADDED';
        }
    }
};
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="./css/addnft.css" rel="stylesheet">
    <title>Form</title>
</head>

<body>
    <div class="allform">
        <?php
            if (isset($message)) {
                foreach ($message as $message) {
                    echo '<span class="message">' . $message . '</span>';
                }
            }
        ?>
        
        <form action="" method="POST" enctype="multipart/form-data" class="frm">
            <h1>ADD NEW NFT</h1>
            <input type="text" placeholder="Enter name" name="nft_name"> <br>
            <input type="text" placeholder="Enter description" name="description"> <br>
            <input type="number" placeholder="Price (Ethereum)" name="prix"> <br>
            <input type="file" accept="image/jpeg, image/png image/jpg" name="nft_image"> <br>
            <label>choose collection</label>
            <select name="select_collection">
                <?php

                        $sql = "SELECT * FROM `collection`";
                        $result = mysqli_query($conn, $sql);
                    foreach ($result as $row) {

                ?>
                        <option value="<?= $row['id'] ?>"> <?= $row['nom'] ?> </option>
                <?php
                    }
                ?>
            </select>
            <input class="btn" type="submit" name="add_nft" value="add nft">
            <a href="index.php">GO BACK</a>
        </form>
    </div>
</body>

</html>