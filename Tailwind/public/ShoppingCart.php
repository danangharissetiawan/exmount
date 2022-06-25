<?php
require_once "DBController.php";

class ShoppingCart extends DBController
{

    function updateCartQuantity($quantity, $cart_id)
    {
        $query = "UPDATE pemesanan_tiket SET  jumlah_tiket = ? WHERE id_pemesanan= ?";
        
        $params = array(
            array(
                "param_type" => "i",
                "param_value" => $quantity
            ),
            array(
                "param_type" => "i",
                "param_value" => $cart_id
            )
        );
        
        $this->updateDB($query, $params);
    }

}
