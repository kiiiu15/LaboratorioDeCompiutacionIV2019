<?php
    require "../autoload.php";

    use modelo\Bill as Bill;
    if (isset($_GET)){
        $numeroFactura = $_GET["number"];
        $tipoFactura = $_GET["type"];
        $fechaFactura = $_GET["date"];

        if ($fechaFactura >  date ("Y-m-d")){
            header("location: ../vista/add-bill.php");
        } else {
            if (empty($tipoFactura) || empty($numeroFactura)){
                header("location: ../vista/add-bill.php");
            } else {
                session_start();
                $bill = new Bill ($fechaFactura , $tipoFactura , $numeroFactura);
                $_SESSION[] = $bill;

                header ("location: generacionItemsBill.php");
            }
        }
    }
?>