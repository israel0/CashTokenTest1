<?php 
    require_once "App/autoload.php";
    $user = new Cart($db);
    $create = $user->updateCart(1, 10, 1);
    echo "User Update Successfully";

