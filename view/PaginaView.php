<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../model/css/style.css">
    <title>Document</title>
</head>

<body>
    <div class="header">
        <div id="logo">SuPrimo</div>
        <nav>
            <a href="../index.php">Home</a>
            <a href="../controller/AboutusController.php">About Us</a>
            <?php if (isset($_SESSION["usuario"])): ?>
                <a href="../controller/MyprofileController.php">My Profile</a>
                <a href="../model/LogoutDAO.php">Logout</a>
            <?php elseif (!isset($_SESSION["usuario"])): ?>
                <a href="../controller/LoginController.php">Login</a>
                <a href="../controller/RegisterController.php">Register</a>
            <?php endif; ?>

        </nav>
        <a href="../view/CardView.php">
            <img src="../view/assets/cart.png" alt="Descripción de la imagen">
        </a>
    </div>

    <div id="center">
        <nav id="sidebar">
            <div>
                <a href="../index.php">Products</a>
                <ul>
                    <li><a href="/controller/CategoryController.php?category=1">Computer Parts</a></li>
                    <li><a href="/controller/CategoryController.php?category=2">Peripherals</a></li>
                    <li><a href="/controller/CategoryController.php?category=3">Keys</a></li>
                </ul>
                <a href="/controller/ServiciosController.php">Services</a>
            </div>
            <div>
                <form action="" method="get">
                    <label for="orderBy">Sort by:</label>
                    <select name="orderBy" id="orderBy">
                        <option value="pro_name">Name</option>
                        <option value="price">Price</option>
                    </select>

                    <label for="orderDirection">Order direction:</label>
                    <select name="orderDirection" id="orderDirection">
                        <option value="ASC">Upward</option>
                        <option value="DESC">Falling</option>
                    </select>

                    <button type="submit">Apply order</button>
                </form>
            </div>
        </nav>

        <div id="content">
            <?php foreach ($resultado as $producto): ?>

                <div id="caja">
                    <img src="data:image/jpeg;base64,<?= $producto->fotos; ?>" alt="image">
                    <h3>
                        <?= $producto->nombre; ?>
                    </h3>
                    <p>
                        <?= $producto->descripcion; ?>
                    </p>
                    <h3>
                        <?= $producto->precio; ?>
                    </h3>

                    <a href="../controller/AddCard.php?id=<?= $producto->id ?>&type=<?= $producto->type ?>">ADD TO CART</a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
    <div id="centrar-contacto">
        <h1>Cantact</h1>
        <form action="../model/Enviar_correoDAO.php" method="post">
            <label for="nombre">Name:</label>
            <input type="text" id="nombre" name="nombre" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="mensaje">Message:</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>

            <button type="submit">Send</button>
        </form>
    </div>
</body>

</html>