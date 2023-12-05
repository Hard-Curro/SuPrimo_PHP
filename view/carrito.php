<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php 
    require_once("../connection/Connection.php");
    require_once("../model/OrderImplDAO.php");
        var_dump(unserialize(base64_decode($_COOKIE['my_cookie'])));
    //SET Items Carrito from Cookies
        if (isset($_COOKIE['my_cookie'])) {
            // Decode and unserialize the data
            $decodedData = unserialize(base64_decode($_COOKIE['my_cookie']));
            $items = [];
            foreach($decodedData as $item){
                if($item["type"] == 1){
                    $prod = selectProductById($pdo, $item["id"]);
                    $item = [
                        "item"=>$prod,
                        "quantity"=>$item["quantity"]
                    ];
                    array_push($items, $item);
                } else {
                    $serv = selectServiceById($pdo, $item["id"]);
                    $item = [
                        "item"=>$serv,
                        "quantity"=>$item["quantity"]
                    ];
                    array_push($items, $item);
                }
            }
            // Use the data as needed
        } else {
            echo "Cart is empty :(";
        }

        

    //CARRITO
    
    ?>
    <!-- View Cart Items -->
    
        <div>
            <?php if (isset($_COOKIE['my_cookie'])): ?>
                <?php $totalPrice = 0;?>
                    <?php foreach ($items as $item): ?>
                        <?php
                            $pro = $item["item"];
                            $totalPrice+= $item["quantity"]*$pro->price;
                        ?>
                        <div class="">
                            <div class="card h-100" style="width: 18rem;">
                                <div class="img-div"><img src="data:image/jpeg;base64,<?= $pro->image?>" class="card-img-top" alt="image"></div>
                                
                                <div class="card-body">
                                    <h5 class="card-title"><?= $pro->name; ?></h5>
                                    <p class="card-text"><?= $pro->description; ?></p>
                                    <p class="card-text fw-bold"><?= $pro->price*$item["quantity"]."€" ?></p>
                                    <p class="card-text fw-bold"><?= "Quantity: ".$item["quantity"] ?></p>
                                </div>
                            </div>
                        </div>
                        <a href="../controller/CartController.php?id=<?= $pro->id?>&type=<?= $pro->type?>">X</a>
                    <?php endforeach; ?>
                    <p><?= "Total price: ".$totalPrice."€"?></p>
                    <div class="d-flex flex-row justify-content-around align-items-center">
                        <a href="../controller/CartController.php?empty">Empty Cart</a>
                        <a href="../controller/CheckoutController.php">Checkout</a>
                    </div>
                    
                    <?php endif ?>
        </div>
    
</body>
</html>