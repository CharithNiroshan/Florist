<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/homepage.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="logo">
            <img src="images/logo-small.png" alt="" >
        </div>
        <ul class="navlinks">
            <li>
                <a href="Homepage.php"><i class="fa fa-home"></i>Home</a>
            </li>
            <li>
                <a href="Contactus.php"><i class="fa fa-envelope-o"></i>Contact Us</a>
            </li>
            <li>
                <a href=""><i class="fa fa-archive"></i>The Florist</a>
            </li>
            <li>
                <a href=""><i class="fa fa-camera"></i>Gallery</a>
            </li>
            <li>
                <a href=""><i class="fa fa-cogs"></i>How to Order</a>
            </li>
            <li>
                <a href=""><i class="fa fa-phone"></i>Order By Phone</a>
            </li>
            <li>
                <a href=""><i class="fa fa-commenting-o"></i>Chat</a>
            </li>
        </ul>
    </header>
    <div class="wrapper">
        <section class="two">
            <h1>Malshan Flora your online Florist to deliver Flowers in Kotikawatta</h1>
            <div class="imagesection"> 
                <div class="image" id="image1">
                    <img src="images/euroflora-florist-flower-bouquet.jpg" alt="" height="250px" width="100%">
                    <div class="text" id="text1">
                        <h3>SEPTEMBER OFFERS: TODAY -15%</h3>
                        <hr>
                        <h4>Delivery service included</h4>
                    </div>
                </div>
                <div class="image" id="image2">
                    <img src="images/Cheyanne.jpg" alt="" height="250px" width="100%">
                    <div class="text" id="text2">
                        <h3>Roses and mixed flowers from 78.80 €</h3>
                    </div>
                </div>
            </div>
        </section>
        <section class="four">
            <h3>We offer a same day Flowers and Plants delivery service in Kotikawatta even in a few hours.
            From our online Flower shop can order nice Bouquets and Flowers Gifts quickly and easily.
            Choose your Bouquet from 68 € delivery included. Payments accepted: Credit Card and Paypal.
            </h3>
        </section>
        <?php
            include "Db.php";
            if(isset($_REQUEST['page']))
            {
                $page=$_REQUEST['page'];
                $offset=($page-1)*4;
                $sql="SELECT * FROM images LIMIT 4 OFFSET ".$offset;
            }
            else
            {
                $sql="SELECT * FROM images LIMIT 4";
            }
            
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll();
            $count=1;
            echo "<section class='five'>";
            foreach($result as $row)
            {
                echo "<a href='Thesmile.php?id=".$row['Id'].";'><div class='product' id='product".$count."'>";
                echo "<img src='data:".$row['imageType'].";base64,".base64_encode($row['imageData'])."'>";
                echo "<h4>".$row['Name']."</h4>";
                echo "<p>".$row['Description']."</p>";
                echo "<span><i class='fa fa-info-circle'></i><p> From".$row['Price']." &#128;</p></span>";
                echo "</div></a>";
                $count++;
            }
            echo "<br>";
            echo "<ul style='list-style:none;margin:0 auto;width:200px'> ";
            foreach(range(1,4) as $number)
            {
                echo "<li style='border:2px solid black;display:inline-block;width:32px;height:26px;padding:8px 0px 2px 0px;text-align:center;margin:0px 5px;'><a href=Homepage.php?page=".$number." style='text-decoration:none;color:black;'>$number</a></li>";
            }
            echo "</ul>"; 
        ?>
    </div>
</body>
</html>
<a href=""></a>