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
    </div>

    <?php
    require_once dirname(__DIR__) . "\\model\\Connection.php";
    require_once dirname(__DIR__) . "\\model\\OrderImplDAO.php";

    if (isset($_COOKIE['cookieGod'])) {
        $decodedData = unserialize(base64_decode($_COOKIE['cookieGod']));
        $items = [];
        foreach ($decodedData as $item) {
            if ($item["type"] == 1) {
                $prod = selectProductById($pdo, $item["id"]);
                $item = [
                    "item" => $prod,
                    "quantity" => $item["quantity"]
                ];
                array_push($items, $item);
            } else {
                $serv = selectServiceById($pdo, $item["id"]);
                $item = [
                    "item" => $serv,
                    "quantity" => $item["quantity"]
                ];
                array_push($items, $item);
            }
        }
    } else {
        echo "Cart is empty :(";
    }

    ?>
    <div id="card">
        <h1>Carrito</h1>

        <div>
            <?php if (isset($_COOKIE['cookieGod'])): ?>
                <?php $totalPrice = 0; ?>
                <div id="organizar">
                    <?php foreach ($items as $item): ?>
                        <?php
                        $pro = $item["item"];
                        $totalPrice += $item["quantity"] * $pro->precio;
                        ?>

                        <div id="caja-card">
                            <div class="card h-100" style="width: 18rem;">
                                <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->fotos ?>" class="card-img-top"
                                        alt="image"></div>
                                <div class="card-body">
                                    <h5 class="card-title">
                                        <?= $pro->nombre; ?>
                                    </h5>
                                    <p class="card-text">
                                        <?= $pro->descripcion; ?>
                                    </p>
                                    <p class="card-text fw-bold">
                                        <?= $pro->precio * $item["quantity"] . "€" ?>
                                    </p>
                                    <p class="card-text fw-bold">
                                        <?= "Quantity: " . $item["quantity"] ?>
                                    </p>
                                </div>



                                <a href="../controller/CartController.php?id=<?= $pro->id ?>&type=<?= $pro->type ?>">Delete
                                    product</a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <p>
                    <?= "Total price: " . $totalPrice . "€" ?>
                </p>
                <div>
                    <a href="../controller/CartController.php?empty">Empty Cart</a>
                    <a href="../controller/CheckoutController.php">Checkout</a>
                </div>

            <?php endif ?>
        </div>

</body>

</html>