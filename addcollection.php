
<?php 
@include 'connect.php';

if(isset($_POST['add_collection'])){

    $collection_name = $_POST['collection_name'];
    $artiste_name = $_POST['artiste_name'];
    $collection_image = $_FILES['collection_image']['name'];
    $collection_image_tmp_name = $_FILES['collection_image']['tmp_name'];
    $collection_image_folder = 'img/' .$collection_image;

    if(empty($collection_name) || empty($artiste_name) || empty($collection_image) ){
       $message[]= 'PLEASE FILL OUT ALL';
    } else{
        $insert = "INSERT INTO collection (nom,artiste,image) VALUES(' $collection_name','$artiste_name','$collection_image')";
        $upload = mysqli_query($conn,$insert);
        if($upload){
            move_uploaded_file( $collection_image_tmp_name, $collection_image_folder);
            $message[]= 'NEW COLLECTION ADDED SUCCESSFULLY';
        } else{
            $message[]= 'NEW COLLECTION NOT ADDED';
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
    <link rel="stylesheet" href="./css/addCL.css">
    <title>Form</title>
    
</head>
<body>
    <div class="allform">
    <?php 

    if(isset($message)){
        foreach($message as $message){
            echo '<span class="message">'.$message.'</span>';
        }
    }

    ?>
    
    <form action="<?php $_SERVER['PHP_SELF']?>" class="frm"
    method="POST" enctype="multipart/form-data">
    <h1>ADD NEW COLLECTION</h1>
    <input type="text" placeholder="Enter collection name" name="collection_name" > <br>
    <input type="text" placeholder="Enter artiste name" name="artiste_name" > <br>
    <input type="file" accept="image/jpeg, image/png image/jpg" name="collection_image" > <br>
    <input type="submit" class="btn" name="add_collection" value="add collection" >
    <a href="index.php">GO BACK</a>
</form>
</div>
</body>
</html>