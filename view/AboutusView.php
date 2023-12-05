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
        <svg id="cart-icon" viewBox="0 0 24 24">
            <path d="M20 4H6a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V5a1 1 0 0 0-1-1zm-1 12H7V6h12v10z" />
        </svg>
    </div>
    <div id="textaco">
        <div>
            <p><strong>
                    <h1>
                        Welcome to SuPrimo – your go-to destination for Computer products! We're not just an
                        online store; we're your partner in finding the perfect products and services that make life a
                        little more easy.

                        About SuPrimo:
                        At SuPrimo, we're more than just an online store – we're a curated collection of computer
                        products designed to elevate your daily life. Our virtual shelves are stocked with handpicked
                        products that combine quality, style, and affordability.</h1>
                </strong></p>
        </div>
    </div>
    <div id="cardAbout">

        <?php foreach ($resultado as $producto): ?>
            <div id="caja">
                <img src="data:image/jpeg;base64,<?= $producto->image; ?>" alt="image">
                <h3>
                    <?= $producto->emp_name; ?>
                </h3>
                <h3>
                    <?= $producto->job_title; ?>
                    </p>
                    <p>
                        <?= $producto->emp_description; ?>
                </h3>
            </div>
        <?php endforeach; ?>
    </div>
</body>

</html>