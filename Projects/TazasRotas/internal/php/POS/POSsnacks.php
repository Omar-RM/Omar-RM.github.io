<?php
include '../php/header.php';
?>
<section id="POS">
    <?php include '../php/POS/POSmenu.php' ?>
    <div id="POS-prod">
        <input type="date" value="<?php date("Y,m,d")?>">
        <?php
       
        $allOrderByDate = showOrderByDate( date("Y,m,d"));
        foreach($allOrderByDate as $order){
            echo ' <div  style="background: white "class="">
            <div class="">'.$order['product'].'</div>
            <div class=""><span>&dollar;</span>'.$order['price'].'</div>
            <button class="">Borrar</button>
        </div>';     
        }
            ?>
    </div>
</section>

<?php include '../php/asideTotalVenta.php'; ?>





<?php
include '../php/footer.php';
?>