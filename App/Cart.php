<?php

require_once "Interface/cartInterface.php";
/**
 * cart class Definition
 */
class cart 
{
     private $id;

     private $cart_id;

     private $product_id;

     private  $product_quantity;

     private $db;

     /**
      * cart Constructor function
      *
      * @param DatabaseConnection $db
      */
     public function __construct(DatabaseConnection $db) {
         $this->db = $db;
     }


     public function getcartid() {
           return $this->cart_id;
     }


     public function getallCartItems($email) {
          $sql = "SELECT * FROM carts";
          $stmt = $this->db->getConnection()->prepare($sql);
          $stmt->execute();
          return $stmt->fetchAll();
     }

     // Get carts
     public function getCartbyId($cart_id) {
          $sql = "SELECT * FROM carts id = ?";
          $stmt = $this->db->getConnection()->prepare($sql);
          $stmt->execute([$cart_id]);
          return $stmt->fetch();
     }


     public function addProducttoCart($user_id, $product_id, $quantity) {
           $sql = 'INSERT INTO carts (user_id, product_id, product_quantity) VALUES (?,?,?)';
           $stmt = $this->db->getConnection()->prepare($sql);
           $params = [
               $user_id, $product_id, $quantity
           ];
           $stmt->execute($params);
     }


     public function updateCart($user_id, $quantity , $product_id) {
        $sql = 'UPDATE carts SET quantity = ? WHERE product_id = ?';
        $stmt = $this->db->getConnection()->prepare($sql);
        $params = [
             $user_id,$quantity,$product_id
        ];
        $stmt->execute($params);
     }

     /**
      * Delete cart function
      *
      * @param int $cart_id
      * @return void
      */
     public function deleteCart($cart_id) {
            $sql = 'DELETE FROM carts WHERE id = ?';
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute([$cart_id]);
     }


}