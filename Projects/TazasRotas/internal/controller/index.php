<?php
require '../database/database.php';
// require '../database/userDB.php';
require '../database/productosDB.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == null) {
    $action = filter_input(INPUT_GET, 'action');
    if ($action == null) {
        $action = 'POScaliente';
    }
}
switch ($action) {
    case 'login':
        session_destroy();
        include '../php/show_login.php';
        break;
    case 'productos':
        include '../php/productos.php';
        break;
    case 'addProducto':
        $producto = filter_input(INPUT_POST, 'input-product');
        $price = filter_input(INPUT_POST, 'input-price');
        $desc = filter_input(INPUT_POST, 'input-description');
        if (addProduct($producto, $price, $desc)) {
            header("Location:?action=productos");
        } else {
            header("Location?action=productos");
        }
        // try{
        //     addProduct($producto, $price, $desc);
        //     header("Location: ?action=productos");
        // }catch(PDOExeption $e){
        //     header("Location: ..".$e->getMessage());
        // }

        break;
    case 'POScaliente':
        include '../php/POS/POScaliente.php';
        break;
    case 'POSrefrescantes':
        include '../php/POS/POSrefrescantes.php';
        break;
    case 'POScomida':
        include '../php/POS/POScomida.php';
        break;
    case 'POSpostres':
        include '../php/POS/POSpostres.php';
        break;
    case 'POSsnacks':
        include '../php/POS/POSsnacks.php';
        break;
    // INSERT INTO DATABASE ORDERSTRACK
    case 'placeOrder':
        $fecha = filter_input(INPUT_POST, 'date');
        $empleado = filter_input(INPUT_POST, 'staff');
        $t = filter_input(INPUT_POST, 'totalsale');
        $cant = filter_input(INPUT_POST, 'cantidad');
        $orderList = filter_input(INPUT_POST, 'orderList'); //Store all the JSON object in a variable 
        $decode_data = json_decode($orderList); //Decode the JSON objects into something usable in PHP
        $id = filter_input(INPUT_POST, 'idOrderDb');


        if ($cant > 0) {
            if (addOrdersTrack($fecha, $empleado)) {
                foreach ($decode_data as $decode) {
                    addToOrderList($id, $decode->name, substr($decode->price, 1), $fecha);
                }
                include '../php/POS/POScaliente.php';
            } else {
                header("Location?action=productos");
            }
        }
        {}


        break;
    case 'ordersSumary':
        include('../php/displayAllOrders.php');
        break;
}
?>