<?php
include '../php/header.php';

$recordId = showOrderIds();
?>
<section id="sales-day">
    <?php
    foreach ($recordId as $rI) {
        echo ' <div class="container">
                    <div class="sales-day-orderid">
                        <h1>Order no: <span>' . $rI['ID'] . '</span></h1>
                    </div>';

                    $record = showOrderById($rI['ID']); 
                    foreach ($record as $r) {   
                        echo ' <div class="div-sec">

                        <div class="sales-day-product">
                            <h2><span>'.$r['product'].'</span></h2>
                        </div>
                        <div class="sales-day-price">
                            <h2><span>'.$r['price'].'</span></h2>
                        </div>
                        
                    </div>';
                    }   
                    $idtry= returnTotalById($rI['ID']);
                   
                    
        echo '<div class="container-total-sale">
            <h1><span>'. $idtry.'</span></h1>
        </div>   
        </div>';
    }
    ?>
   


</section>

<?php

include '../php/footer.php';
?>