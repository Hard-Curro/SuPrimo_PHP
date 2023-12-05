<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../model/css/style.css">

    <title>Document</title>
</head>

<body>
    <div class="credenciales">
        <form class="formularios_credenciales" action="../controller/RegisterController.php" method="post">
            <p>Usuario</p>
            <input type="text" name="username">
            <p>Correo</p>
            <input class="imp_espaciado" type="email" name="email">
            <p>Contraseña</p>
            <input class="imp_espaciado" type="password" name="password">
            <p>Descripción</p>
            <input class="imp_espaciado" type="text" name="address">
            <p>Phone</p>
            <input class="imp_espaciado" type="text" name="phone">
            <p>Piso</p>
            <input class="imp_espaciado" type="text" name="floor">
            <input class="botones" id="centrar_boton2" type="submit" value="Registrarse">
        </form>
        <p id="quest">Do you already have an account?<a href="../controller/LoginController.php"
                class="botones"><strong>Log in</strong></a></p>
    </div>

</body>

</html>