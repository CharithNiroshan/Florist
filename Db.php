<?php
    try
    {
        $conn=new PDO("mysql:host=localhost;dbname=blob tutorial","root","");
    }
    catch(PDOException $err)
    {
        echo "Error While Connecting to database.".$err;
    }
    

?>