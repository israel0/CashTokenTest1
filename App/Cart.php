<?php

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


     public function addProducttoCart($user_id, $product_id, $product_quantity) {
           $sql = 'INSERT INTO carts (user_id, product_id, product_quantity) VALUES (?,?,?)';
           $stmt = $this->db->getConnection()->prepare($sql);
           $params = [
               $user_id, $product_id, $product_quantity
           ];
           $stmt->execute($params);
     }


     public function updateCart($user_id, $product_quantity , $cart_id) {
        // Check if user is valid and cart item is not empty
        $sql = 'UPDATE carts SET product_quantity = ? WHERE id = ?';
        $stmt = $this->db->getConnection()->prepare($sql);
        $params = [
             $user_id, $product_quantity, $cart_id
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