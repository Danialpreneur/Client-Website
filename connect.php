<?php
    $fName = $_POST['fName'];
    $lName = $_POST['lName'];
    $city = $_POST['city'];
    $postal = $_POST['postal'];
    $phoneNumber = $_POST['phoneNumber'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];
    $payment = $_POST['payment'];

    //Database connection through php myadmin
    $connection = new mysqli('localhost','root','','example');   //name is localhost, root, password is default blank, example is name of database
    if($connection->connect_error){
        die('Connection Failed : ' .$connection->connect_error);
    }
    else{
        $stmt = $connection->prepare("insert into contact us(fName, lName, city, postal, phoneNumber, email, pass, payment)  //prepare statement
        values(?, ?, ?, ?, ?, ?, ?, ?)");   //inserting to database query
        $stmt->bind_param("ssssisss", $fName, $lName, $city, $postal, $phoneNumber, $email, $pass, $payment);   //Binding into values, s represents string i represents int
        $stmt->execute();
        echo "Contact us successful....";
        $stmt->close();   
        $connection->close();    //Closed connection and prepare statement
    }
?>