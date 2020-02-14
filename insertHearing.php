<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $database = "w1714943";

    $connection = new mysqli($host,$username,$password,$database);

    if($connection->connect_error)
    {
        die("Cannot connect to Database: ".mysql_error());
    }


    $deviceCatalogId = $_POST['cID'];
    $deviceCatalogName = $_POST['cName'];
    $deviceDescrip = $_POST['cDescription'];
    $availabilityStatus = $_POST['aStatus'];

    $hdMake = $_POST['make'];
    $hdModel = $_POST['model'];

    $query = "INSERT INTO w1714943_device(w1714943_deviceCatalogId,w1714943_deviceCatalogName,w1714943_deviceDescrip,w1714943_availabilityStatus)
    VALUES ($deviceCatalogId,'$deviceCatalogName','$deviceDescrip','$availabilityStatus');";


    $query .= "INSERT INTO w1714943_hearing_device(w1714943_deviceCatalogId,w1714943_hdMake,w1714943_hdModel)
    VALUES ($deviceCatalogId,'$hdMake','$hdModel')";

    if($connection->multi_query($query)===TRUE){
        echo "<script> alert('Device entered Successfully!');
        location.replace('http://localhost/AutoVizzion/index.html');</script>";
    }else{
        echo "Error in Entering record : ".$query."\n".$connection->error;
    }
    

    $connection->close();
?>