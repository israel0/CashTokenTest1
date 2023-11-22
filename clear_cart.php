<?php 

    require_once "App/autoload.php";

    $carts = new Cart($db);
    $carts = $user->deleteCart(1);

    echo "Cart Deleted Successfully";

