<?php

include 'connect.php';
<<<<<<< HEAD
    $id = $_GET['id'];
    
    
=======
$id = $_GET['id'];
>>>>>>> 0f4592049ed0ad308aaef9b4bb2d7a20616b1b3e

if (isset($_POST['update_collection'])) {
    $collection_name = $_POST['collection_name'];
    $artiste_name = $_POST['artiste_name'];
    $collection_image = $_FILES['collection_image']['name'];
    $collection_image_tmp_name = $_FILES['collection_image']['tmp_name'];
    $collection_image_folder = 'img/' . $collection_image;

    if (empty($collection_name) || empty($artiste_name)){
        $message[] = 'FILL OUT ALL';
    }elseif(empty($collection_image)){
        $update ="UPDATE collection SET nom = '$collection_name', artiste = '$artiste_name' WHERE id = $id ;";
    }else{
        $update = "UPDATE collection SET nom = '$collection_name', artiste = '$artiste_name', image = '$collection_image' WHERE id=$id ;";
    }
    $upload = mysqli_query($conn, $update);
        if ($upload) {
            move_uploaded_file($collection_image_tmp_name, $collection_image_folder);
            $message[] = 'UPDATE SUCCESSFULLY';
            header('location: index.php');
            exit();
    }else{
            $message[] = 'UPDATE NOT ADDED';
    } 
    
};
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/addCL.css" rel="stylesheet">
</head>

<body>
    <div class="allform">
        <?php
            if (isset($message)) {
                foreach ($message as $message){
                    echo '<span class="message">' . $message . '</span>';
                }
            }
        ?>
        <?php
<<<<<<< HEAD
            $select = mysqli_query($conn, "SELECT * FROM collection WHERE id=$id");
            $row = mysqli_fetch_assoc($select);
            
=======
        $select = mysqli_query($conn, "SELECT * FROM collection WHERE id=$id");
        $row = mysqli_fetch_assoc($select);
>>>>>>> 0f4592049ed0ad308aaef9b4bb2d7a20616b1b3e
        ?>

        <form action="" method="POST" class="frm" enctype="multipart/form-data">
            <h1>UPDATE COLLECTION</h1>
<<<<<<< HEAD
            <input type="text" value="<?php echo $row['nom']; ?>" <?php $row['nom']; ?> name="collection_name"> <br>
            <input type="text" placeholder="enter new artiste name" value="<?php echo $row['artiste']; ?> <?php $row['artiste']; ?>" name="artiste_name"> <br>
            <input type="file"  accept="image/jpeg, image/png image/jpg" <?php $row['image']; ?> name="collection_image"> <br>           
            <input type="submit" class="btn" name="update_collection" value="update collection">
=======
            <input type="text" value="<?php echo $row['nom']?>"  <?php $row['nom']; ?> name="collection_name"> <br>
            <input type="text" value="<?php echo $row['artiste']?>"  <?php $row['artiste']; ?> name="artiste_name"> <br>
            <input type="file"  accept="image/jpeg, image/png image/jpg"  <?php $row['image']; ?> name="collection_image"> <br>
            <input type="submit" class="btn" name="update_collection" value="update collection">
            <a href="index.php">GO BACK</a> 
>>>>>>> 0f4592049ed0ad308aaef9b4bb2d7a20616b1b3e
        </form>
    </div>
</body>

</html>