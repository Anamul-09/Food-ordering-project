<?php

    include_once("db_connect.php");
    $id = $_GET['id'];

    $sql = "DELETE FROM  product_list WHERE id = $id";
    $db->query($sql);
    if($db->affected_rows>0){
        header("location:product_list.php");
    }


?>