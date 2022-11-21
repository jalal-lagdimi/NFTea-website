<?php
require("connect.php");
$select = mysqli_query($conn, "SELECT *FROM nft");
?>

<?php
$total = mysqli_query($conn, "SELECT COUNT(*) as total from nft");

$max = "SELECT * FROM nft WHERE prix in (SELECT MAX(prix) FROM nft)";
$maxnft = mysqli_query($conn, $max);

$min = "SELECT * FROM nft WHERE prix in (SELECT MIN(prix) FROM nft)";
$minnft = mysqli_query($conn, $min);

$data = mysqli_fetch_assoc($total);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NFTea</title>

    <link rel="stylesheet" href="./css/statistic.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

</head>

<body>
    <!--header--->
    <header>
        <a href="index.php" class="logo"><img src="./img/LOGO" alt="logo"></a>
        <ul class="NAVBAR">
            <i class="bi bi-x-circle clo-ico" id="close"></i>
            <li> <a href="index.php">HOME</a> </li>
            <li> <a href="index.php">COLLECTION</a> </li>
            <li> <a href="statistic.php">STATISTICS</a> </li>
        </ul>
        <i class="bi bi-list resp-ico" id="open"></i>

    </header>


    <section class="stc-num">
        <h3>NFT STATISTICS</h3>
    </section>

    <div class="container-nft-num">
        <div class="nfts-num">
            <p>NFTS NUMBER</p>
            <?php
            echo '<span>' . $data['total'] . '</span>';
            ?>
        </div>
    </div>



    <section class="nft-stc">
        <?php
        while ($p = mysqli_fetch_assoc($maxnft)) {
        ?>

            <div class="box-nftg">
                <div class="nftg">MOST EXPENSIVE NFT</div>
                <div class="nft-g">
                    <img src="img/crystal1.jpg" alt="image">
                    <h3> NAME : <?= $p['nom'] ?></h3>
                    <h4>PRICE : <?= $p['prix'] ?> Ethereum</h4>
                </div>

            <?php }; ?>
            </div>
            <?php
            while ($p2 = mysqli_fetch_assoc($minnft)) {
            ?>

                <div class="box-nftg">
                    <div class="nfts">CHEAPEST NFT</div>
                    <div class="nft-s">
                        <img src="img/crystal2.jpg" alt="image">
                        <h3> NAME : <?= $p2['nom'] ?></h3>
                        <h4>PRICE : <?= $p2['prix'] ?> Ethereum</h4>
                    </div>
                <?php }; ?>
                </div>
    </section>


    <!-- foooter -->
    <footer>
        <section class="footer">
            <div class="footer-content">
                <div>
                    <H3>NFTea</H3>
                    <p>Lorem ipsum dolor sit amet adipisicing elit. <br> Lorem ipsum dolor sit amet adipisicing. <br> Aliquam sapiente ipsum suscipit <br> Sequi dicta.</p>
                </div>
                <div>
                    <h3>Navigation</h3>
                    <ul>
                        <li>Home</li>
                        <li>Collection</li>
                        <li>Statistics</li>
                    </ul>
                </div>
                <div>
                    <h3>Quick link</h3>
                    <ul>
                        <li>Facebook</li>
                        <li>Instagram</li>
                        <li>Twitter</li>
                    </ul>
                </div>
                <div>
                    <img src="./img/footer-img.jpg" alt="">
                </div>
            </div>
            <div class="copyright">
                <p>© Copyright 2022 Desgined. All Rights Reserved.</p>
            </div>
        </section>
    </footer>
    <script src="logic.js"></script>
</body>

</html>

</footer>
</body>

</html>