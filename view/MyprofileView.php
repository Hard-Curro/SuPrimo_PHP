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

    <div id="profile">
        <h1>User Profile</h1>
        <form action="../controller/MyprofileController.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $_SESSION['usuario']['user_name']; ?>"
                required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['usuario']['email']; ?>" required>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="<?php echo $_SESSION['usuario']['phone']; ?>" required>

            <label for="address">Address:</label>
            <input type="text" id="address" name="address" value="<?php echo $_SESSION['usuario']['address']; ?>"
                required>

            <label for="floor">Floor:</label>
            <input type="text" id="floor" name="floor" value="<?php echo $_SESSION['usuario']['floor']; ?>" required>

            <input type="submit" value="Update Profile">
        </form>
    </div>
    <div class="container mb-5" id="purchases_container">
        <h3>Old Purchases</h3>
        <div class="d-flex flex-column gap-4">

            <?php foreach ($purchases as $cart): ?>
                <div id="card-carrito" style="margin-bottom: 20px;">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <p class="card-text fw-bold">Cart id:
                                <?= $cart->order_id ?>
                            </p>
                            <p class="card-text">Date:
                                <?= $cart->order_date ?>
                            </p>
                            <button class="btn btn-primary" onclick="toggleDetails(this)">Show Details</button>
                            <div class="details" id="centrar-carrito" style="display: none;">
                                <?php $totalPrice = 0; ?>
                                <?php foreach ($cart->items as $item): ?>
                                    <div class="card" style="width: 18rem; margin-top: 10px;">
                                        <div class="img-div">
                                            <img src="data:image/jpeg;base64,<?= $item["item"]->fotos; ?>" class="card-img-top"
                                                alt="image">
                                        </div>
                                        <div class="card-body">
                                            <h5 class="card-title">
                                                <?= $item["item"]->nombre; ?>
                                            </h5>
                                            <p class="card-text">
                                                <?= $item["item"]->descripcion; ?>
                                            </p>
                                            <p class="card-text fw-bold">
                                                <?= $item["item"]->precio * $item["quantity"] . "€" ?>
                                            </p>
                                            <p class="card-text">Quantity:
                                                <?= $item["quantity"]; ?>
                                            </p>
                                        </div>
                                    </div>
                                    <?php $totalPrice += $item["item"]->precio * $item["quantity"]; ?>
                                <?php endforeach; ?>
                                <p><strong>Total Price:</strong>
                                    <?= $totalPrice . "€" ?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <script>
                function toggleDetails(button) {
                    var detailsDiv = button.parentElement.querySelector('.details');
                    if (detailsDiv.style.display === 'none') {
                        detailsDiv.style.display = 'flex';
                        button.innerText = 'Hide Details';
                    } else {
                        detailsDiv.style.display = 'none';
                        button.innerText = 'Show Details';
                    }
                }
            </script>



        </div>
</body>

</html>