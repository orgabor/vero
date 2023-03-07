<?php

$errorMSG = "";

// NAME
if (empty($_POST["name"])) {
    $errorMSG = "Name is required ";
} else {
    $name = filter_var($_POST["name"], FILTER_SANITIZE_SPECIAL_CHARS);
}

// EMAIL
if (empty($_POST["email"])) {
    $errorMSG .= "Email is required ";
} else {
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
}
//Phone
if (empty($_POST["phone"])) {
    $errorMSG .= "Phone is required ";
} else {
    $phone = filter_var($_POST["phone"], FILTER_SANITIZE_NUMBER_FLOAT);
}
// Address
if (empty($_POST["address"])) {
    $errorMSG .= "Address is required ";
} else {
    $message = filter_var($_POST["address"], FILTER_SANITIZE_SPECIAL_CHARS);
}


// MESSAGE
if (empty($_POST["message"])) {
    $errorMSG .= "Message is required ";
} else {
    $message = filter_var($_POST["message"], FILTER_SANITIZE_SPECIAL_CHARS);
}


$EmailTo = "office@orgabor.com";
$Subject = "New Message Received";

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
$Body .= "Address: ";
$Body .= $address;
$Body .= "\n";
$Body .= "Message: ";
$Body .= $message;
$Body .= "\n";

// send email
$success = mail($EmailTo, $Subject, $Body, "From:".$EmailTo);

// redirect to success page
if ($success && $errorMSG == ""){
   echo "success";
}else{
    if($errorMSG == ""){
        echo "Something went wrong :(";
    } else {
        echo $errorMSG;
    }
}

?>