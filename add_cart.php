<?php 

 require_once "App/autoload.php";

 $products = new Cart($db);
 $products->addProducttoCart(1, 2, 1);
 echo "Add Product to Cart";
 