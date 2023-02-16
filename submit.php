<?php

if (isset($_POST['submit'])) {
    // Obtener los datos del formulario mediante la variable POST
    $name = $_POST["name"];
    $surname = $_POST["surname"];
    $email = $_POST["email"];
    $tel = $_POST["tel"];
    $genre = $_POST["genre"];
    $status = $_POST["status"];
    $emailsend="miwebsite@trading.com";

    // Construir el mensaje de correo electrónico
    $to = "luis.manuel.rmtz@gmail.com"; // dirección de correo electrónico del destinatario
    $subject = "Nuevo formulario enviado desde el sitio web"; // asunto del correo electrónico
    $message = "Name: " . $name . "\n" .
        "Surnaame: " . $surname . "\n" .
        "Email: " . $email . "\n" .
        "Phone number: " . $tel . "\n" .
        "Gender: " . $genre . "\n" .
        "Employee Status: " . $status;

    // Enviar el correo electrónico
    $headers = "From: " . $email; // dirección de correo electrónico del remitente
     if (mail($emailsend, $subject, $message, $headers)) {
        header("Location: index.php?s=thanks");
        die();
    } else {
        echo "I'm sorry, there was an error sending your subscription later.";
        header("Location: index.php?e=problem");
        die();
    }
}
