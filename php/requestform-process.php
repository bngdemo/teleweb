<?php

$errorMSG = "";

// NAME
if (empty($_POST["rname"])) {
    $errorMSG = "Name is required ";
} else {
    $name = $_POST["rname"];
}

// EMAIL
if (empty($_POST["remail"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = $_POST["remail"];
}

// PHONE
if (empty($_POST["rphone"])) {
    $errorMSG .= "Phone is required ";
} else {
    $phone = $_POST["rphone"];
}

// INTEREST
if (empty($_POST["rselect"])) {
    $errorMSG .= "Interest is required ";
} else {
    $interest = $_POST["rselect"];
}

// Agreement
$agree = $_POST["rterms"];

//REPLACE YOUR EMAIL ADDRESS HERE
$EmailTo = "info@telecubes.com";
$Subject = "New Request Received";

// prepare email body text
$Body = "";
$Body .= "Name: ";
$Body .= $name;
$Body .= "\n";
$Body .= "Email: ";
$Body .= $email;
$Body .= "\n";
$Body .= "Phone: ";
$Body .= $phone;
$Body .= "\n";
$Body .= "Interested In: ";
$Body .= $interest;
$Body .= "\n";
$Body .= "Agreement: ";
$Body .= $agree;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$email);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "Request Sent :)";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>