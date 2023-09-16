<?php
include '../php/header.php';
?>
 <section id="POS">
 <?php include '../php/POS/POSmenu.php'?>
    <?php
    $allProductos = showAllProductosByCategoria("postres");
    foreach($allProductos as $product){
        echo ' <div class="box-item">
        <div class="box-item-name">'.$product['productName'].'</div>
        <div class="box-item-price"><span>&dollar;</span>'.$product['price'].'</div>
        <button class="add-to-sumary">ADD</button>
    </div>';     
    }
    ?>
</section>
<?php include '../php/asideTotalVenta.php';?>
            
            <script src="../app.js"></script>



<?php
include '../php/footer.php';
?>