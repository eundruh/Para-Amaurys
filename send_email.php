<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos del formulario
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $subject = htmlspecialchars($_POST['subject']);
    $message = htmlspecialchars($_POST['message']);

    // Correo de destino
    $to = "amaurys18.z@gmail.com";
    $headers = "From: " . $email . "\r\n" .
               "Reply-To: " . $email . "\r\n" .
               "X-Mailer: PHP/" . phpversion();

    // Enviar correo
    if (mail($to, $subject, $message, $headers)) {
        echo "<script>
                alert('Mensaje enviado con éxito.');
                window.location.href = 'index.html'; // Cambia a la página principal si es necesario
              </script>";
    } else {
        echo "<script>
                alert('Error al enviar el mensaje. Inténtalo más tarde.');
                window.history.back();
              </script>";
    }
} else {
    echo "Acceso no permitido.";
}
?>
