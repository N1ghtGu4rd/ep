<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Funciones para limpiar y validar datos
    function limpiarDatos($dato) {
        $dato = trim($dato);
        $dato = stripslashes($dato);
        $dato = htmlspecialchars($dato);
        return $dato;
    }

    // Limpiar y validar datos del formulario
    $nombre = limpiarDatos($_POST["nombre"]);
    $email = limpiarDatos($_POST["email"]);
    $mensaje = limpiarDatos($_POST["mensaje"]);

    // Validar el correo electrónico
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Correo electrónico no válido";
        exit();
    }

    // Configurar el destinatario
    $destinatario = "info.roberto.fitness@gmail.com";

    // Asunto del correo
    $asunto = "Nuevo mensaje de contacto de $nombre";

    // Construir el cuerpo del correo
    $cuerpo = "Nombre: $nombre\n";
    $cuerpo .= "Correo electrónico: $email\n";
    $cuerpo .= "Mensaje:\n$mensaje";

    // Encabezados adicionales
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";

    // Enviar el correo electrónico
    mail($destinatario, $asunto, $cuerpo, $headers);

    // Redirigir a una página de confirmación
    header("Location: confirmacion.html");
    exit();
}
?>
