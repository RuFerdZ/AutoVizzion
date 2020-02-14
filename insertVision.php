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

    $deviceType = $_POST['dType'];
    $frBrand = $_POST['fBrand'];
    $frModel = $_POST['fModel'];
    $lensSerialNb = $_POST['lSerial'];
    $lensVisionType = $_POST['lVision'];
    $lensTint = $_POST['lTint'];
    $lensThinnessLevel = $_POST['lThinness'];

    $query = "INSERT INTO w1714943_device(w1714943_deviceCatalogId,w1714943_deviceCatalogName,w1714943_deviceDescrip,w1714943_availabilityStatus)
    VALUES ($deviceCatalogId,'$deviceCatalogName','$deviceDescrip','$availabilityStatus');";

    if($deviceType=="1"){
        $query .="INSERT INTO w1714943_visual_device(w1714943_deviceCatalogId, w1714943_frBrand, w1714943_frModel, w1714943_frFlag) 
        VALUES ($deviceCatalogId,'$frBrand','$frModel',true);";
    }else if ($deviceType=="2"){
        $query .="INSERT INTO w1714943_visual_device(w1714943_deviceCatalogId, w1714943_lensSerialNb, w1714943_lensVisionType, w1714943_lensTint, w1714943_lensThinnessLevel, w1714943_LensFlag) 
        VALUES ($deviceCatalogId,'$lensSerialNb','$lensVisionType','$lensTint','$lensThinnessLevel',true);";
    }else if ($deviceType=="3"){
        $query .="INSERT INTO w1714943_visual_device(w1714943_deviceCatalogId, w1714943_frBrand, w1714943_frModel, w1714943_frFlag, w1714943_lensSerialNb, w1714943_lensVisionType, w1714943_lensTint, w1714943_lensThinnessLevel, w1714943_LensFlag) 
        VALUES ($deviceCatalogId,'$frBrand','$frModel',true,'$lensSerialNb','$lensVisionType','$lensTint','$lensThinnessLevel',true);";
    }else{
            echo "<script>alert('No Device Type Selected');
            location.replace('http://localhost/AutoVizzion/index.html');</script>";
    }
    

    if($connection->multi_query($query)===TRUE){
        echo "<script> alert('Device entered Successfully!');
        location.replace('http://localhost/AutoVizzion/index.html');</script>";
    }else{
        echo "Error in Entering record : ".$query."\n".$connection->error;
    }
    


    $connection->close();     

?>