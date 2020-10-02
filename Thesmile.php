<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/thesmile.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <?php
        require_once "Db.php";
        if(isset($_REQUEST['id']))
        {
            $id=$_REQUEST['id'];
            $sql="SELECT * FROM images WHERE Id=".$id;
            $stmt=$conn->prepare($sql);
            $stmt->execute();
            $result=$stmt->fetchAll();
        }
    ?>
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
        <div class="grid">
            <div class="grid-item" id='one'>
                <?php
                    foreach($result as $row)
                    {
                        echo "<img src='data:".$row['imageType'].";base64,".base64_encode($row['imageData'])."'>";
                    }
                ?>
            </div>
            <div class="grid-item" id='two'>
                <?php
                        foreach($result as $row)
                        {
                            echo "<h1>".$row['Name']."</h1>";
                            echo    "<p>"
                                        .$row['Description'].
                                    "</p>";
                        }
                ?>
                <p>
                    <i class="fa fa-info-circle"></i>Seasonal Flowers or Plants may be changed if unavailable. However, we will try to stick to the type of the
                    chosen flowers as much as possible. The vase is not included. The picture usually referring the "Deluxe"
                    arrangement.
                </p>
            </div>
            <div class="grid-item" id='three'>
                <h4>
                    Price (delivery included)
                </h4>
                <div class="content">
                    <div class="price" id="price1">
                        <span class="detail">
                            <input type="radio" name="choice" id="">
                            <?php
                                foreach($result as $row)
                                {
                                    echo "<label for='standard'> Standard ".$row['Price']."  &#128;</label>";
                                }
                            ?>
                        </span>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="price" id="price2">
                        <span class="detail">
                            <input type="radio" name="choice" id="">
                            <?php
                                foreach($result as $row)
                                {
                                    echo "<label for='standard'> Standard ".$row['Price']."  &#128;</label>";
                                }
                            ?>
                        </span>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <div class="price" id="price3">
                        <span class="detail">
                            <input type="radio" name="choice" id="">
                            <?php
                                foreach($result as $row)
                                {
                                    echo "<label for='standard'> Standard ".$row['Price']."  &#128;</label>";
                                }
                            ?>
                        </span>
                        <i class="fa fa-info-circle"></i>
                    </div>
                    <br><br>
                    <span id="total">Total : 78.90 &#128; (delivery included)</span>
                    <br><br>
                    <span>The Smile 78.90 &#128;</span>
                </div>
            </div>
            <div class="grid-item" id='four'>
                <form action="">
                    <label for="deliverydate">Delivery date *</label>
                    <input type="date" name="deliverydate" id="date" required>
                    <br><br>
                    <div class="time">
                        <label for="Delivery time">Delivery Time </label>
                        <span class="radiogroup" >
                            <input type="radio" name="Delivery time" id="weekday">
                            <span id="timelabel"> Working Day - Free(9 a.m - 9 p.m) <i class="fa fa-info-circle"></i> </span>
                            <br><br>
                            <input type="radio" name="Delivery time" id="weekend">
                            <span id="timelabel"> Sunday and Public Holidays 4.00 &#128;  <i class="fa fa-info-circle"></i> </span>
                        </span>
                    </div>
                    <br>
                    <label for="quantity">Quantity*</label>
                    <input type="number" name="quantity" required>
                    <br><br>
                    <label for="message" id="label">Message</label>
                    <input type="text" name="message" maxlength="250" id="message">
                    <h5 >250 Characters Remaining</h5>
                    <br><br>
                    <label for="signature" id="label">Signature</label>
                    <input type="signature" name="signature">
                    <h5>If the message is not signed.it will be delivered anonymously.</h5>
                    <br><br>
                    <button type="submit">Continue >></button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>