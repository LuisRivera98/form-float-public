<?php

if (isset($_POST['submit'])) {
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $genre = $_POST["genre"];
    $status = $_POST["status"];
    $problems = validateForm($name, $surname, $email, $tel, $genre, $status);
    if (empty($problems)) {
        $emailsend = "miwebsite@trading.com";
        $to = "ryd@idisk.com.mx"; //poner direccion de envio 
        $subject = "Nuevo formulario enviado desde el sitio web";
        $message = "Name: " . $name . "\n" .
            "Surname: " . $surname . "\n" .
            "Email: " . $email . "\n" .
            "Phone number: " . $tel . "\n" .
            "Gender: " . $genre . "\n" .
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


function validateForm($name, $surname, $email, $tel, $genre, $status)
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
