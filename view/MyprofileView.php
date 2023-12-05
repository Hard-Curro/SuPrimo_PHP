<?php
session_start();
?>

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

</body>

</html>