<?php
function addProduct($producto, $productoPrice, $productoDesc){
global $db;
$query ="INSERT INTO product(productName, price, description) VALUES (:p, :pP, :pD)";
$st = $db->prepare($query);
$st->bindValue('p', $producto);
$st-> bindValue('pP', $productoPrice);
$st->bindValue('pD',$productoDesc);
try{
    $st->execute();
}catch(PDOException $e){
    header("Location:../php/error.php?msg".$e->getMessage());
}
$st->closeCursor();
return true;
}
 
function showAllProductos(){
    global $db;
    $query ="SELECT * FROM product";
    $st= $db->prepare($query);
    try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php".$e->getMessage());
    }
    $products=$st->fetchAll();
    $st->closeCursor();
    return $products;
}

function showAllProductosByCategoria($categoria){
    global $db;
    $query ="SELECT * FROM product WHERE description = :cat";
    
    $st= $db->prepare($query);
    $st->bindValue('cat', $categoria);
    try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php".$e->getMessage());
    }
    $products=$st->fetchAll();
  
    
    return $products;
}

###################################
## INSERT INTO DB  PLACED ORDERS ##
###################################

function addOrdersTrack($fecha, $empleado){
    global $db;
    $query ="INSERT INTO orderstrack(date, staff) VALUES (:f, :em)";
    $st = $db->prepare($query);
    $st->bindValue(':f', $fecha);
    $st->bindValue(':em', $empleado);
        try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php?msg".$e->getMessage());
    }
    $st->closeCursor();
    return true;
}

function addNewProduct($inputPriority,$inputProductName, $inputProductDescription,  $inputStock,  $inputPrice,$inputDate){
    global $db;
    $query ="INSERT INTO productsList(priority, name, description, stock, price, Date) VALUES (:iPriority,:iName,:iDescription,:iStock,:iPrice, :iDate)";
    $st = $db->prepare($query);
    $st->bindValue(':iPriority', $inputPriority);
    $st->bindValue(':iName', $inputProductName);
    $st->bindValue(':iDescription', $inputProductDescription);
    $st->bindValue(':iStock',  $inputStock);
    $st->bindValue(':iPrice',  $inputPrice);
    $st->bindValue(':iDate',  $inputDate);
        try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php?msg".$e->getMessage());
    }
    $st->closeCursor();
    return true;
}

function returnMaxId(){
        global $db;
        $query ="SELECT id FROM orderstrack WHERE id = (SELECT MAX(id) FROM orderstrack)";
        $st = $db->prepare($query);
        try{
            $st->execute();
        }catch(PDOException $e){
            header("Location:../php/error.php?msg".$e->getMessage());
        }
        $id=$st->fetch();
        $st->closeCursor();
        return $id['id'];
}

function addToOrderList($id,$product, $price, $fecha){
    global $db;
    $query ="INSERT INTO orderlist(orderid,product, price, date) VALUES (:id, :prod, :price, :fecha)";
    $st = $db->prepare($query);
    $st->bindValue(':id', $id);
    $st->bindValue(':prod', $product);
    $st->bindValue(':price', $price);
    $st->bindValue(':fecha', $fecha);
        try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php?msg".$e->getMessage());
    }
    $st->closeCursor();
    return true;
}
//Display the orderList table using date
function showOrderByDate($date){
    global $db;
    $query ="SELECT * FROM orderlist WHERE date = :cat";
    
    $st= $db->prepare($query);
    $st->bindValue('cat', $date);
    try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php".$e->getMessage());
    }
    $products=$st->fetchAll();
    $st->closeCursor();
    
    return $products;
}
//Return the orderList table.
function showOrderById($id){
    global $db;
    $query ="SELECT * FROM orderlist WHERE orderid = :cat" ;
    $st= $db->prepare($query);
    $st->bindValue('cat', $id);

    try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php".$e->getMessage());
    }
    $products=$st->fetchAll();
  
    $st->closeCursor();
    return $products;
}
// Return the ordersTrack table
function showOrderIds(){
    global $db;
    $query ="SELECT * FROM orderstrack" ;
    
    $st= $db->prepare($query);
    try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php".$e->getMessage());
    }
    $products=$st->fetchAll();
    $st->closeCursor();
    
    return $products;
}
// Takes id to search in db[orderList] then sum and return the total of the order with that id.
function returnTotalById($id){
    global $db;
    $query = "SELECT sum(price) as total FROM orderlist WHERE orderId = :id";
    $st = $db->prepare($query);
    $st->bindValue(':id', $id);
    try{
        $st->execute();
    }catch(PDOException $e){
        header("Location:../php/error.php".$e->getMessage());
    }
    $totalPrice = $st->fetch();
    $st->closeCursor();
    return $totalPrice['total'];
}