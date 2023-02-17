<?php

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $genre = $_POST["genre"];
    $status = $_POST["status"];
    $country = $_POST["country"];
    $problems = validateForm($name, $surname, $email, $tel, $genre, $status,$country);
    if (empty($problems)) {
        $emailsend = "luis.rmtz@cactusgroup.mx";//Direccion de remitente se aconseja usar un correo correspondiente al dominio utilizado para evitar rechazos en server de correo
        $to = "ryd@idisk.com.mx"; //poner direccion de envio 
        $subject = "New subscription on the website $name $surname";
        $message = "Name: " . $name . "\n" .
            "Surname: " . $surname . "\n" .
            "Email: " . $email . "\n" .
            "Phone number: " . $tel . "\n" .
            "Gender: " . $genre . "\n" .
            "Country: " . $country . "\n" .
            "Employee Status: " . $status;

        $headers = "From: " . $emailsend;
        if (mail($to, $subject, $message, $headers)) {
            header("Location: index.php?s=thanks");
            die();
        } else {
            header("Location: index.php?e=problem");
            die();
        }
    } else {
        $problems_prepare = base64_encode($problems);
        header("Location: index.php?v=$problems_prepare");
        die();
    }
}


function validateForm($name, $surname, $email, $tel, $genre, $status,$country)
{
    $errors = array();

    if (empty($name) || empty($surname)) {
        $errors[] = "Please enter your name and surname.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Please enter a valid email address.";
    }

    if (!preg_match('/^\d{10}$/', $tel)) {
        $errors[] = "Please enter a 10-digit phone number.";
    }

    if (empty($genre) || empty($status)) {
        $errors[] = "Please select an option for gender and employee status.";
    }

    if (empty($country)) {
        $errors[] = "Please select an option for country.";
    }
    
    if (count($errors) > 0) {
        $errorList = "<ul>";
        foreach ($errors as $error) {
            $errorList .= "<li>$error</li>";
        }
        $errorList .= "</ul>";
        return $errorList;
    } else {
        return "";
    }
}
